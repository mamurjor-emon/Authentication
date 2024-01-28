<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\VerifyUserController;

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


//------------ Home Page Route ------------//
Route::get('/',[FrontendController::class,'index']);

//------------ Disable Route ------------//
Auth::routes([
    'register'         => false,
    'verify'           => false,
    'password.reset'   => false,
    'password.update'  => false,
    'password.email'   => false,
    'password.request' => false
]);

//------------ Register Route ------------//
Route::get('register', [AuthController::class, 'index'])->name('user.register');
Route::post('register/store', [AuthController::class, 'store'])->name('user.register.store');

//------------ Varify User ------------//
Route::get('verify-code/{token}',[VerifyUserController::class,'verifiedCode'])->name('verify.code');

//------------ Blog  ------------//
//------------------------ Appointment Section -----------------------//
Route::prefix('frontend')->name('frontend.')->group(function () {
    Route::get('blog/{id}', [BlogController::class, 'blog'])->name('blog');
    Route::post('view/count', [BlogController::class, 'viewCount'])->name('view.count');
    Route::post('blog/comment', [BlogController::class, 'blogComment'])->name('blog.comment');
    Route::post('blog/comment/replay', [BlogController::class, 'blogCommentRepay'])->name('blog.comment.repay')->middleware('auth');
    Route::get('categorie/{id}',[BlogController::class, 'categorieBlog'])->name('categorie.blog');
});

