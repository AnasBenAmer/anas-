<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Models\Requests;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function index(){

      /* $request = Requests::join('students', 'requests.student_id', '=', 'students.id')
     >join('buildings', 'students.building_id', '=', 'buildings.id')
        ->select('requests.*', 'students.name as student_name' ,    'buildings.name as building_name'   )->get();*/
        $requests = DB::table('requests')
        ->join('students', 'requests.student_id', '=', 'students.id')
        ->join('buildings', 'students.building_id', '=', 'buildings.id')
        ->join('complexes', 'buildings.complex_id', '=', 'complexes.id')
        ->select('students.name As student_name' ,'students.phone_number As student_number',   'buildings.name AS building_name', 'complexes.name AS complex_name', 'requests.*')
        ->get();
    return view('requests.index',['requests'=>$requests]);


    }

    public function show (Requests $request){

    $request = Requests::with('student')->find($request->id);
    $student = $request->student;





    return view('requests.show', compact('request', 'student'));

    }

//destroy
public function destroy(Requests $request ){
    if (Auth::user()->id !== $request->user_id) {
        abort(404);
    }

    //delete
    $request->delete();
    return redirect()->route('Request.index', ['request' => $request->id  ])->with(['success' => 'request deleted successfully']);
}

//create
public function create()
{

    return view('requests.create');}
//store
public function store(Request $request){


    $req = $request->validate([
        'title' => 'required',
        'content' => 'required',

    ]);
    //Auth::user()->requests()->create($req);

   Auth::guard('student')->user()->requests()->create($req);
  // $request->->create($request);

   return redirect()->route('student.dashboard');
}
}



