<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complex;
use App\Models\Building;
use App\Models\Room;

use Illuminate\Support\Facades\Auth;


class BuildingController extends Controller

{

     //create
     public function create(Complex $complex)
     {

         return view('buildings.create', ['complex' => $complex]);
     }
     //store
    public function store(Request $request, Complex $complex)
    {
        $building = $request->validate([
            'name' => 'required',
            'floors' => 'required',

        ]);

        $complex->buildings()->create($building);

        return redirect()->route('complex.show', ['complex' => $complex->id])->with(['success' => 'building created successfully']);
    }
   //edit
   public function edit(Complex $complex, Building $building)
   {
       if (Auth::user()->id != $complex->user_id) {
           abort(403);
       }
       if ($building->complex_id != $complex->id) {
           abort(404);
       }
       return view('buildings.edit', ['complex' => $complex, 'building' => $building]);
   }
//update
public function update(Request $request, Complex $complex, Building $building)
{
    if (Auth::user()->id != $complex->user_id) {
        abort(403);
    }
    if ($building->complex_id != $complex->id) {
        abort(404);
    }
    $building->update($request->validate([
        'name' => 'required',
            'floors' => 'required',
    ]));
    return redirect()->route('complex.show', ['complex' => $complex->id])->with(['success' => 'complex updated successfully']);
}
//show
public function show( Complex $complex, Building $building , Room $room){
    if (Auth::user()->id != $complex->user_id) {
        abort(403);
    }

    if ($building->complex_id != $complex->id) {
        abort(404);
    }

    $room = $building->rooms()->OrderByDesc('created_at')->paginate(5);
    return view('buildings.show', ['complex' => $complex, 'building' => $building , 'rooms' => $room]);


}
//destroy
public function destroy( Complex $complex, Building $building){
    if (Auth::user()->id != $complex->user_id) {
        abort(403);
    }

    if ($building->complex_id != $complex->id) {
        abort(404);
    }
    //delete
    $building->delete();
    return redirect()->route('complex.show', ['complex' => $complex->id])->with(['success' => 'building deleted successfully']);
}

}
