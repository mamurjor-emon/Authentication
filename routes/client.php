<?php

use App\Http\Controllers\Backend\Client\Appointmnet\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Client\DashboardController;

// Group Route
Route::group(['prifix' => 'client','as'=>'client.','middleware'=>['auth','is_verify','is_client']], function(){
    //------------------------ Dashboard -----------------------//
    Route::get('dashboard/', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::prefix('appontment')->name('appontment.')->group(function () {
        Route::get('index', [AppointmentController::class, 'index'])->name('index');
        Route::get('view/{id}', [AppointmentController::class, 'view'])->name('view');
    });

});
