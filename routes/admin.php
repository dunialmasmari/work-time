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

Route::apiResource('major', 'Major\MajorController'); 
Route::get('/update/{id}','Major\MajorController@update');
Route::get('/activation/{id}','Major\MajorController@activation');


Route::apiResource('tender', 'Tender\TenderDashboarController'); 
Route::get('/addtender', 'Tender\TenderDashboarController@addtender'); 
Route::get('/activation/{id}','Tender\TenderDashboarController@activation');

/*Route::get('/addtender', function () {
    return view('admin/tender/addtender');
});*/
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

