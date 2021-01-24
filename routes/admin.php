<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
//Auth::logout();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

 /** major Route */
 Route::group(['namespace' => 'Major', 'prefix' => 'controlpanel', 'middleware' => 'auth' ],function()
 {
    //Route::get('/home', function () {return view('admin/home');});
    Route::get('/home','MajorController@index');

    Route::apiResource('/major', 'MajorController'); 
    Route::post('/updatemajor','MajorController@updatemajor');
    Route::get('/majoractivation/{id}','MajorController@majoractivation');
  });

/** tender Route */
Route::group(['namespace' => 'Tender', 'prefix' => 'controlpanel', 'middleware' => 'auth' ],function()
 {
    Route::apiResource('/tender', 'TenderDashboarController'); 
    Route::post('/updatetender','TenderDashboarController@updatetender');
    Route::get('/tender_add', 'TenderDashboarController@tender_add'); 
    Route::get('/tenderactivation/{id}','TenderDashboarController@tenderactivation');
});

Route::group(['namespace' => 'Job', 'prefix' => 'controlpanel', 'middleware' => 'auth' ],function()
 {
    Route::apiResource('/job', 'JobDashboarController'); 
    Route::post('/updatejob','JobDashboarController@updatejob');
    Route::get('/addjob', 'JobDashboarController@addjob'); 
    Route::get('/jobactivation/{id}','JobDashboarController@jobactivation');
});
/*Route::get('/major', function () {
    return view('admin/major');
});
Route::namespace('Major')->group(function(){
    Route::get('showmajor','MajorController@index')->name('home');;
    Route::post('addmajor','MajorController@store');

    });*/

