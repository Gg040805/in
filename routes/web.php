<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\products;
use App\http\Controllers\productsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\editaccController;


// UserController is already imported, so we can remove this lineuse App\Http\Controllers\loginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//home
Route::get("/",[productsController::class,'home'])->name('home');

Route::post("/addcart/{product}",[productsController::class,'addcart'])->middleware("auth");


//cart
Route::get("/cartlist",[productsController::class,'cartlist']);

Route::put("/checkout/{cartid}",[productsController::class,'checkout']);

Route::delete("/{id}/cartdelete",[productsController::class,'delete']);

// In routes/web.php


Route::get('/address', [AddressController::class, 'place'])->name('address');
Route::post('/address.store', [AddressController::class, 'store'])->name('addresses.store');
// Route::get('/userdata', [AddressController::class, 'u'])->name('u.data');
Route::get('/userdata', [AddressController::class, 'udata'])->name('udata');
Route::post('/submit-address', [AddressController::class, 'store'])->name('address.store');
// Route to show the edit profile form
Route::get('/editprofile', [editaccController::class, 'editProfile'])->name('profile.edit');

Route::post('/profile/update', [editaccController::class, 'updateProfile'])->name('profile.update');

// Route to display the profile page
Route::get('/profile', [editaccController::class, 'editProfile'])->name('profile');

// Password Reset Routes
// Route to display the password reset form




Auth::routes(['verify' => true]);


//login 
Route::get("/login",[UserController::class,'showLoginForm'])->name("login");
Route::post("/loginverify", [UserController::class, 'login'])->name("loginverify");

Route::get('/register', [UserController::class, 'create'])->name('register');

Route::post("/register", [UserController::class, 'register'])->name('f_register');

Route::get('/verifyOtp', [UserController::class, 'mark'])->name('otp.verify');

Route::post('/verifyOtp', [UserController::class, 'verifyOtp'])->name('otp.verify.post');

Route::post("/resend-otp", [UserController::class, 'resendOtp'])->name('otp.resend');

Route::get("/logout",[UserController::class,'logout'])->name("logout");

Route::post("/logout",[UserController::class,'destroy']);




