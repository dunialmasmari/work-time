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


Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
 function()
{

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
    Route::get('/job_add', 'JobDashboarController@job_add'); 
    Route::get('/jobactivation/{id}','JobDashboarController@jobactivation');
});

Route::group(['namespace' => 'Service', 'prefix' => 'controlpanel', 'middleware' => 'auth' ],function()
 {
    Route::apiResource('/service', 'ServiceDashboarControlle'); 
    Route::post('/updateservice','ServiceDashboarControlle@updateservice');
    Route::get('/service_add', 'ServiceDashboarControlle@service_add'); 
    Route::get('/serviceactivation/{id}','ServiceDashboarControlle@serviceactivation');
});

Route::group(['namespace' => 'Blog', 'prefix' => 'controlpanel', 'middleware' => 'auth' ],function()
 {
    Route::apiResource('/blog', 'BlogDashboarControlle'); 
    Route::post('/updateblog','BlogDashboarControlle@updateblog');
    Route::get('/blog_add', 'BlogDashboarControlle@blog_add'); 
    Route::get('/blogactivation/{id}','BlogDashboarControlle@blogactivation');
});


Route::group(['namespace' => 'Advertisement', 'prefix' => 'controlpanel', 'middleware' => 'auth' ],function()
 {
    Route::apiResource('/Advertising', 'AdvertisementDashboarControlle'); 
    Route::post('/updateAdvertising','AdvertisementDashboarControlle@updateAdvertising');
    Route::get('/Advertising_add', 'AdvertisementDashboarControlle@Advertising_add'); 
    Route::get('/Advertisingactivation/{id}','AdvertisementDashboarControlle@Advertisingactivation');
});
/*Route::get('/major', function () {
    return view('admin/major');
});
Route::namespace('Major')->group(function(){
    Route::get('showmajor','MajorController@index')->name('home');;
    Route::post('addmajor','MajorController@store');

    });*/
});
