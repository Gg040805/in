<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\products;
use App\http\Controllers\productsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\editaccController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


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


Route::get('/address.store', [AddressController::class, 'place'])->name('address');
Route::post('/address.store', [AddressController::class, 'store'])->name('addresses.store');
Route::get('/submit-address', [AddressController::class, 'place'])->name('address');
Route::post('/submit-address', [AddressController::class, 'store'])->name('addresses.store');
//home
Route::get('/udata', [AddressController::class, 'uacc'])->name('udata');
// Route::get('/user-data', [UserController::class, 'udata'])->name('udata');


// web.php (Routes file)
// web.php
Route::delete('/address/{id}', [AddressController::class, 'destroy'])->name('address.destroy');
Route::get('/address/{id}/edit', [AddressController::class, 'editacc'])->name('address.edit');
Route::post('/address/{id}/edit', [AddressController::class, 'edit'])->name('editaddress');
Route::put('/address/{id}', [AddressController::class, 'update'])->name('address.update');


Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot-password');

// Route to handle the form submission and send the password reset link
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.renew');

Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Route to handle the reset password form submission
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Route to show the edit profile form
Route::get('/editprofile', [editaccController::class, 'editProfile'])->name('profile.edit');
Route::get('/profile/update', [editaccController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/update', [editaccController::class, 'updateProfile'])->name('profile.update');
Route::get('/verify-email-change', [UserController::class, 'verifyEmailChange'])->name('profile.verifyEmailChange');
    


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




