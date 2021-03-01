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

Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] , 'middleware' => 'auth'
],
 function()
{
    Route::group(['namespace' => 'Report', 'prefix' => 'controlpanel' ],function()
    {
       //Route::get('/home', function () {return view('admin/home');});
         Route::get('/home','ReportController@index');
         Route::get('/reports','ReportController@reports');
   
     });
 /** major Route */
 Route::group(['namespace' => 'Major', 'prefix' => 'controlpanel' ],function()
 {
    //Route::get('/home', function () {return view('admin/home');});
  //  Route::get('/home','ReportController@index');

    Route::apiResource('/major', 'MajorController' ,
    ['names' => [
            'index' => 'controlpanel.major.index',
            'show' => 'controlpanel.major.edite',
            'store' => 'controlpanel.major.store',
    ]]); 
    Route::post('/updatemajor','MajorController@updatemajor')->name('updatemajor');
    Route::get('/majoractivation/{id}','MajorController@majoractivation')->name('majoractivation');
  });

/** tender Route */
Route::group(['namespace' => 'Tender', 'prefix' => 'controlpanel' ],function()
 {
    Route::resource('/tender', 'TenderDashboarController',
    ['names' => [
                   //'update' => 'admin.contents.update',
                   //'edit' => 'admin.contents.edit',
                   'index' => 'controlpanel.tender.index',
                   'show' => 'controlpanel.tender.edite',
                   'store' => 'controlpanel.tender.store',
               ]]); 
    Route::post('/updatetender','TenderDashboarController@updatetender')->name('updatetender');
    Route::get('/tender_add', 'TenderDashboarController@tender_add')->name('tender_add'); 
    Route::get('/viewTenderdetilse/{id}', 'TenderDashboarController@viewTenderdetilse')->name('viewTenderdetilse');
    Route::get('/tenderactivation/{id}','TenderDashboarController@tenderactivation')->name('tenderactivation');
});

Route::group(['namespace' => 'Job', 'prefix' => 'controlpanel' ],function()
 {
    Route::apiResource('/job', 'JobDashboarController' , 
    ['names' => [
        'index' => 'controlpanel.job.index',
        'show' => 'controlpanel.job.edite',
        'store' => 'controlpanel.job.store',
    ]]); 
    Route::post('/updatejob','JobDashboarController@updatejob')->name('updatejob');
    Route::get('/job_add', 'JobDashboarController@job_add')->name('job_add'); 
    Route::get('/viewJobdetilse/{id}','JobDashboarController@viewJobdetilse')->name('viewJobdetilse');
    Route::get('/jobactivation/{id}','JobDashboarController@jobactivation')->name('jobactivation');
});

Route::group(['namespace' => 'Service', 'prefix' => 'controlpanel' ],function()
 {
    Route::apiResource('/service', 'ServiceDashboarControlle' ,
    ['names' => [
        'index' => 'controlpanel.service.index',
        'show' => 'controlpanel.service.edite',
        'store' => 'controlpanel.service.store',
    ]] ); 
    Route::post('/updateservice','ServiceDashboarControlle@updateservice')->name('updateservice');
    Route::get('/service_add', 'ServiceDashboarControlle@service_add')->name('service_add'); 
    Route::get('/serviceactivation/{id}','ServiceDashboarControlle@serviceactivation')->name('serviceactivation');
});

Route::group(['namespace' => 'Blog', 'prefix' => 'controlpanel' ],function()
 {
    Route::apiResource('/blog', 'BlogDashboarControlle' , 
    ['names' => [
        'index' => 'controlpanel.blog.index',
        'show' => 'controlpanel.blog.edite',
        'store' => 'controlpanel.blog.store',
    ]]); 
    Route::post('/updateblog','BlogDashboarControlle@updateblog')->name('updateblog');
    Route::get('/blog_add', 'BlogDashboarControlle@blog_add')->name('blog_add'); 
    Route::get('/blogactivation/{id}','BlogDashboarControlle@blogactivation')->name('blogactivation');
});


Route::group(['namespace' => 'Advertisement', 'prefix' => 'controlpanel' ],function()
 {
    Route::apiResource('/Advertising', 'AdvertisementDashboarControlle' ,
    ['names' => [
        'index' => 'controlpanel.Advertising.index',
        'show' => 'controlpanel.Advertising.edite',
        'store' => 'controlpanel.Advertising.store',
    ]]); 
    Route::post('/updateAdvertising','AdvertisementDashboarControlle@updateAdvertising')->name('updateAdvertising');
    Route::get('/Advertising_add', 'AdvertisementDashboarControlle@Advertising_add')->name('Advertising_add'); 
    Route::get('/Advertisingactivation/{id}','AdvertisementDashboarControlle@Advertisingactivation')->name('Advertisingactivation');
});

Route::group(['namespace' => 'User', 'prefix' => 'controlpanel' ],function()
 {
    Route::apiResource('/user', 'UserController' ,
    ['names' => [
        'index' => 'controlpanel.user.index',
        'show' => 'controlpanel.user.edite',
        'store' => 'controlpanel.user.store',
    ]]); 
    Route::post('/updateuser','UserController@updateuser')->name('updateuser');
    Route::get('/user_add', 'UserController@user_add')->name('user_add'); 
    Route::get('/useractivation/{id}','UserController@useractivation')->name('useractivation');
});

Route::group(['namespace' => 'User', 'prefix' => 'controlpanel' ],function()
 {
    Route::apiResource('/CompanyUser', 'CompanyUserController' ,
    ['names' => [
        'index' => 'controlpanel.CompanyUser.index',
    ]]); 
    // Route::post('/updateuser','CompanyUserController@updateuser')->name('updateuser');
    // Route::get('/user_add', 'CompanyUserController@user_add')->name('user_add'); 
    Route::get('/viewJobdetilse/{id}','CompanyUserController@viewJobdetilse')->name('viewJobdetilse');
    Route::get('/viewTenderdetilse/{id}','CompanyUserController@viewTenderdetilse')->name('viewTenderdetilse');
    Route::get('/viewCompanydetilse/{id}','CompanyUserController@viewCompanydetilse')->name('viewCompanydetilse');
    Route::get('/viewDetails/{id}','CompanyUserController@viewDetails')->name('viewDetails');
    Route::get('/CompanyUseractivation/{id}','CompanyUserController@CompanyUseractivation')->name('CompanyUseractivation');
});

Route::group(['namespace' => 'User', 'prefix' => 'controlpanel' ],function()
 {
    Route::apiResource('/SercheUser', 'SercheUserController' ,
    ['names' => [
        'index' => 'controlpanel.SercheUser.index',
    ]]); 
  
    Route::get('/viewUserdetilse/{id}','SercheUserController@viewUserdetilse')->name('viewUserdetilse');
    Route::get('/SercheUseractivation/{id}','SercheUserController@SercheUseractivation')->name('SercheUseractivation');
});

/*Route::get('/major', function () {
    return view('admin/major');
});
Route::namespace('Major')->group(function(){
    Route::get('showmajor','MajorController@index')->name('home');;
    Route::post('addmajor','MajorController@store');

    });*/

    Route::group(['namespace' => 'Notification', 'prefix' => 'controlpanel' ],function()
 {
    Route::get('/Notifications','NotificationController@viewNotifications')->name('Notifications');
    Route::get('/Companies','NotificationController@viewNewCompany')->name('Companies');
    Route::get('/Messages','NotificationController@viewMessages')->name('Messages');
    Route::get('/TendersPosting','NotificationController@TendersPosting')->name('TendersPosting');
    Route::get('/JobsPosting','NotificationController@JobsPosting')->name('JobsPosting');
    Route::get('/postTender/{id}','NotificationController@viewTender')->name('postTender');
    Route::get('/postJob/{id}','NotificationController@viewJob')->name('postJob');
    Route::get('/acceptAccount/{id}','NotificationController@acceptAccount')->name('acceptAccount');
    Route::get('/rejectAccount/{id}','NotificationController@rejectAccount')->name('rejectAccount');

});

});
