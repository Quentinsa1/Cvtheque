<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/job/{id}', [JobController::class, 'showJob'])->name('showJob');
Route::get('apply-job/{job_id}', [JobController::class, 'applyJob'])->name('job.apply');
Route::post('apply-job/{job_id}', [JobController::class, 'storeApplication']);

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Routes pour les CV
    Route::get('/addcv', [CvController::class, 'cvform'])->name('admin.cvform');
    Route::post('/cvform', [CvController::class, 'storeCv'])->name('admin.cvform.submit');
    Route::get('/cvlist', [CvController::class, 'cvlist'])->name('admin.cvlist');
    Route::get('/cvsearch', [CvController::class, 'searchCv'])->name('admin.cvsearch');

    // Routes pour les offres d'emploi
    Route::get('/addjob', [JobController::class, 'jobform'])->name('admin.jobform');
    Route::post('/jobs', [JobController::class, 'storeJob'])->name('admin.storeJob');
    Route::get('/joblist', [JobController::class, 'joblist'])->name('admin.joblist');
    Route::get('/editJob/{id}', [JobController::class, 'editJob'])->name('admin.editJob');
    Route::match(['post', 'put'], '/updateJob/{id}', [JobController::class, 'updateJob'])->name('admin.updateJob');
    Route::delete('/deleteJob/{id}', [JobController::class, 'deleteJob'])->name('admin.deleteJob');

    // Middleware pour les routes nécessitant une authentification admin
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });

});
