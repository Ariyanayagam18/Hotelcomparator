<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\AjaxController;

use App\Http\Controllers\HomeController;




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

// Route::get('/homepage', function () {
//     return view('welcome');
// });

//homeurl
// Route::get('/', function () {
//     return view('welcome')->with('login',1);
// });

Route::get('/', [App\Http\Controllers\AjaxController::class, 'defaultDatas'])->name('defaultDatas');



Auth::routes();

//google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('home');
//     })->name('dashboard');
// });

//redirect homepage
Route::get('/hotels', function () {
            return view('welcome')->with('login',2);
        })->name('hotels');
   
// // Facebook Login URL
// Route::prefix('facebook')->name('facebook.')->group( function(){
//     Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
//     Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
// });

//Facebook

Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

//Route::any('/userlogin', array('uses' => 'App\Http\Controllers\Auth\LoginController@select'))->name('userlogin');

//Route::get('/loginuser', [App\Http\Controllers\LoginController::class, 'loginuser'])->name('userlogin');

//Route::post('/loginuser', [LoginController::class, 'select'])->name('userlogin');
//Route::post('/submitform', [LoginController::class, 'submitform'])->name('submitform');

Route::any('/loginuser', 'App\Http\Controllers\Auth\LoginController@select')->name('userlogin');

Route::any('/login', 'App\Http\Controllers\Auth\LoginController@index')->name('login');

//Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::get('login', '\App\Http\Controllers\Auth\LoginController@dataselet');

Route::get('/afterlogin', function () {
    //return view('pages.afterlogin');
    return view('pages.afterlogin')->with('login',2);
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::controller(AjaxController::class)->group(function(){
    Route::get('cities', 'cities')->name('cities');
    Route::get('getHotels', 'getHotels')->name('getHotels');   // search by hotel word 
    Route::get('suggestPlaces','suggestPlaces')->name('suggestPlaces');
    Route::get('currency','currency')->name('currency');
    Route::get('getExchangedCurrency','getExchangedCurrency')->name('getExchangedCurrency');
    Route::get('partnerLink','apiAccess')->name('apiAccess');
    Route::get('similarHotelsnearBy','similarHotelsnearBy')->name('similarHotelsnearBy');
    // Route::get('locale','locale')->name('locale');
    Route::get('searchByRegionId', 'searchByRegionId')->name('searchByRegionId');   // search by RegionID
});


//search route

Route::any('hotelsearch',[AjaxController::class, 'getapi']);


//Route::any('/userlogin', array('uses' => 'App\Http\Controllers\Auth\LoginController@select'))->name('userlogin');



Route::get('/hotelDetails',[AjaxController::class, 'hotelDetails']);

Route::get('/language', [AjaxController::class, 'locale']);


Route::get('/viewmoredesign', function () {
    //return view('pages.afterlogin');
    return view('viewmoreold')->with('login',2);
});