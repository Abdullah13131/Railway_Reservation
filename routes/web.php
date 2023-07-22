<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('generate-pdf/{id}','App\Http\Controllers\RailwayController@generatePDF')->name('generate-pdf');
Route::get('downloadcomplaint/{id}','App\Http\Controllers\RailwayController@generatecomplaintPDF')->name('generate-pdf');


Route::get('/', function () {
    return view('Home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact_us', function () {
    return view("contact_us");
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/userdashboard', function () {
    return view('userdashboard');
});

Route::get('/logout',function(){
    Session::forget('user_id');
    return redirect('/');    
});

Route::post('/create','App\Http\Controllers\RailwayController@createuser');
Route::post('/login','App\Http\Controllers\RailwayController@login');
Route::post('/booking','App\Http\Controllers\RailwayController@find_train');
Route::post('/feedback','App\Http\Controllers\RailwayController@feedback');
Route::get('/getcomplaint','App\Http\Controllers\RailwayController@complaint');
Route::get('/getbooking','App\Http\Controllers\RailwayController@booking');
Route::get('/getcancelled','App\Http\Controllers\RailwayController@cancelled');
Route::post('/updateprofile','App\Http\Controllers\RailwayController@update');
Route::get('/deleteaccount/{id}','App\Http\Controllers\RailwayController@deleteacc');
Route::get('/bookticket/{id}','App\Http\Controllers\RailwayController@bookticket');
Route::get('/cancelticket/{id}','App\Http\Controllers\RailwayController@cancelticket');


///////////////// ADMIN ROUTES ////////////////////////

Route::get('/admin/login', function() {
    return view('admin/login');
});

Route::get('/admin/logout', function () {
    Session::forget('admin_id');
    return view('admin/login');
});

Route::get('/admin/index', function () {
    return view('admin/index');
});

Route::post("/admin/login", 'App\Http\Controllers\RailwayController@adminLogin');
Route::post("/admin/register", 'App\Http\Controllers\RailwayController@registerAdmin');

//user
Route::post("/addUser", 'App\Http\Controllers\RailwayController@addNewUser');
Route::get("/users", 'App\Http\Controllers\RailwayController@getUserDetails');
Route::get("deleteUser/{id}", 'App\Http\Controllers\RailwayController@deleteUserDetails');
Route::post("editUser/{id}", 'App\Http\Controllers\RailwayController@editUserDetails');

//train
Route::post("/addTrain", 'App\Http\Controllers\RailwayController@addNewTrain');
Route::get("/trains", 'App\Http\Controllers\RailwayController@getTrainsDetails');
Route::get("deleteTrain/{id}", 'App\Http\Controllers\RailwayController@deleteTrainDetails');
Route::post("editTrain/{id}", 'App\Http\Controllers\RailwayController@editTrainDetails');

//station
Route::post("/addStation", 'App\Http\Controllers\RailwayController@addNewStation');
Route::get("/stations", 'App\Http\Controllers\RailwayController@getStationsDetails');
Route::get("deleteStation/{id}", 'App\Http\Controllers\RailwayController@deleteStationDetails');
Route::post("editStation/{id}", 'App\Http\Controllers\RailwayController@editStationDetails');