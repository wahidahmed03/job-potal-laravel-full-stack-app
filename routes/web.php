<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\CompanyAccountController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\AuthController;

Route::get('/',[JobsController::class, 'AllJobsForGustAndUser' ])->name('Home');
Route::post('/',[JobsController::class, 'FilterJobBySearchForNormalUser' ])->name('FilterSearchAndLocation.jobs');
Route::get('/{id}', [JobsController::class, 'ApplyJobPage'])->name('Apply.jobs_page');


Route::group(['middleware' => 'auth2.0'], function(){
    Route::post('/{id}', [JobsController::class, 'ApplyJob'])->name('Apply.job.Route');
    Route::get('/user/application', [JobsController::class, 'ViewUserApplication'])->name('Apply.job.User.Dashbord');
});


Route::post('/filter',[JobsController::class, 'FilterJobByCatagoryList' ])->name('SearchFilter.jobs');




Route::group(['prefix' => 'user'], function () {
    // Registration Routes
    Route::get('/register', [AuthController::class, 'showUserRegisterForm'])->name('user.registerForm');
    Route::post('/register', [AuthController::class, 'register'])->name('user.register');

    // Login Routes
    Route::get('/login', [AuthController::class, 'showUserLoginForm'])->name('user.loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('user.login');
});



Route::group(['prefix' => 'company'], function () {
    // Registration Routes
    Route::get('/register', [AuthController::class, 'showCompanyRegisterForm'])->name('company.register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('company.register');

    // Login Routes
    Route::get('/login', [AuthController::class, 'showCompanyLoginForm'])->name('company.login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('company.login');
});



Route::group(['prefix' => 'company', 'middleware' => 'auth2.0'], function () {
    Route::get('/add-job', [JobsController::class, 'showJobsForm'])->name('Company.add_jobsForm');
    Route::post('/add-job', [JobsController::class, 'AddJobs'])->name('Company.jobs_add');

    Route::get('/manage-jobs', [JobsController::class, 'ManageJobsData'])->name('Company.jobs_ManageForm');
    Route::get('/view-application', [JobsController::class, 'ViewApplicationData'])->name('Company.jobs.view.applicand');
    Route::post('/view-application', [JobsController::class, 'ChangeJobsStatus'])->name('Company.jobs.Change.applicand');
});







Route::get('/Dashboard', function () {
    return view('components.pages.Dashboard.Add_jobs');
});

