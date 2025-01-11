<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Doctor\DashboardController;
use App\Http\Controllers\Backend\Doctor\PatientController;

// Group Route
Route::group(['prefix' => 'doctor', 'as'=>'doctor.','middleware'=>['auth','is_verify','is_doctor']], function(){
    //------------------------ Dashboard -----------------------//
    Route::get('dashboard/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('notification-count', [DashboardController::class, 'dashboardNotificationsCount'])->name('notification.count');
    Route::prefix('patient')->name('patient.')->group(function () {
        Route::get('index', [PatientController::class, 'index'])->name('index');
        Route::post('get-data', [PatientController::class, 'getData'])->name('get.data');
        Route::get('view/{id}', [PatientController::class, 'view'])->name('view');
        Route::get('status/{id}/{status}',[PatientController::class,'statusChange'])->name('status.change');
        Route::get('delete/{id}',[PatientController::class,'delete'])->name('delete');
    });
});
