<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicantController;

use App\Http\Controllers\ApplicantExperienceController;
use App\Http\Controllers\ApplicantCertificateController;
use App\Http\Controllers\ApplicantProjectController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\JobOfferController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/explore-jobs', function () {
    return view('job.jobs');
});

Route::get('/explore-jobs/{id}', function ($id) {
    return view('job.job-details', ['id' => $id]);
})->name('job.details');


Route::get('/explore-companies', function () {
    return view('companies');
});

Route::get('/explore-events', function () {
    return view('events');
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

Route::middleware(['auth', 'role:applicant'])->group(function () {
    Route::get('/profile', function () {
        return view('user.profile');
    });
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::put('/applicants/{id}', [ApplicantController::class, 'update']);
    Route::post('/users/{id}/profile-image', [UserController::class, 'updateProfileImage']);
    Route::post('/upload-test', [UserController::class, 'uploadTest']);
});

Route::apiResource('applicants.experiences', ApplicantExperienceController::class);
Route::apiResource('applicants.certificates', ApplicantCertificateController::class);
Route::apiResource('applicants.projects', ApplicantProjectController::class);
Route::apiResource('companies', CompanyController::class);
Route::apiResource('professions', ProfessionController::class);
Route::apiResource('job_offers', JobOfferController::class);