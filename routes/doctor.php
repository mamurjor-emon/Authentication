<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Doctor\DashboardController;

// Group Route
Route::group(['prefix' => 'doctor', 'as'=>'doctor.','middleware'=>['auth','is_verify','is_doctor']], function(){
    //------------------------ Dashboard -----------------------//
    Route::get('dashboard/', [DashboardController::class, 'dashboard'])->name('dashboard');
});
