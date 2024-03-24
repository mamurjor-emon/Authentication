<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\EmailTemplatesController;
use App\Http\Controllers\Backend\Admin\HomePage\AppointmentsController;
use App\Http\Controllers\Backend\Admin\HomePage\BlogCategorieController;
use App\Http\Controllers\Backend\Admin\HomePage\BlogsController;
use App\Http\Controllers\Backend\Admin\HomePage\BlogTagController;
use App\Http\Controllers\Backend\Admin\HomePage\CallActionController;
use App\Http\Controllers\Backend\Admin\HomePage\ClientsController;
use App\Http\Controllers\Backend\Admin\HomePage\DepartmentController;
use App\Http\Controllers\Backend\Admin\HomePage\FeautesController;
use App\Http\Controllers\Backend\Admin\HomePage\FooterBottomController;
use App\Http\Controllers\Backend\Admin\HomePage\FooterController;
use App\Http\Controllers\Backend\Admin\HomePage\FunFactsController;
use App\Http\Controllers\Backend\Admin\HomePage\MenusController;
use App\Http\Controllers\Backend\Admin\HomePage\PortfolioCategorieController;
use App\Http\Controllers\Backend\Admin\HomePage\PortfolioController;
use App\Http\Controllers\Backend\Admin\HomePage\PricingController;
use App\Http\Controllers\Backend\Admin\HomePage\ScheduleController;
use App\Http\Controllers\Backend\Admin\HomePage\ServicesController;
use App\Http\Controllers\Backend\Admin\HomePage\SilderController;
use App\Http\Controllers\Backend\Admin\HomePage\SocalMediaController;
use App\Http\Controllers\Backend\Admin\HomePage\TitleDiscriptionController;
use App\Http\Controllers\Backend\Admin\HomePage\WhyChooseController;
use App\Http\Controllers\Backend\Admin\UserManageMentController;
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

    //------------------------WhyChoose Section -----------------------//
    Route::prefix('why-choose')->name('why.choose.')->group(function () {
        Route::get('/', [WhyChooseController::class, 'index'])->name('index');
        Route::post('create', [WhyChooseController::class, 'createOrUpdate'])->name('create.or.update');
    });

    //------------------------ Call To Action Section -----------------------//
    Route::prefix('call-action')->name('call.action.')->group(function () {
        Route::get('/', [CallActionController::class, 'index'])->name('index');
        Route::post('create', [CallActionController::class, 'createOrUpdate'])->name('create.or.update');
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

    //------------------------ Appointment Section -----------------------//
    Route::prefix('appointment')->name('appointment.')->group(function () {
        Route::get('/', [AppointmentsController::class, 'index'])->name('index');
        Route::post('create', [AppointmentsController::class, 'createOrUpdate'])->name('create.or.update');
    });

    //------------------------ Portfolio Categories Section -----------------------//
    Route::prefix('portfolio-categories')->name('portfolio.categories.')->group(function () {
        Route::get('/', [PortfolioCategorieController::class, 'index'])->name('index');
        Route::post('getdata', [PortfolioCategorieController::class, 'getData'])->name('get.data');
        Route::get('create', [PortfolioCategorieController::class, 'create'])->name('create');
        Route::post('store', [PortfolioCategorieController::class, 'store'])->name('store');
        Route::get('edit/{id}', [PortfolioCategorieController::class, 'edit'])->name('edit');
        Route::post('update', [PortfolioCategorieController::class, 'update'])->name('update');
        Route::get('delete/{id}', [PortfolioCategorieController::class, 'delete'])->name('delete');
    });

    //------------------------ Doctors Section -----------------------//
    Route::prefix('doctor')->name('doctor.')->group(function () {
        Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
        Route::post('getdata', [DepartmentController::class, 'getData'])->name('department.get.data');
        Route::get('create', [DepartmentController::class, 'create'])->name('department.create');
        Route::post('store', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::post('update', [DepartmentController::class, 'update'])->name('department.update');
        Route::get('delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');

        // Route::get('/', [PortfolioController::class, 'index'])->name('index');
        // Route::post('getdata', [PortfolioController::class, 'getData'])->name('get.data');
        // Route::get('create', [PortfolioController::class, 'create'])->name('create');
        // Route::post('store', [PortfolioController::class, 'store'])->name('store');
        // Route::get('edit/{id}', [PortfolioController::class, 'edit'])->name('edit');
        // Route::post('update', [PortfolioController::class, 'update'])->name('update');
        // Route::get('delete/{id}', [PortfolioController::class, 'delete'])->name('delete');
        // Route::post('gallery/delete', [PortfolioController::class, 'galleryDelete'])->name('gallery.delete');
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
        Route::post('gallery/delete', [PortfolioController::class, 'galleryDelete'])->name('gallery.delete');
    });

    //------------------------ Blog Categories Section -----------------------//
    Route::prefix('blog-categories')->name('blog.categories.')->group(function () {
        Route::get('/', [BlogCategorieController::class, 'index'])->name('index');
        Route::post('getdata', [BlogCategorieController::class, 'getData'])->name('get.data');
        Route::get('create', [BlogCategorieController::class, 'create'])->name('create');
        Route::post('store', [BlogCategorieController::class, 'store'])->name('store');
        Route::get('edit/{id}', [BlogCategorieController::class, 'edit'])->name('edit');
        Route::post('update', [BlogCategorieController::class, 'update'])->name('update');
        Route::get('delete/{id}', [BlogCategorieController::class, 'delete'])->name('delete');
    });

    //------------------------ Blog Tag Section -----------------------//
    Route::prefix('blog-tags')->name('blog.tags.')->group(function () {
        Route::get('/', [BlogTagController::class, 'index'])->name('index');
        Route::post('getdata', [BlogTagController::class, 'getData'])->name('get.data');
        Route::get('create', [BlogTagController::class, 'create'])->name('create');
        Route::post('store', [BlogTagController::class, 'store'])->name('store');
        Route::get('edit/{id}', [BlogTagController::class, 'edit'])->name('edit');
        Route::post('update', [BlogTagController::class, 'update'])->name('update');
        Route::get('delete/{id}', [BlogTagController::class, 'delete'])->name('delete');
    });

    //------------------------ Blog  Section -----------------------//
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [BlogsController::class, 'index'])->name('index');
        Route::post('getdata', [BlogsController::class, 'getData'])->name('get.data');
        Route::get('create', [BlogsController::class, 'create'])->name('create');
        Route::post('store', [BlogsController::class, 'store'])->name('store');
        Route::get('edit/{id}', [BlogsController::class, 'edit'])->name('edit');
        Route::post('update', [BlogsController::class, 'update'])->name('update');
        Route::get('delete/{id}', [BlogsController::class, 'delete'])->name('delete');
    });

    //------------------------ Footer Section -----------------------//
    Route::prefix('footer')->name('footer.')->group(function () {
        Route::get('/', [FooterController::class, 'index'])->name('index');
        Route::post('create', [FooterController::class, 'createOrUpdate'])->name('create.or.update');

        Route::get('two/index', [FooterController::class, 'twoIndex'])->name('two.index');
        Route::post('two/title/store', [FooterController::class, 'twoTitleStore'])->name('two.title.store');
        Route::post('two/get-data', [FooterController::class, 'getData'])->name('two.get.data');
        Route::post('two/store', [FooterController::class, 'twoStore'])->name('two.store');
        Route::get('two/create', [FooterController::class, 'twoCreate'])->name('two.create');
        Route::get('two/edit/{id}', [FooterController::class, 'edit'])->name('two.edit');
        Route::post('two/update', [FooterController::class, 'update'])->name('two.update');
        Route::get('two/delete/{id}', [FooterController::class, 'delete'])->name('two.delete');

        Route::get('three', [FooterController::class, 'footerThree'])->name('three.index');
        Route::post('three/create', [FooterController::class, 'threeCreateOrUpdate'])->name('three.create.or.update');

        Route::get('four', [FooterController::class, 'footerfour'])->name('four.index');
        Route::post('four/create', [FooterController::class, 'fourCreateOrUpdate'])->name('four.create.or.update');
    });

    //------------------------ Footer Bottom Section -----------------------//
    Route::prefix('footer-bottom')->name('footer.bottom.')->group(function () {
        Route::get('/', [FooterBottomController::class, 'index'])->name('index');
        Route::post('create', [FooterBottomController::class, 'createOrUpdate'])->name('create.or.update');
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

    //------------------------ Socal Media Section -----------------------//
    Route::prefix('socal-media')->name('socal.media.')->group(function () {
        Route::get('/', [SocalMediaController::class, 'index'])->name('index');
        Route::post('getdata', [SocalMediaController::class, 'getData'])->name('get.data');
        Route::get('create', [SocalMediaController::class, 'create'])->name('create');
        Route::post('store', [SocalMediaController::class, 'store'])->name('store');
        Route::get('edit/{id}', [SocalMediaController::class, 'edit'])->name('edit');
        Route::post('update', [SocalMediaController::class, 'update'])->name('update');
        Route::get('delete/{id}', [SocalMediaController::class, 'delete'])->name('delete');
    });

    //------------------------ User Management Section -----------------------//
    Route::prefix('user-management')->name('user.management.')->group(function () {
        Route::get('/', [UserManageMentController::class, 'admins'])->name('admins');
        Route::post('getdata', [UserManageMentController::class, 'getData'])->name('get.data');

        Route::get('/doctors', [UserManageMentController::class, 'doctors'])->name('doctors');
        Route::post('doctors/getdata', [UserManageMentController::class, 'doctorsGetData'])->name('doctors.get.data');

        Route::get('/pending-doctors', [UserManageMentController::class, 'pendingDoctors'])->name('pending.doctors');
        Route::post('pending/doctors/getdata', [UserManageMentController::class, 'pendingDoctorsGetData'])->name('pending.doctors.get.data');

        Route::get('/cancel-doctors', [UserManageMentController::class, 'cancelDoctors'])->name('cancel.doctors');
        Route::post('cancel/doctors/getdata', [UserManageMentController::class, 'cancelDoctorsGetData'])->name('cancel.doctors.get.data');

        Route::get('/clients', [UserManageMentController::class, 'clients'])->name('clients');
        Route::post('clients/getdata', [UserManageMentController::class, 'clientsGetData'])->name('clients.get.data');

        Route::get('/subscribers', [UserManageMentController::class, 'subscribers'])->name('subscribers');
        Route::post('subscribers/getdata', [UserManageMentController::class, 'subscribersGetData'])->name('subscribers.get.data');

        Route::post('doctors/status', [UserManageMentController::class, 'doctorStatusChange'])->name('doctor.status.change');
        Route::post('role/change', [UserManageMentController::class, 'roleChange'])->name('role.change');
    });
    //------------------------ Email Templates -----------------------//
    Route::prefix('email/templates')->name('email.templates.')->group(function () {
        Route::get('/', [EmailTemplatesController::class, 'index'])->name('index');
        Route::post('getdata', [EmailTemplatesController::class, 'getData'])->name('get.data');
        Route::get('edit/{id}', [EmailTemplatesController::class, 'edit'])->name('edit');
        Route::post('update', [EmailTemplatesController::class, 'update'])->name('update');
    });
});
