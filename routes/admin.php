<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\EmailTemplatesController;
use App\Http\Controllers\Backend\Admin\HomePage\AppointmentsController;
use App\Http\Controllers\Backend\Admin\HomePage\CallActionController;
use App\Http\Controllers\Backend\Admin\HomePage\ClientsController;
use App\Http\Controllers\Backend\Admin\HomePage\FeautesController;
use App\Http\Controllers\Backend\Admin\HomePage\FunFactsController;
use App\Http\Controllers\Backend\Admin\HomePage\MenusController;
use App\Http\Controllers\Backend\Admin\HomePage\PortfolioController;
use App\Http\Controllers\Backend\Admin\HomePage\PricingController;
use App\Http\Controllers\Backend\Admin\HomePage\ScheduleController;
use App\Http\Controllers\Backend\Admin\HomePage\ServicesController;
use App\Http\Controllers\Backend\Admin\HomePage\SilderController;
use App\Http\Controllers\Backend\Admin\HomePage\TitleDiscriptionController;
use App\Http\Controllers\Backend\Admin\HomePage\WhyChooseController;
use App\Models\TitleDiscrption;

// Group Route
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'is_verify', 'is_admin']], function () {
    //------------------------ Dashboard -----------------------//
    Route::get('dashboard/', [DashboardController::class, 'dashboard'])->name('dashboard');

    //------------------------ Dynamic Menu -----------------------//
    Route::prefix('menu')->name('menu.')->group(function () {
        Route::get('/', [MenusController::class, 'index'])->name('index');
        Route::post('getdata', [MenusController::class, 'getData'])->name('get.data');
        Route::get('create', [MenusController::class, 'create'])->name('create');
        Route::post('get/submenu', [MenusController::class, 'getSubMenu'])->name('get.sub.senu');
        Route::post('store', [MenusController::class, 'store'])->name('store');
        Route::get('edit/{id}', [MenusController::class, 'edit'])->name('edit');
        Route::post('update', [MenusController::class, 'update'])->name('update');
        Route::get('delete/{id}', [MenusController::class, 'delete'])->name('delete');
    });


    //------------------------ Silder Section -----------------------//
    Route::prefix('slider')->name('slider.')->group(function () {
        Route::get('/', [SilderController::class, 'index'])->name('index');
        Route::post('getdata', [SilderController::class, 'getData'])->name('get.data');
        Route::get('create', [SilderController::class, 'create'])->name('create');
        Route::post('store', [SilderController::class, 'store'])->name('store');
        Route::get('edit/{id}', [SilderController::class, 'edit'])->name('edit');
        Route::post('update', [SilderController::class, 'update'])->name('update');
        Route::get('delete/{id}', [SilderController::class, 'delete'])->name('delete');
    });


    //------------------------ Schedule Section -----------------------//
    Route::prefix('schedule')->name('schedule.')->group(function () {
        Route::get('/', [ScheduleController::class, 'index'])->name('index');
        Route::post('getdata', [ScheduleController::class, 'getData'])->name('get.data');
        Route::get('create', [ScheduleController::class, 'create'])->name('create');
        Route::post('store', [ScheduleController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ScheduleController::class, 'edit'])->name('edit');
        Route::post('update', [ScheduleController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ScheduleController::class, 'delete'])->name('delete');
    });

    //------------------------ Feautes Section -----------------------//
    Route::prefix('feautes')->name('feautes.')->group(function () {
        Route::get('/', [FeautesController::class, 'index'])->name('index');
        Route::post('getdata', [FeautesController::class, 'getData'])->name('get.data');
        Route::get('create', [FeautesController::class, 'create'])->name('create');
        Route::post('store', [FeautesController::class, 'store'])->name('store');
        Route::get('edit/{id}', [FeautesController::class, 'edit'])->name('edit');
        Route::post('update', [FeautesController::class, 'update'])->name('update');
        Route::get('delete/{id}', [FeautesController::class, 'delete'])->name('delete');
    });

    //------------------------ Fun Facts Section -----------------------//
    Route::prefix('fun_facts')->name('fun_facts.')->group(function () {
        Route::get('/', [FunFactsController::class, 'index'])->name('index');
        Route::post('getdata', [FunFactsController::class, 'getData'])->name('get.data');
        Route::get('create', [FunFactsController::class, 'create'])->name('create');
        Route::post('store', [FunFactsController::class, 'store'])->name('store');
        Route::get('edit/{id}', [FunFactsController::class, 'edit'])->name('edit');
        Route::post('update', [FunFactsController::class, 'update'])->name('update');
        Route::get('delete/{id}', [FunFactsController::class, 'delete'])->name('delete');
    });

    //------------------------ Why Choose Section -----------------------//
    Route::prefix('appointment')->name('appointment.')->group(function () {
        Route::get('/', [AppointmentsController::class, 'index'])->name('index');
        Route::post('create', [AppointmentsController::class, 'createOrUpdate'])->name('create.or.update');
    });

    //------------------------ Call To Action Section -----------------------//
    Route::prefix('call-action')->name('call.action.')->group(function () {
        Route::get('/', [CallActionController::class, 'index'])->name('index');
        Route::post('create', [CallActionController::class, 'createOrUpdate'])->name('create.or.update');
    });

    //------------------------ Portfolio Section -----------------------//
    Route::prefix('portfolio')->name('portfolio.')->group(function () {
        Route::get('/', [PortfolioController::class, 'index'])->name('index');
        Route::post('getdata', [PortfolioController::class, 'getData'])->name('get.data');
        Route::get('create', [PortfolioController::class, 'create'])->name('create');
        Route::post('store', [PortfolioController::class, 'store'])->name('store');
        Route::get('edit/{id}', [PortfolioController::class, 'edit'])->name('edit');
        Route::post('update', [PortfolioController::class, 'update'])->name('update');
        Route::get('delete/{id}', [PortfolioController::class, 'delete'])->name('delete');
    });

    //------------------------ Services Section -----------------------//
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/', [ServicesController::class, 'index'])->name('index');
        Route::post('getdata', [ServicesController::class, 'getData'])->name('get.data');
        Route::get('create', [ServicesController::class, 'create'])->name('create');
        Route::post('store', [ServicesController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ServicesController::class, 'edit'])->name('edit');
        Route::post('update', [ServicesController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ServicesController::class, 'delete'])->name('delete');
    });

    //------------------------ Pricing Section -----------------------//
    Route::prefix('pricing')->name('pricing.')->group(function () {
        Route::get('/', [PricingController::class, 'index'])->name('index');
        Route::post('getdata', [PricingController::class, 'getData'])->name('get.data');
        Route::get('create', [PricingController::class, 'create'])->name('create');
        Route::post('store', [PricingController::class, 'store'])->name('store');
        Route::get('edit/{id}', [PricingController::class, 'edit'])->name('edit');
        Route::post('update', [PricingController::class, 'update'])->name('update');
        Route::get('delete/{id}', [PricingController::class, 'delete'])->name('delete');
    });

    //------------------------ Clients Section -----------------------//
    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', [ClientsController::class, 'index'])->name('index');
        Route::post('getdata', [ClientsController::class, 'getData'])->name('get.data');
        Route::get('create', [ClientsController::class, 'create'])->name('create');
        Route::post('store', [ClientsController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ClientsController::class, 'edit'])->name('edit');
        Route::post('update', [ClientsController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ClientsController::class, 'delete'])->name('delete');
    });

    //------------------------Appointment Section -----------------------//
    Route::prefix('Appointment')->name('why.choose.')->group(function () {
        Route::get('/', [WhyChooseController::class, 'index'])->name('index');
        Route::post('create', [WhyChooseController::class, 'createOrUpdate'])->name('create.or.update');
    });


    //------------------------ Title & Discription All Section -----------------------//
    Route::prefix('title-discription')->name('title.discription.')->group(function () {
        Route::get('/', [TitleDiscriptionController::class, 'index'])->name('index');
        Route::post('getdata', [TitleDiscriptionController::class, 'getData'])->name('get.data');
        Route::get('create', [TitleDiscriptionController::class, 'create'])->name('create');
        Route::post('store', [TitleDiscriptionController::class, 'store'])->name('store');
        Route::get('edit/{id}', [TitleDiscriptionController::class, 'edit'])->name('edit');
        Route::post('update', [TitleDiscriptionController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TitleDiscriptionController::class, 'delete'])->name('delete');
    });

    //------------------------ Email Templates -----------------------//
    Route::prefix('email/templates')->name('email.templates.')->group(function () {
        Route::get('/', [EmailTemplatesController::class, 'index'])->name('index');
        Route::post('getdata', [EmailTemplatesController::class, 'getData'])->name('get.data');
        Route::get('edit/{id}', [EmailTemplatesController::class, 'edit'])->name('edit');
        Route::post('update', [EmailTemplatesController::class, 'update'])->name('update');
    });
});
