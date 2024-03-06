<?php

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
    return view('auth/login');
});

Route::get('login', [App\Http\Controllers\LoginController::class, 'login']);
Route::post('login/login-verification', [App\Http\Controllers\LoginController::class, 'loginvalidation']);

Route::get('login/forgot-password', [App\Http\Controllers\LoginController::class, 'forgotpass']);
Route::get('email-verified/new-password', [App\Http\Controllers\LoginController::class, 'newpasswordcreation']);

Route::get('Mainpage/dashboard', [App\Http\Controllers\SideNavController::class, 'dashboard']);
Route::get('Mainpage/messages', [App\Http\Controllers\SideNavController::class, 'messages']);
Route::get('Mainpage/offboarding', [App\Http\Controllers\SideNavController::class, 'offboarding']);
Route::get('Mainpage/termination', [App\Http\Controllers\SideNavController::class, 'termination']);
Route::get('Mainpage/signout', [App\Http\Controllers\SideNavController::class, 'signOut']);


Route::prefix('api')->group(function () {
    Route::post('receive-message', [App\Http\Controllers\MessageController::class, 'receiveMessage']);
});