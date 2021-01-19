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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

 /** major Route */

Route::apiResource('/major', 'Major\MajorController'); 
Route::post('/update','Major\MajorController@update');
Route::get('/majoractivation/{id}','Major\MajorController@majoractivation');

/** tender Route */

Route::apiResource('/tender', 'Tender\TenderDashboarController'); 
Route::post('/update','Tender\TenderDashboarController@update');
Route::get('/addtender', 'Tender\TenderDashboarController@addtender'); 
Route::get('/tenderactivation/{id}','Tender\TenderDashboarController@tenderactivation');


Route::get('/controlpanel', function () {
    return view('admin/home');
});
/*Route::get('/major', function () {
    return view('admin/major');
});
Route::namespace('Major')->group(function(){
    Route::get('showmajor','MajorController@index')->name('home');;
    Route::post('addmajor','MajorController@store');

    });*/

