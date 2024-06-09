<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicantController;

use App\Http\Controllers\ApplicantExperienceController;
use App\Http\Controllers\ApplicantCertificateController;
use App\Http\Controllers\ApplicantProjectController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/event', function () {
    return view('feature.event');
})->name('event');

Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage');


Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/homepage', [UserController::class, 'homepage']);

Route::get('/register',[UserController::class,'showRegister']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/check-email', [UserController::class, 'checkEmail']);

Route::get('/user', [UserController::class, 'getUser']);

Route::middleware(['auth', 'role:applicant'])->group(function () {
    Route::get('/profile', function () {
        return view('user.profile');
    });
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::put('/applicants/{id}', [ApplicantController::class, 'update']);
});

Route::apiResource('applicants.experiences', ApplicantExperienceController::class);
Route::apiResource('applicants.certificates', ApplicantCertificateController::class);
Route::apiResource('applicants.projects', ApplicantProjectController::class);
