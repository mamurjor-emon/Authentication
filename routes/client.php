<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Client\DashboardController;

// Group Route
Route::group(['prifix' => 'client','as'=>'client.','middleware'=>['auth','is_verify','is_client']], function(){
    //------------------------ Dashboard -----------------------//
    Route::get('dashboard/', [DashboardController::class, 'dashboard'])->name('dashboard');
});
