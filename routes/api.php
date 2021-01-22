<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
/*

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::resource('posts', PostController::class);
});

//Route::middleware('auth:api')->group(function () {});
Route::get('major', 'Major\MajorController@major');
Route::get('major/{id}', 'Major\MajorController@majorByID');
Route::post('major', 'Major\MajorController@majorSave');
Route::put('major/{id}', 'Major\MajorController@majorUpdate');
Route::delete('major/{id}', 'Major\MajorController@majorDelete');
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

  Route::namespace('Tender')->group(function(){
    Route::get('Tender/get','TenderController@getActiveTenders'); // for get all tenders 
    Route::get('Tender/not','TenderController@userNotify'); // for get all tenders 
    Route::get('Tender/get/{id}','TenderController@getTenderById'); //for get tender by its id 
    Route::get('Tender/major','TenderController@getTenderMajor'); // for get all major and its count in tenders 
    Route::get('Tender/filters','TenderController@filterAllActiveTender');
    Route::get('Tender/filter/field','TenderController@filterActiveTenderField');

    Route::get('Tender/dowenloadFile/{filename}','TenderController@dowenloadFile');

});

Route::apiResource('major', 'Major\MajorController'); 
Route::get('getactivemajors', 'Major\MajorController@getactivemajors'); 
Route::delete('delete/{id}', 'Major\MajorController@delete');

Route::apiResource('tender', 'Tender\TenderDashboarController'); 
Route::get('getactivetender', 'Tender\TenderDashboarController@getactivetender'); 
Route::delete('delete/{id}', 'Tender\TenderDashboarController@delete'); 

Route::post('login', 'login\loginController@login');
Route::get('checklogin', 'login\loginController@checklogin');
Route::get('logout', 'login\loginController@logout');

Route::namespace('ContactUs')->group(function(){
Route::post('ContactUs','ContactUSController@sendEmail');
});

Route::namespace('UserProf')->group(function(){
    Route::post('addUser','userProfController@userProfAdd');
    Route::get('getUser','userProfController@getActiveUser');

    });
