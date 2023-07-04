<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplexController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\AdController;
use App\Models\building;
use App\Models\Complex;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {

       $totalcomplexes = DB::table('complexes')->count();
       $totalbuildings = DB::table('buildings')->count();
       $totalrooms = DB::table('rooms')->count();
       $totalstudents = DB::table('students')->count();
       $countries=    DB::table('students')
->select('city', DB::raw('count(city) as count'))
->groupBy('city')
->get();
//dd($countries);

//echo gettype($citys);
//dd($citys);
$cities =[];
$cityiescount = [];
foreach ($countries as $countrie){
    $cities [] = $countrie->city;


}
//dd( $cities);
foreach ($countries as $countrie ){
    $cityiescount[]= $countrie->count;
}

//dd($cities);
//dd($cityiescount);
//dd($data);
//$chartdata = $cityes;
 //$chartdata=  json_encode($chartdata);
//dd($chartdata);

    return view('dashboard',['totalcomplexes' => $totalcomplexes , 'totalbuildings'=>$totalbuildings ,'totalrooms' =>$totalrooms , 'totalstudents'=>$totalstudents , 'cities'=>$cities,'cityiescount' =>$cityiescount ]);
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//Router for complexes
//index
Route::get('complexes',[ComplexController::class,'index'])->name('complex.index');
//show
Route::get('complex/{complex}',[ComplexController::class,'show'])->name('complex.show');
//create
Route::get('complexes/create',[ComplexController::class,'create'])->name('complex.create');
Route::post('complexes/store', [ComplexController::class, 'store'])->name('complex.store');
//delete
Route::delete('complex/{complex}', [ComplexController::class, 'destroy'])->name('complex.destroy');
//edit
Route::get('complex/{complex}/edit', [ComplexController::class, 'edit'])->name('complex.edit');
Route::patch('complex/{complex}', [ComplexController::class, 'update'])->name('complex.update');

// route:: for search complex
Route::post('complexs/search', [ComplexController::class, 'search'])->name('complex.search');

//Router for buildings
//create
Route::get('complex/{complex}/building/create',[BuildingController::class,'create'])->name('building.create');
Route::post('complex/{complex}/building/create',[BuildingController::class,'store'])->name('building.store');
//edit
Route::get('complex/{complex}/building/{building}/edit',[BuildingController::class,'edit'])->name('building.edit');
Route::patch('complex/{complex}/building/{building}/edit',[BuildingController::class,'update'])->name('building.update');
//show
Route::get('complexs/{complex}/building/{building}', [BuildingController::class, 'show'])->name('building.show');
//delete
Route::delete('complex/{complex}/building/{building}', [BuildingController::class, 'destroy'])->name('building.destroy');
//show
Route::get('complex/{complex}/building{building}/room/{room}', [RoomController::class, 'show'])->name('room.show');

//Router for rooms
//create
Route::get('complex/{complex}/building/{building}/room/create' ,[RoomController::class,'create'])->name('room.create');
Route::post('complex/{complex}/building/{building}/room/create',[RoomController::class,'store'])->name('room.store');
//edit
Route::get('complex/{complex}/building/{building}/room/{room}/edit',[RoomController::class,'edit'])->name('room.edit');
Route::patch('complex/{complex}/building/{building}/room/{room}',[RoomController::class,'update'])->name('room.update');
//delete
Route::delete('complex/{complex}/building/{building}/room/{room}', [RoomController::class, 'destroy'])->name('room.destroy');
//show
Route::get('complex/{complex}/building{building}/room/{room}/student/{student}', [StudentController::class, 'show'])->name('student.show');

//Router for students

//create
Route::get('complex/{complex}/building/{building}/room/{room}/student/create',[StudentController::class,'create'])->name('student.create');
Route::post('complex/{complex}/building/{building}/room/{room}/student/create',[StudentController::class,'store'])->name('student.store');
//edit
Route::get('complex/{complex}/building/{building}/room/{room}/student/{student}/edit',[StudentController::class,'edit'])->name('student.edit');
Route::patch('complex/{complex}/building/{building}/room/{room}/student/{student}/edit',[StudentController::class,'update'])->name('student.update');
//delete
Route::delete('complex/{complex}/building/{building}/room/{room}/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

//Router for advertisements
//index
//Route::get('/advertisements',[AdvertisementController::class,'index'])->name('advertisements.create');

//Route::post('/advertisements',[AdvertisementController::class,'store'])->name('advertisement.store');

//Router for requests
//index
Route::get('/request',[RequestController::class,'index'])->name('Request.index');
Route::get('/request/{request}',[RequestController::class,'show'])->name('Request.show');
//delete
Route::delete('/request/{request}/delete', [RequestController::class, 'destroy'])->name('Request.destroy');




});
//Router for requests
//index
Route::get('/request',[RequestController::class,'index'])->name('Request.index');
Route::get('/request/{request}',[RequestController::class,'show'])->name('Request.show');
//delete
Route::delete('/request/{request}/delete', [RequestController::class, 'destroy'])->name('Request.destroy');
//create
Route::get('/student/request',[RequestController::class,'create'])->name('request.create');
Route::post('/student/request',[RequestController::class,'store'])->name('request.store');

//index
Route::get('/student/index',[StudentController::class,'index'])->name('student.index');

Route::get('/student/dashboard', function () {


 $stunotfi=  Auth::guard('student')->User()->notifications()->get();

    return view('student.dashboard',['stunotifications'=>$stunotfi]);
})->middleware(['auth:student', 'verified'])->name('student.dashboard');
require __DIR__.'/studentauth.php';
//Routes for ADS


Route::get('/ads/index',[AdController::class,'index'])->name('ads.index');
Route::get('/admin/ad/{ad}/show',[AdController::class,'show'])->name('ads.show');
Route::get('/admin/ad/create',[AdController::class,'create'])->name('ads.create');
Route::get('/admin/ad/store',[AdController::class,'store'])->name('ads.store');
Route::get('/admin/ad/{ad}/edit',[AdController::class,'edit'])->name('ads.edit');
Route::patch('/admin/ad/{ad}/update',[AdController::class,'update'])->name('ads.update');
Route::delete('/ad/{ad}/delete',[AdController::class,'destroy'])->name('ads.destroy');
// search ad
Route::post('/ads/find',[AdController::class,'search'])->name('ads.search');


// ads route for student

Route::get('student/ads/index',[StudentController::class,'studentadindex'])->name('studentads.index');
Route::get('student/ad/{ad}/show',[StudentController::class,'studentadshow'])->name('studentad.show');

//Route::get('/student/ads/index',[AdController::class,'create'])->name('ads.createn');
#

Route::get('/k',function(){

return view('welcome');
    /*dd($ads = DB::table('ads')
    ->join('students', 'ads.building_ad', '=', 'students.building_id')

    ->select('ads.*', 'students.name')
    ->get());*/
/*dd(DB::table('students')
->select('city', DB::raw('count(city) as count'))
->groupBy('city')
->get()); */
});



