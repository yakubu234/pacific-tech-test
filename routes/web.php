<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

    Route::get('signup', [UserController::class,'index']);
    Route::get('verify.email/{token}', [EmailVerificationController::class,'verify'])->name('verify.email');
    Route::post('register', [UserController::class,'register'])->name("register");
    Route::get('success', [UserController::class,'registrationSuccessful'])->name("registration.success");
    Route::get('error', [UserController::class,'displayError'])->name("error");

