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

Route::get('/hh', function () {
    return view('email.jobsApplying');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**/
Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
 function()
{

    Route::namespace('Home')->group(function(){
        Route::get('/','HomeController@viewHome')->name('/');
        Route::get('homehr','HomeController@viewHome')->name('homehr');
    });
    
    Route::namespace('Tender')->group(function(){
        Route::get('tenders','TenderController@viewTenders')->name('tenders');
        Route::get('tender/{id}','TenderController@viewTenderid')->name('tender/{id}');
        Route::get('Tender/dowenloadFile/{filename}','TenderController@dowenloadFile');

    });
    
    Route::namespace('ContactUs')->group(function(){
        Route::get('contacthr','ContactUSController@viewContact')->name('contacthr');
        Route::post('contactus','ContactUSController@sendEmail')->name('contactus');
    });
    
    Route::namespace('aboutus')->group(function(){
        Route::get('abouthr','AboutUsController@viewAbout')->name('abouthr');
    });
    Route::namespace('Job')->group(function(){
        Route::get('jobs','JobController@viewJobs')->name('jobs');
        Route::get('job/{id}','JobController@viewJobId')->name('job');
       // Route::post('sendingCV','JobController@sendCV');
    });
    Route::namespace('Job')->group(function(){
        Route::post('sendingCV','JobController@sendCV')->name('sendCV');
    });
    

    Route::namespace('Sign')->group(function(){
        Route::get('loginhr','SignupLoginController@loginShow')->name('loginhr');
        Route::get('signuphr','SignupLoginController@signupShow')->name('signuphr');
    });

});

