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
        Route::get('companysignup','SignupLoginController@companysignup')->name('companysignup');
    });

    Route::namespace('Service')->group(function(){
        Route::get('services','ServiceController@viewService')->name('services');
        Route::get('service/{id}','ServiceController@viewServiceId')->name('service');

    });
    Route::namespace('Blog')->group(function(){
        Route::get('blogs','BlogController@viewBlogs')->name('blogs');
        Route::get('blog/{id}','BlogController@viewBlogId')->name('blog');
       // Route::post('sendingCV','JobController@sendCV');
    });


});
Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] , 'middleware' => 'auth'
],
 function()
{
    Route::namespace('Users')->group(function(){ 
       Route::get('viwechangePassword','UsersController@viwechangePassword')->name('viwechangePassword');
       Route::get('userProfile','UsersController@userInfo')->name('userProfile');
       Route::post('UsercreateNotification','UsersController@UsercreateNotification')->name('UsercreateNotification');
       Route::get('ViewUserNotifaction','UsersController@ViewUserNotifaction')->name('ViewUserNotifaction');
       Route::post('userProfile/updateInfo','UsersController@updateInfo')->name('updateUserInfo');
       Route::post('userProfile/updateLogo','UsersController@updateLogo')->name('updateUserLogo');
       Route::post('userProfile/AddCvDetails','UsersController@AddCvDetails')->name('AddCvDetails');
       Route::post('userProfile/updateCvDetails','UsersController@updateCvDetails')->name('updateCvDetails');
       Route::post('userProfile/deleteCvDetails','UsersController@deleteCvDetails')->name('deleteCvDetails');
       Route::post('userProfile/AddCvSkills','UsersController@AddCvSkills')->name('AddCvSkills');
       Route::post('userProfile/updateCvSkills','UsersController@updateCvSkills')->name('updateCvSkills');
       Route::post('userProfile/deleteCvSkills','UsersController@deleteCvSkills')->name('deleteCvSkills');
       Route::post('userProfile/AddCvRecommendations','UsersController@AddCvRecommendations')->name('AddCvRecommendations');
       Route::post('userProfile/updateCvRecommendations','UsersController@updateCvRecommendations')->name('updateCvRecommendations');
       Route::post('userProfile/deleteCvRecommendations','UsersController@deleteCvRecommendations')->name('deleteCvRecommendations');
       Route::post('changpassword','UsersController@changpassword')->name('changpassword');
       Route::get('userProfile/userResume','ResumeController@getUserCv')->name('userResume');
       Route::get('userProfile/viewCv1','ResumeController@viewCv1')->name('viewCv1');
       Route::get('userProfile/viewCv2','ResumeController@viewCv2')->name('viewCv2');
       Route::get('userProfile/viewCv3','ResumeController@viewCv3')->name('viewCv3');
       Route::post('userProfile/generatePDF1','ResumeController@generatePDF1')->name('generatePDF1');
       Route::post('userProfile/generatePDF2','ResumeController@generatePDF2')->name('generatePDF2');
       Route::post('userProfile/generatePDF3','ResumeController@generatePDF3')->name('generatePDF3');
       Route::get('userProfile/userLetters','ResumeController@userLetters')->name('userLetters');
       Route::get('userProfile/viewCover1','ResumeController@viewCover1')->name('viewCover1');
       Route::get('userProfile/viewCover2','ResumeController@viewCover2')->name('viewCover2');
       Route::get('userProfile/viewCover3','ResumeController@viewCover3')->name('viewCover3');
       Route::post('userProfile/generateCover1','ResumeController@generateCover1')->name('generateCover1');
       Route::post('userProfile/generateCover2','ResumeController@generateCover2')->name('generateCover2');
       Route::post('userProfile/generateCover3','ResumeController@generateCover3')->name('generateCover3');
  });
});
Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] , 'middleware' => 'auth'
],
 function()
{

    Route::namespace('Company')->group(function(){
        Route::get('userInfo','CompanyController@userInfo')->name('userInfo');
        Route::post('Compchangpassword','CompanyController@Compchangpassword')->name('Compchangpassword');
        Route::get('viweCompchangePassword','CompanyController@viweCompchangePassword')->name('viweCompchangePassword');
        Route::post('updateInfo','CompanyController@updateInfo')->name('updateInfo');
        Route::post('updateLogo','CompanyController@updateLogo')->name('updateLogo');
        Route::get('viewJobs','CompanyController@viewJobs')->name('viewJobs');
        Route::get('addJob','CompanyController@addJob')->name('addJob');
        Route::get('viewTenders','CompanyController@viewTenders')->name('viewTenders');
        Route::get('addTender','CompanyController@addTender')->name('addTender');
        Route::post('storeJob','CompanyController@storeJob')->name('storeJob');
        Route::post('storeTender','CompanyController@storeTender')->name('storeTender');
        Route::get('/Tenderdetilse/{id}','CompanyController@viewTenderdetilse')->name('Tenderdetilse');
        Route::get('/Jobdetilse/{id}','CompanyController@viewJobdetilse')->name('Jobdetilse');
     // Route::get('service/{id}','CompanyController@viewServiceId')->name('service');

    });

});
