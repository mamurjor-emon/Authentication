<?php

use App\Models\TitleDiscrption;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\Backend\Admin\DayController;
use App\Http\Controllers\Backend\Admin\RoomController;
use App\Http\Controllers\Backend\Admin\SlotController;
use App\Http\Controllers\Backend\Admin\BulldingController;
use App\Http\Controllers\Backend\Admin\TimePageController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\TimeTableController;
use App\Http\Controllers\Backend\Admin\ThemeSettingController;
use App\Http\Controllers\Backend\Admin\EmailTemplatesController;
use App\Http\Controllers\Backend\Admin\HomePage\BlogsController;
use App\Http\Controllers\Backend\Admin\HomePage\MenusController;
use App\Http\Controllers\Backend\Admin\UserManageMentController;
use App\Http\Controllers\Backend\Admin\HomePage\DoctorController;
use App\Http\Controllers\Backend\Admin\HomePage\SilderController;
use App\Http\Controllers\Backend\Admin\HomePage\BlogTagController;
use App\Http\Controllers\Backend\Admin\HomePage\ClientsController;
use App\Http\Controllers\Backend\Admin\HomePage\FeautesController;
use App\Http\Controllers\Backend\Admin\HomePage\PricingController;
use App\Http\Controllers\Backend\Admin\HomePage\FunFactsController;
use App\Http\Controllers\Backend\Admin\HomePage\ScheduleController;
use App\Http\Controllers\Backend\Admin\HomePage\ServicesController;
use App\Http\Controllers\Backend\Admin\Pages\ContactPageController;
use App\Http\Controllers\Backend\Admin\HomePage\PortfolioController;
use App\Http\Controllers\Backend\Admin\HomePage\DepartmentController;
use App\Http\Controllers\Backend\Admin\HomePage\SocalMediaController;
use App\Http\Controllers\Backend\Admin\HomePage\BlogCategorieController;
use App\Http\Controllers\Backend\Admin\HomePage\PortfolioCategorieController;

// Group Route
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'is_verify', 'is_admin']], function () {
    //------------------------ Dashboard -----------------------//
    Broadcast::routes();

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('index');
        Route::post('users-count', [DashboardController::class, 'dashboardUserChatCount'])->name('users.count');
        Route::post('active-count', [DashboardController::class, 'dashboardActiveDoctorCount'])->name('active.doctor.count');
        Route::post('doctor-count', [DashboardController::class, 'dashboardDoctorsChatCount'])->name('doctor.count');
        Route::post('visitors-count', [DashboardController::class, 'dashboardVisitorsCount'])->name('visitors.count');
        Route::post('subscriber-count', [DashboardController::class, 'dashboardSubscribersChatCount'])->name('subscriber.count');
        Route::post('blog-count', [DashboardController::class, 'dashboardBlogsChatCount'])->name('blog.count');
        Route::get('notification-count', [DashboardController::class, 'dashboardNotificationsCount'])->name('notification.count');



        Route::get('profile/', [DashboardController::class, 'profile'])->name('profile');
        Route::post('profile-update', [DashboardController::class, 'profileUpdate'])->name('profile.update');
        Route::post('profile-password-update', [DashboardController::class, 'profilePasswordUpdate'])->name('profile.password.update');
    });



    //------------------------ Theme Setting -----------------------//
    Route::prefix('theme')->name('theme.')->group(function () {
        Route::get('/', [ThemeSettingController::class, 'index'])->name('index');
        Route::post('store', [ThemeSettingController::class, 'store'])->name('store');
        Route::post('/feautes/store', [ThemeSettingController::class, 'feautesStore'])->name('feautes.store');
        Route::post('/fun-fact/store', [ThemeSettingController::class, 'funFactStore'])->name('fun.fact.store');
        Route::post('/why-choose/store', [ThemeSettingController::class, 'whyChooseStore'])->name('why.choose.store');
        Route::post('/call-to/store', [ThemeSettingController::class, 'callToStore'])->name('call.to.store');
        Route::post('/portfolio/store', [ThemeSettingController::class, 'portfolioStore'])->name('portfolio.store');
        Route::post('/services/store', [ThemeSettingController::class, 'servicesStore'])->name('services.store');
        Route::post('/testimonials/store', [ThemeSettingController::class, 'testimonialsStore'])->name('testimonials.store');
        Route::post('/departments/store', [ThemeSettingController::class, 'departmentsStore'])->name('departments.store');
        Route::post('/pricing/store', [ThemeSettingController::class, 'pricingStore'])->name('pricing.store');
        Route::post('/team/store', [ThemeSettingController::class, 'teamStore'])->name('team.store');
        Route::post('/blog/store', [ThemeSettingController::class, 'blogStore'])->name('blog.store');
        Route::post('/client/store', [ThemeSettingController::class, 'clientStore'])->name('client.store');
        Route::post('/appointment/store', [ThemeSettingController::class, 'appointmentStore'])->name('appointment.store');
        Route::post('/newsletter/store', [ThemeSettingController::class, 'newsletterStore'])->name('newsletter.store');
        Route::post('/sosal-media/store', [ThemeSettingController::class, 'sosalMediaStore'])->name('sosal.media.store');
        Route::post('/footer/store', [ThemeSettingController::class, 'footerStore'])->name('footer.store');
        Route::post('/time-table/store', [ThemeSettingController::class, 'timeTableStore'])->name('time.table.store');
        Route::post('/common-image/store', [ThemeSettingController::class, 'commonImageStore'])->name('common.image.store');
    });

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
        Route::get('/bullding', [BulldingController::class, 'index'])->name('bullding.index');
        Route::post('bullding/getdata', [BulldingController::class, 'getData'])->name('bullding.get.data');
        Route::get('bullding/create', [BulldingController::class, 'create'])->name('bullding.create');
        Route::post('bullding/store', [BulldingController::class, 'store'])->name('bullding.store');
        Route::get('bullding/edit/{id}', [BulldingController::class, 'edit'])->name('bullding.edit');
        Route::post('bullding/update', [BulldingController::class, 'update'])->name('bullding.update');
        Route::get('bullding/delete/{id}', [BulldingController::class, 'delete'])->name('bullding.delete');

        Route::get('/room', [RoomController::class, 'index'])->name('room.index');
        Route::post('room/getdata', [RoomController::class, 'getData'])->name('room.get.data');
        Route::get('room/create', [RoomController::class, 'create'])->name('room.create');
        Route::post('room/store', [RoomController::class, 'store'])->name('room.store');
        Route::get('room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
        Route::post('room/update', [RoomController::class, 'update'])->name('room.update');
        Route::get('room/delete/{id}', [RoomController::class, 'delete'])->name('room.delete');

        Route::get('/slot', [SlotController::class, 'index'])->name('slot.index');
        Route::post('slot/getdata', [SlotController::class, 'getData'])->name('slot.get.data');
        Route::get('slot/create', [SlotController::class, 'create'])->name('slot.create');
        Route::post('slot/store', [SlotController::class, 'store'])->name('slot.store');
        Route::get('slot/edit/{id}', [SlotController::class, 'edit'])->name('slot.edit');
        Route::post('slot/update', [SlotController::class, 'update'])->name('slot.update');
        Route::get('slot/delete/{id}', [SlotController::class, 'delete'])->name('slot.delete');

        Route::get('/day', [DayController::class, 'index'])->name('day.index');
        Route::post('day/getdata', [DayController::class, 'getData'])->name('day.get.data');
        Route::get('day/create', [DayController::class, 'create'])->name('day.create');
        Route::post('day/store', [DayController::class, 'store'])->name('day.store');
        Route::get('day/edit/{id}', [DayController::class, 'edit'])->name('day.edit');
        Route::post('day/update', [DayController::class, 'update'])->name('day.update');
        Route::get('day/delete/{id}', [DayController::class, 'delete'])->name('day.delete');

        Route::get('/time-table', [TimeTableController::class, 'index'])->name('time-table.index');
        Route::post('time-table/getdata', [TimeTableController::class, 'getData'])->name('time-table.get.data');
        Route::get('time-table/create', [TimeTableController::class, 'create'])->name('time-table.create');
        Route::post('time-table/store', [TimeTableController::class, 'store'])->name('time-table.store');
        Route::get('time-table/edit/{id}', [TimeTableController::class, 'edit'])->name('time-table.edit');
        Route::post('time-table/update', [TimeTableController::class, 'update'])->name('time-table.update');
        Route::get('time-table/delete/{id}', [TimeTableController::class, 'delete'])->name('time-table.delete');

        Route::get('/time-page', [TimePageController::class, 'index'])->name('time-page.index');
        Route::post('time-page/getdata', [TimePageController::class, 'getData'])->name('time-page.get.data');
        Route::get('time-page/create', [TimePageController::class, 'create'])->name('time-page.create');
        Route::post('time-page/get-time', [TimePageController::class, 'getTime'])->name('time-page.get-time');
        Route::post('time-page/store', [TimePageController::class, 'store'])->name('time-page.store');
        Route::get('time-page/edit/{id}', [TimePageController::class, 'edit'])->name('time-page.edit');
        Route::post('time-page/update', [TimePageController::class, 'update'])->name('time-page.update');
        Route::get('time-page/delete/{id}', [TimePageController::class, 'delete'])->name('time-page.delete');

        Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
        Route::post('department/getdata', [DepartmentController::class, 'getData'])->name('department.get.data');
        Route::get('department/create', [DepartmentController::class, 'create'])->name('department.create');
        Route::post('department/store', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('department/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::post('department/update', [DepartmentController::class, 'update'])->name('department.update');
        Route::get('department/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');

        Route::get('/', [DoctorController::class, 'index'])->name('index');
        Route::post('getdata', [DoctorController::class, 'getData'])->name('get.data');
        Route::post('get-room', [DoctorController::class, 'getRoom'])->name('get.room');
        Route::get('create', [DoctorController::class, 'create'])->name('create');
        Route::post('store', [DoctorController::class, 'store'])->name('store');
        Route::get('edit/{id}', [DoctorController::class, 'edit'])->name('edit');
        Route::post('update', [DoctorController::class, 'update'])->name('update');
        Route::get('delete/{id}', [DoctorController::class, 'delete'])->name('delete');
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

    //------------------------ Page  Section -----------------------//

    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/', [ContactPageController::class, 'contactPage'])->name('contact.index');
        Route::post('/store', [ContactPageController::class, 'contactPageStore'])->name('contact.store');
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

        Route::get('/clients', [UserManageMentController::class, 'clients'])->name('clients');
        Route::post('clients/getdata', [UserManageMentController::class, 'clientsGetData'])->name('clients.get.data');

        Route::post('role/change', [UserManageMentController::class, 'roleChange'])->name('role.change');

        Route::get('/subscribers', [UserManageMentController::class, 'subscribers'])->name('subscribers');
        Route::post('subscribers/getdata', [UserManageMentController::class, 'subscribersGetData'])->name('subscribers.get.data');

        Route::get('/reviews', [UserManageMentController::class, 'allReview'])->name('reviews');
        Route::post('/reviews/get-data', [UserManageMentController::class, 'reviewGetData'])->name('reviews.get-data');
        Route::get('/reviews/create', [UserManageMentController::class, 'reviewCreate'])->name('reviews.create');
        Route::post('/reviews/store', [UserManageMentController::class, 'reviewStore'])->name('reviews.store');
        Route::get('/reviews/edit/{id}', [UserManageMentController::class, 'reviewEdit'])->name('reviews.edit');
        Route::post('/reviews/update', [UserManageMentController::class, 'reviewUpdate'])->name('reviews.update');
        Route::get('/reviews/delete/{id}', [UserManageMentController::class, 'reviewDelete'])->name('reviews.delete');
    });

    //------------------------ Email Templates -----------------------//
    Route::prefix('email/templates')->name('email.templates.')->group(function () {
        Route::get('/', [EmailTemplatesController::class, 'index'])->name('index');
        Route::post('getdata', [EmailTemplatesController::class, 'getData'])->name('get.data');
        Route::get('edit/{id}', [EmailTemplatesController::class, 'edit'])->name('edit');
        Route::post('update', [EmailTemplatesController::class, 'update'])->name('update');
    });
});
