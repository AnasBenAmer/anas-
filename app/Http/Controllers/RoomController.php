<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complex;
use App\Models\Building;
use App\Models\Room;
use App\Models\Student;

use Illuminate\Support\Facades\Auth;




class RoomController extends Controller
{

    //show
public function show( Complex $complex, Building $building ,Room $room , Student $student ){
    if (Auth::user()->id != $complex->user_id) {
        abort(403);
    }

    if ($building->complex_id != $complex->id) {
        abort(404);
    }

    if ($room->building_id != $building->id) {
        abort(404);
    }
    $student = $room->students()->OrderByDesc('created_at')->paginate(5);

    return view('rooms.show', ['complex' => $complex, 'building' => $building , 'room' => $room , 'students' => $student]);


}
//create
public function create(Complex $complex , Building $building )
{

    return view('rooms.create', ['complex' => $complex , 'building' => $building]);
}
//store
public function store(Request $request, Complex $complex , Building $building)
{
   $room = $request->validate([
       'number' => 'required',
       'floor' => 'required',

   ]);

   $building->rooms()->create($room);

   return redirect()->route('building.show', ['complex' => $complex->id ,'building' => $building->id ]);
}
 //edit product
 public function edit(Complex $complex, Building $building ,Room $room)
 {
     if (Auth::user()->id != $complex->user_id) {
         abort(403);
     }
     if ($building->complex_id != $complex->id) {
         abort(404);
     }


    if ($room->building_id != $building->id) {
        abort(404);
    }
     return view('rooms.edit', ['complex' => $complex, 'building' => $building , 'room' => $room]);
 }
//update product
public function update(Request $request, Complex $complex, Building $building ,Room $room)
{
  if (Auth::user()->id != $complex->user_id) {
      abort(403);
  }
  if ($building->complex_id != $complex->id) {
      abort(404);
  }
  if ($room->building_id != $building->id) {
    abort(404);
}
  $room->update($request->validate([
      'number' => 'required',
          'floor' => 'required',
  ]));
  return redirect()->route('building.show', ['complex' => $complex->id , 'building' => $building->id ])->with(['success' => 'room updated successfully']);
}
//destroy
public function destroy( Complex $complex, Building $building , Room $room){
    if (Auth::user()->id != $complex->user_id) {
        abort(403);
    }

    if ($building->complex_id != $complex->id) {
        abort(404);
    }
    if ($room->building_id != $building->id) {
        abort(404);
    }
    //delete
    $room->delete();
    return redirect()->route('building.show', ['complex' => $complex->id  , 'building' => $building->id ])->with(['success' => 'room deleted successfully']);
}
}
