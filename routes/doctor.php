<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Doctor\DashboardController;
use App\Http\Controllers\Backend\Doctor\PatientController;

// Group Route
Route::group(['prefix' => 'doctor', 'as'=>'doctor.','middleware'=>['auth','is_verify','is_doctor']], function(){
    //------------------------ Dashboard -----------------------//
    Route::get('dashboard/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::prefix('patient')->name('patient.')->group(function () {
        Route::get('index', [PatientController::class, 'index'])->name('index');
        Route::get('view/{id}', [PatientController::class, 'view'])->name('view');
    });
});
