<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register',[UserController::class,'showRegister']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/check-email', [UserController::class, 'checkEmail']);

Route::get('/user', [UserController::class, 'getUser']);

// Route::get('/test', function () {
//     return view('user.auth-test');
// })->middleware('auth');

Route::middleware(['auth', 'role:applicant'])->group(function () {
    Route::get('/test', function () {
        return view('user.auth-test');
    });
});

Route::middleware(['auth', 'role:employer'])->group(function () {
    Route::get('/employer-test', function () {
        return view('user.employer-test');
    });
});