<?php

use App\Models\Transaction;
use App\Http\Controllers\DataLoad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\PaymentInfoController;
use App\Http\Controllers\ProfileInfoController;
use App\Http\Controllers\AdvertisementController;

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

Route::get('/', function () {
    return view('HomePage.homeverse');
});

Route::view('price', 'price.index')->name('price');
Route::get('predict', [PredictionController::class , 'predict'])->name('predict');


Route::view('ContactUs', 'ContactUs.contact');
Route::view('Home', 'HomePage.homeverse');
route::get('AddHome',[DataLoad::class,'LoadAddHomePage'])->name('AddHomeWithData');
route::get('BuyPage',[DataLoad::class,'LoadBuyPage']);
route::get('RentPage',[DataLoad::class,'LoadRentPage']);
route::get('Update',[DataLoad::class,'LoadUpdateHomePage']);//changed from post to get
route::post('UpdateHome/{id}',[DataLoad::class,'LoadUpdateHomePage']);
route::get('Srch',[DataLoad::class,'LoadSearchPage']);
route::get('AddtoFavs',[FavouriteController::class,'store']);
route::post('SaveProfileData',[ProfileInfoController::class,'store']);
route::post('SaveAddress',[AddressController::class,'store']);
route::post('UpdatePassword',[UserInfoController::class,'update']);

Route::view('Login', 'LoginAndSignUp.login');
Route::view('UserInfo', 'UserInfo.UserInfo');
Route::view('CodeVerification', 'UserInfo.EmailVerification');
Route::view('Rent', 'RentPage.Rent');
Route::view('Buy', 'buy.Buy');
Route::view('Profile', 'Profile.profile');
route::post('LoginToSystem',[UserInfoController::class,'UserLogin'])->name('LoginCheck');
route::get('LoginToSystem',[UserInfoController::class,'UserLogin']);
route::post('Register',[UserInfoController::class,'store'])->name('Signup');
route::post('Logout',[UserInfoController::class,'LogOut'])->name('Logout');
route::post('VerifyEmail',[UserInfoController::class,'VerifyEmail']);
route::get('Show',[UserInfoController::class,'show'])->name('ShowUsers');
route::post('StoreProperty',[PropertyController::class,'store'])->name('AddProperty');
route::post('UpdateProperty/{id}',[PropertyController::class,'update'])->name('UpdateProperty');
route::post('DeleteProperty/{id}',[PropertyController::class,'destroy'])->name('DeletePostProperty');
route::get('DeleteProperty/{id}',[PropertyController::class,'destroy'])->name('DeleteGetProperty');
route::get('DeleteFavProperty/{id}',[FavouriteController::class,'destroy']);
route::post('SearchInProperties',[SearchController::class,'Search'])->name('Search');
//////////////////////////////added new the route get search in properties for pagination

//////////////////
route::post('SecondSearch',[SearchController::class,'SecondSearch'])->name('Search2');
route::post('RentFilter',[SearchController::class,'FilterInRent'])->name('FilterRent');
route::get('RentFilter',[SearchController::class,'FilterInRent']);
route::post('BuyFilter',[SearchController::class,'FilterInBuy'])->name('FilterBuy');
route::get('BuyFilter',[SearchController::class,'FilterInBuy']);
route::post('ContactSubmit',[ContactController::class,'store']);
route::get('ViewProperty/{id}',[PropertyController::class,'ViewProperty']);

Route::get('/create', [AdvertisementController::class,'create'])->name('advertisements.create');
Route::post('store', [AdvertisementController::class,'store'])->name('advertisements.store');
//Route::get('/{advertisement}', 'App\Http\Controllers\AdvertisementController@show')->name('advertisements.show');
//Route::get('/{advertisement}/edit', 'App\Http\Controllers\AdvertisementController@edit')->name('advertisements.edit');
//Route::put('/{advertisement}', 'App\Http\Controllers\AdvertisementController@update')->name('advertisements.update');
//Route::delete('/{advertisement}', 'App\Http\Controllers\AdvertisementController@destroy')->name('advertisements.destroy');




route::get('SendEmail',[UserInfoController::class,'SendEmail']);
route::post('Sort',[SearchController::class,'Sort']);
Route::view('SearchResults', 'Search.SearchResults');
Route::view('VerifyEmail','UserInfo.EmailVerification');
route::post('StorePaymentInfo',[PaymentInfoController::class,'store']);

//test
Route::view('AdminPage','AdminPage.profile');
route::post('AddAdmin',[UserInfoController::class,'AddAdmin']);
route::post('DeleteUser',[UserInfoController::class,'DeleteUser']);
route::post('AddType',[TypeController::class,'store']);
route::post('DeleteType',[TypeController::class,'destroy']);
//route::get('BuyPage',[TypeController::class,'show'])->name('BuyPageWithData');
route::get('Pay/{id}',[PaymentController::class,'Payment']);
route::get('PaymentSuccess/{id}',[PaymentController::class,'PaymentSuccess'])->name('PS');
route::get('PaymentCancel',[PaymentController::class,'PaymentCancel'])->name('PC');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

