<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Http\Controllers\VerifyUserController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\DoctorController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\SubscriberController;

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

//------------ Disable Route ------------//
Auth::routes([
    'register'         => false,
    'verify'           => false,
    'password.reset'   => false,
    'password.update'  => false,
    'password.email'   => false,
    'password.request' => false
]);

//------------ Home Page Route ------------//
Route::get('/', [FrontendController::class, 'index'])->name('index');

//------------ Register Route ------------//
Route::get('register', [AuthController::class, 'index'])->name('user.register');
Route::post('register/store', [AuthController::class, 'store'])->name('user.register.store');

//------------ Varify User ------------//
Route::get('verify-code/{token}', [VerifyUserController::class, 'verifiedCode'])->name('verify.code');

// Forgot password
Route::get('forgot-passowrd', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('forgot-passowrd/sent', [AuthController::class, 'forgotPasswordSent'])->name('forgot.password.sent');
Route::get('forgot-passowrd-token/{token}', [AuthController::class, 'forgotPasswordToken'])->name('forgot.password.token');
Route::post('password-update', [AuthController::class, 'passwordUpdate'])->name('user.password.update');

Route::prefix('frontend')->name('frontend.')->group(function () {
    //------------ 	Portfolio Details  ------------//
    Route::get('portfolio/{id}', [PortfolioController::class, 'portfolio'])->name('portfolio');

    //------------ 	Doctors Details  ------------//
    Route::get('doctors', [DoctorController::class, 'doctors'])->name('doctors');
    Route::get('doctors/{id}', [DoctorController::class, 'singleDoctors'])->name('single.doctors');

    //------------ Services  ------------//
    Route::get('services', [ServiceController::class, 'services'])->name('services');
    Route::get('service/{id}', [ServiceController::class, 'serviceDetailse'])->name('service.details');

    //------------ Testimonials  ------------//
    Route::get('testimonials', [FrontendController::class, 'testimonials'])->name('testimonials');

    //------------ Pricing  ------------//
    Route::get('pricing', [FrontendController::class, 'pricing'])->name('pricing');

    //------------ Blog  ------------//
    Route::get('blogs', [BlogController::class, 'blogs'])->name('blogs');
    Route::get('blog/{id}', [BlogController::class, 'blog'])->name('blog');
    Route::post('view/count', [BlogController::class, 'viewCount'])->name('view.count');
    Route::post('blog/comment', [BlogController::class, 'blogComment'])->name('blog.comment');
    Route::post('blog/comment/replay', [BlogController::class, 'blogCommentRepay'])->name('blog.comment.repay')->middleware('auth');
    Route::get('categorie/{id}', [BlogController::class, 'categorieBlog'])->name('categorie.blog');
    Route::post('blog/search', [BlogController::class, 'blogSearch'])->name('blog.search');

    //------------ Contact  ------------//
    Route::get('contact',[ContactController::class,'contact'])->name('frontend.contact');
    Route::post('contact/store',[ContactController::class,'store'])->name('frontend.contact.store');
    Route::get('time-table',[ContactController::class,'timeTable'])->name('frontend.time.table');

    //------------ Contact  ------------//
    Route::post('department',[AppointmentController::class,'departmentDoctor'])->name('department.doctor');
});

//------------ Subscribe  ------------//
Route::prefix('subscribe')->name('subscribe.')->group(function () {
    Route::post('store', [SubscriberController::class, 'store'])->name('store');
});
