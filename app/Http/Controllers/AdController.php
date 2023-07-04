<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complex;
use App\Models\Ad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;
use App\Models\Building;
use Illuminate\Support\Facades\Notification;

use App\Notifications\Newad;
class AdController extends Controller
{
    public function create(){
        $buildings = Complex::with('buildings')->get()->toArray();


        $complexs = Complex::all();

           return view('ads.create',['complexs'=>$complexs , 'buildings'=>$buildings]);

    }
    public function index(){



       $Ads= DB::table('ads')->OrderByDesc('created_at')->paginate(5);

 return view('ads.index',['Ads'=>$Ads]);


    }
    public function store(  Request $request){

        $ad = $request->validate([
            'building_ad' => 'required',
            'title'=>'required',
            'description' => 'required',


        ]);

        $buildad = $request->building_ad;
        $studentsad = Student::where('building_id',$buildad)->get();
      // dd(  $studentsad);

        $ads= Ad::create($ad);
        Notification::send($studentsad, new Newad($ads));

      /* foreach( $studentsad as $studentad){
        $studentsad->notify(new Newad());
       // Notification::send($studentad, new Newad());

       }*/

/*$admin  = User::find(2);
$admin->notify( new Newad($stuad));*/

        return redirect()->route('ads.index')->with(['success' => 'adverstiments created successfully']);;
}

public function destroy(Ad $ad){

//$ad->delete();

$ad->delete();

return redirect()->route('ads.index')->with(['success' => 'Ad deleted successfully']);;


}

public function edit(Ad $ad){


     return view('ads.edit',['ad'=>$ad]);
}

public function update( Request $request , Ad $ad){


$upad= $request->validate([
 'title' =>'required',
 'description'=>'required',


]) ;
$ad->update($upad);
return redirect()->route('ads.index')->with(['success' => 'Ad updated successfully']);;

}

public function search ( Request $request){
    $request->validate([
        'ad' =>'required'
    ]);

    $search = $request->ad ;
//dd (  $adfind);
   $adfind=  Ad::where('title','like','%' . $search. '%')->orwhere('description','like','%' .$search . '%')->paginate(5);
   return view('ads.index',['Ads'=>$adfind]);

}




}
