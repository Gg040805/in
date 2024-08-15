<?php

use Illuminate\Support\Facades\Route;
use App\Models\products;
use App\http\Controllers\productsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\loginController;

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



//login 
Route::get("/login",[UserController::class,'showLoginForm'])->name("login");
Route::post("/loginverify", [UserController::class, 'login'])->name("login");

Route::get('/register', [UserController::class, 'create'])->name('register');

Route::post("/register", [UserController::class, 'register'])->name('f_register');

Route::get('/verifyOtp', [UserController::class, 'mark'])->name('otp.verify');

Route::post('/verifyOtp', [UserController::class, 'verifyOtp'])->name('otp.verify.post');

Route::post("/resend-otp", [UserController::class, 'resendOtp'])->name('otp.resend');

Route::post("/logout",[UserController::class,'destroy']);




