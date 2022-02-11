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

Route::get('/post-a-job', [App\Http\Controllers\JobController::class, 'create'])->name('post-a-job');;
Route::post('/post-a-job', [App\Http\Controllers\JobController::class, 'store']);
Route::get('/preview-job/{id}', [App\Http\Controllers\JobController::class, 'preview']);
Route::get('/make-payment/{id}', [App\Http\Controllers\JobController::class, 'payment']);
Route::post('/payment-done', [App\Http\Controllers\JobController::class, 'paymentDone']);

Route::get('/search-job', [App\Http\Controllers\JobController::class, 'searchJobs']);


Route::get('/job-detail/{id}', [App\Http\Controllers\JobController::class, 'detail']);
Route::get('/load-job-detail/{id}', [App\Http\Controllers\JobController::class, 'loadJobDetail']);

// company routes

Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'showAllCompanies'])->name('show.all.companies');
Route::get('/companies/{name}', [App\Http\Controllers\CompanyController::class, 'showCompany'])->name('show.company');

Route::prefix('admin')->group(function(){
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::resource('category', CategoryController::class)->middleware(['auth'])->except(['show']);
    Route::resource('job', AdminJobController::class)->middleware(['auth'])->except(['show']);
    Route::get('load-categories', [App\Http\Controllers\CategoryController::class, 'loadCategories'])->middleware(['auth'])->name("admin.load-categories");
    Route::get('load-jobs', [App\Http\Controllers\AdminJobController::class, 'loadJobs'])->middleware(['auth'])->name("admin.load-jobs");
    Route::post('make-premium', [App\Http\Controllers\AdminJobController::class, 'makePremium'])->middleware(['auth']);
    Route::post('remove-premium', [App\Http\Controllers\AdminJobController::class, 'removePremium'])->middleware(['auth']);
});

// Subscribe

Route::post('subscribe', [App\Http\Controllers\SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('subscribe/verify/{token}', [App\Http\Controllers\SubscriptionController::class, 'verifySubscription'])->name('verify.subscription');
Route::get('unsubscribe/{token}', [App\Http\Controllers\SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');

// 
Route::get('/{city}', [App\Http\Controllers\JobController::class, 'showJobsByCity'])->name('show.jobs.by.city');