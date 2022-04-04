<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminJobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contact']);
Route::post('/contact-us', [App\Http\Controllers\HomeController::class, 'saveContact']);

// Route::get('/post-a-job', [App\Http\Controllers\JobController::class, 'create'])->name('post-aa-job');;
// Route::post('/post-a-job', [App\Http\Controllers\JobController::class, 'store']);
// Route::get('/preview-job/{id}', [App\Http\Controllers\JobController::class, 'preview']);
// Route::get('/make-payment/{id}', [App\Http\Controllers\JobController::class, 'payment']);
// Route::post('/payment-done', [App\Http\Controllers\JobController::class, 'paymentDone']);
// Route::get('/freepost', [App\Http\Controllers\JobController::class, 'nonpayment']);

Route::get('/search-job', [App\Http\Controllers\JobController::class, 'searchJobs']);


Route::get('/job-detail/{title}', [App\Http\Controllers\JobController::class, 'detail']);
Route::get('/load-job-detail/{id}', [App\Http\Controllers\JobController::class, 'loadJobDetail']);

Route::get('/nx/login',[App\Http\Controllers\LoginController::class, 'index'])->name('nxlogin');
Route::post('/nx/login',[App\Http\Controllers\LoginController::class, 'process_login'])->name('login.post');
Route::get('/nx/signup',[App\Http\Controllers\SignUpController::class, 'index'])->name('nxsignup');
Route::post('/nx/signup',[App\Http\Controllers\SignUpController::class, 'process_signup'])->name('signup.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/email/verify', [App\Http\Controllers\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}',[App\Http\Controllers\VerificationController::class, 'show'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [App\Http\Controllers\VerificationController::class, 'resend'])->name('verification.resend');
});
Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'showAllCompanies'])->name('show.all.companies');
Route::get('/companies/{name}', [App\Http\Controllers\CompanyController::class, 'showCompany'])->name('show.company');

Route::prefix('admin')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::resource('category', App\Http\Controllers\CategoryController::class)->middleware(['auth'])->except(['show']);
    Route::resource('job', App\Http\Controllers\AdminJobController::class)->middleware(['auth'])->except(['show']);
    Route::resource('company', App\Http\Controllers\AdminCompanyController::class)->middleware(['auth'])->except(['show']);
    Route::get('load-categories', [App\Http\Controllers\CategoryController::class, 'loadCategories'])->middleware(['auth'])->name("admin.load-categories");
    Route::get('load-jobs', [App\Http\Controllers\AdminJobController::class, 'loadJobs'])->middleware(['auth'])->name("admin.load-jobs");
    Route::get('load-companies', [App\Http\Controllers\AdminCompanyController::class, 'loadCompanies'])->middleware(['auth'])->name("admin.load-companies");
    Route::post('make-premium', [App\Http\Controllers\AdminJobController::class, 'makePremium'])->middleware(['auth']);
    Route::post('remove-premium', [App\Http\Controllers\AdminJobController::class, 'removePremium'])->middleware(['auth']);
});

Route::prefix('client')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\ClientController::class, 'index'])->middleware(['auth'])->name('clientdashboard');
    Route::get('post-a-job', [App\Http\Controllers\ClientController::class, 'create'])->name('post-a-job');;
    Route::post('post-a-job', [App\Http\Controllers\ClientController::class, 'store']);
    Route::get('preview-job/{id}', [App\Http\Controllers\ClientController::class, 'preview']);
    Route::get('make-payment/{id}', [App\Http\Controllers\ClientController::class, 'payment']);
    Route::post('payment-done', [App\Http\Controllers\ClientController::class, 'paymentDone']);
    Route::get('freepost', [App\Http\Controllers\ClientController::class, 'nonpayment']);
});

Route::prefix('freelancer')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\FreelancerController::class, 'index'])->middleware(['auth'])->name('freelancerdashboard');
});
// Subscribe

Route::post('subscribe', [App\Http\Controllers\SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('subscribe/verify/{token}', [App\Http\Controllers\SubscriptionController::class, 'verifySubscription'])->name('verify.subscription');
Route::get('unsubscribe/{token}', [App\Http\Controllers\SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');

// 
Route::get('/{city}', [App\Http\Controllers\JobController::class, 'showJobsByCity'])->name('show.jobs.by.city');