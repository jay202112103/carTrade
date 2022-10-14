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
//ROUTE FOR city/states at the time of register
Route::get('/registration','RegisterController@index')->name('RegisterController.index');
//ROUTE FOR VIEW OF LOGIN
Route::get('/login', function () {
    return view('login');
})->name('login');
//VIEW FOR SIDENAV OF ADMIN
Route::get('/side', function () {
    return view('adminSideNav');
});
//ROUTE FOR VIEW FOR ADMIN HOME

Route::get('/adhome', function () {
    $userCount=DB::table('user_master')->count();
    $carsCount=DB::table('car_details')->count();
    $requestCars=DB::table('car_details')->where('status',0)->count();
    $feedbackCount = DB::table('feedback')->count();
    return view('admin.adminhome',compact('userCount','carsCount','requestCars','feedbackCount'));
    

})->name('admin.adminhome');
//ROUTE FOR CHANGE PASSWORD
Route::get('/home/userchangepassword','LoginController@changepassword')->name('Login.changepassword');
//Route for logout
Route::get('/home/logout','LoginController@logout')->name('logout');
//ROUTE FOR SAVING REGISTERED USER
Route::post('/register','RegisterController@save')->name('RegisterController.save');
//Route for view of change profile
Route::get('/changeProfile','RegisterController@changeProfile')->name('changeProfile');
// ROUTE FOR UPDATING PROFILE VALUES
Route::post('/updateUserDetails','RegisterController@updateProfile')->name('updateUserDetails');
Route::post('/updateProfile/getcity','RegisterController@userUpdateGetCity')->name('updateProfile.getCity');
//ROUTE FOR GETTING CITY of STATE
Route::post('/registration/getcity','RegisterController@getCity')->name('RegisterController.getcity');
//ROUTE FOR LOGIN
Route::post('/loggedin','LoginController@checkLogin')->name('loggedin.checkLogin');
//ROUTE FOR FORGET PASSWORD
Route::post('/login/forgotpassword','LoginController@forgotpassword')->name('LoginController.forgotPassword');
//ROUTE FOR USER VIEW HOME PAGE
Route::get('/home','HomePageController@viewCars')->name('HomePageController.viewCars');

//ROUTE TO GET CURRENT PASSWORD
Route::post('/home/userchangepassword/sr','LoginController@getCurrentPassword')->name('getcurrentpassword');
//ROUTE TO UPDATE PASSWORD
Route::post('/home/userchangepassword/submit','LoginController@updatePassword')->name('updatePassword');

//ROUTE FOR CAR SELL
Route::post('/sellCars','CarRegistrationController@uploadCar')->name('uploadCar');

//View for car reg controller
Route::get('/sellingCar','CarRegistrationController@viewCarForm')->name('viewCarForm');
//Route for uploading car
Route::post('/sellingCar/getmodel','CarRegistrationController@carGetModel')->name('uploadCar.getModel');
//View for view car status
Route::get('/viewCar','CarRegistrationController@viewCar')->name('viewCar');
//View of car details
Route::get('/viewDetails/{car_details_id}','HomePageController@viewCarsDetails')->name('viewCarsDetails');
//ROUTE FOR ADMIN VERIFY CAR REQUEST
Route::get('/approveRequest','AdminController@approveRequest')->name('approveRequest');
//ROute to view car details from admin side
Route::get('/viewUserCarsDetails/{car_details_id}','AdminController@viewUserCarsDetails')->name('viewUserCarsDetails');
//Route for approve car
Route::post('/approveCar','AdminController@changeStatus_car')->name('changeStatus_car');
//Route for search cars
Route::get('/searchCar','CarRegistrationController@searchCar')->name('searchCar');
//Route for viwew of addbrand 
Route::get('/addBrands', 'AdminController@addBrands')->name('admin.addBrands');
//Route for add brands
Route::post('/addCarBrands','AdminController@addCarBrands')->name('admin.addCarBrands');
//Route for view of add models
Route::get('/addModels','AdminController@addModels')->name('admin.addModels');
//Route for add models admin
Route::post('/addCarModels','AdminController@addCarModels')->name('admin.addCarModels');
//Route for booking car
Route::post('/carBooking','CarBookingController@bookCar')->name('bookCar');
//Route for view booking car
Route::get('/viewCarbooking','CarBookingController@viewBookedDetails')->name('users.home.viewBookedCar');
//Route for car test drive details
Route::get('/view/car/{id}','CarBookingController@viewTestCar')->name('users.home.viewSingleCar');
