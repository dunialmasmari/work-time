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
Route::group(['prefix' => LaravelLocalization::setLocale(),
'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
 function()
{
Route::get('/homehr', function () {
    return view ('HR.home');
})->name('homehr');

Route::get('/abouthr', function () {
    return view ('HR.about');
})->name('abouthr');

Route::get('/contacthr', function () {
    return view ('HR.contact');
})->name('contacthr');

Route::get('/tenders', function () {
    return view ('HR.tenders');
})->name('tenders');

Route::get('/tenderDetails', function () {
    return view ('HR.tenderDetails');
})->name('tenderDetails');
});