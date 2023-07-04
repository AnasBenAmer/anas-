<?php

namespace App\Http\Controllers;
use App\Models\Complex;
use Illuminate\Http\Request;
use App\Models\Building;
use Illuminate\Support\Facades\Auth;
class ComplexController extends Controller
{
    public function index(){

        $complex= Auth::user()->complexs()->OrderByDesc('created_at')->paginate(11);
    return view('complexs.index',['complexs'=>$complex]);
    }

    public function create()
    {
        return view('complexs.create');
    }
    public function store(Request $request){


        $complex = $request->validate([
            'name' => 'required',
            'address' => 'required',

        ]);

        Auth::user()->complexs()->create($complex);
        return redirect()->route('complex.index')->with(['success' => 'complex created successfully']);
    }
public function show (Complex $complex){
    if (Auth::user()->id !== $complex->user_id) {
        abort(403);
    }

    $buildings = $complex->buildings()->OrderByDesc('created_at')->paginate(5);

    return view('complexs.show', ['complex' => $complex,'buildings'=>$buildings]);

}


public function destroy(Complex $complex){

 if (Auth::user()->id !== $complex->user_id) {
        abort(403);
    }
    $complex->delete();
    return redirect()->route('complex.index')->with(['success' => 'complex deleted successfully']);
}

public function edit(Complex $complex){

    if (Auth::user()->id !== $complex->user_id) {
        abort(403);
    }

return view('complexs.edit',['complex'=>$complex]);

}


public function update( Request $request  , Complex $complex){

    if (Auth::user()->id !== $complex->user_id) {
        abort(403);
    }
    $cmp = $request->validate([
        'name' => 'required',
        'address' => 'required',

    ]);
    $complex->update($cmp);
    return redirect()->route('complex.index')->with(['success' => 'complex updated successfully']);
}



public function search( Request $request){
    $request->validate([
        'complex' =>'required'
    ]);

       $search = $request->complex;

       $filtercomplex= Complex::where('address','like','%' .$search . '%')->orwhere('name','like','%' .$search . '%')->paginate(5);
      // dd($filtercomplex);
       return view('complexs.index',['complexs'=>$filtercomplex]);
       //>orwhere('address','like','%$search%')->get()

}



}
