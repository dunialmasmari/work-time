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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
 function()
{

    Route::namespace('Home')->group(function(){
        Route::get('/','HomeController@viewHome');
        Route::get('homehr','HomeController@viewHome');
    });
    
    Route::namespace('Tender')->group(function(){
        Route::get('tenders','TenderController@viewTenders');
        Route::get('tender/{id}','TenderController@viewTenderid');
    });
    
    Route::namespace('ContactUS')->group(function(){
        Route::get('contacthr','ContactUSController@viewContact');
        Route::get('contactus','ContactUSController@sendEmail');
    });
    
    Route::namespace('aboutus')->group(function(){
        Route::get('abouthr','AboutUsController@viewAbout');
    });



});