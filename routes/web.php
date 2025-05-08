<?php

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('front.index');
// });
// Route::get('/contact', function () {
//     return view('front.contact');
// });


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth','verified'])->name('dashboard');




// Routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Permission Routes
    Route::get('permission/index',[PermissionController::class,'index'])->name('permission.index');
    Route::get('permission/create',[PermissionController::class,'create'])->name('permission.create');
    Route::post('permission/store',[PermissionController::class,'store'])->name('permission.store');
    Route::get('permission/edit/{permission}',[PermissionController::class,'edit'])->name('permission.edit');
    Route::post('permission/update/{permission}',[PermissionController::class,'update'])->name('permission.update');
    Route::get('permission/delete/{permission}',[PermissionController::class,'delete'])->name('permission.delete');

    // Role Routes
    Route::get('role/index',[RoleController::class,'index'])->name('role.index');
    Route::get('role/create',[RoleController::class,'create'])->name('role.create');
    Route::post('role/store',[RoleController::class,'store'])->name('role.store');
    Route::get('role/edit/{role}',[RoleController::class,'edit'])->name('role.edit');
    Route::post('role/update/{role}',[RoleController::class,'update'])->name('role.update');
    Route::get('role/delete/{role}',[RoleController::class,'delete'])->name('role.delete');

    // User Routes
    Route::get('user/index',[UserController::class,'index'])->name('user.index');
    Route::get('user/create',[UserController::class,'create'])->name('user.create');
    Route::post('user/store',[UserController::class,'store'])->name('user.store');
    Route::get('user/edit/{user}',[UserController::class,'edit'])->name('user.edit');
    Route::post('user/update/{user}',[UserController::class,'update'])->name('user.update');
    Route::get('user/delete/{user}',[UserController::class,'delete'])->name('user.delete');
    Route::get('/user/permissions/{user}', [UserController::class, 'assignPermissionForm'])->name('user.permission.form');
    Route::post('/user/permissions/{user}', [UserController::class, 'assignPermissionToUser'])->name('user.assign-permission');

    Route::prefix('hotel')->name('hotel.')->controller(\App\Http\Controllers\HotelController::class)->group(function(){
       Route::get('/', 'index')->name('index');
       Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{hotel}', 'edit')->name('edit');
        Route::post('/update/{hotel}', 'update')->name('update');
        Route::post('/delete/{hotel}', 'destroy')->name('delete');
    });

    Route::prefix('room-type')->name('room-type.')->controller(\App\Http\Controllers\RoomTypeController::class)->group(function(){
       Route::get('/', 'index')->name('index');
       Route::get('/create', 'create')->name('create');
       Route::post('/store', 'store')->name('store');
       Route::get('/edit/{roomType}', 'edit')->name('edit');
       Route::post('/update/{roomType}', 'update')->name('update');
       Route::post('/update/{roomType}', 'update')->name('update');
       Route::post('/update/{roomType}', 'update')->name('update');
       Route::post('/delete/{roomType}', 'destroy')->name('delete');
    });

    Route::prefix('rooms')->name('rooms.')->controller(\App\Http\Controllers\RoomController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{room}', 'edit')->name('edit');
        Route::post('/update/{room}', 'update')->name('update');
        Route::post('/update/{room}', 'update')->name('update');
        Route::post('/update/{room}', 'update')->name('update');
        Route::post('/destroy/{room}', 'destroy')->name('destroy');
    });

    Route::prefix('booking')->name('booking.')->controller(\App\Http\Controllers\BookingController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{booking}', 'edit')->name('edit');
        Route::get('/show/{booking}', 'show')->name('show');
        Route::get('/status/{booking}', 'status')->name('status');
        Route::post('/update/{booking}', 'update')->name('update');
        Route::post('/update/{booking}', 'update')->name('update');
        Route::post('/update/{booking}', 'update')->name('update');
        Route::post('/destroy/{booking}', 'destroy')->name('destroy');
        Route::post('/cancel/{booking}', 'cancel')->name('cancel');
    });


    Route::prefix('payment')->name('payment.')->controller(\App\Http\Controllers\PaymentController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create/{booking}', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{payment}', 'edit')->name('edit');
        Route::get('/show/{payment}', 'show')->name('show');
        Route::get('/status/{payment}', 'status')->name('status');
        Route::post('/update/{payment}', 'update')->name('update');
        Route::post('/update/{payment}', 'update')->name('update');
        Route::post('/destroy/{payment}', 'destroy')->name('destroy');
    });


    Route::prefix('amenity')->name('amenity.')->controller(\App\Http\Controllers\AmenityController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{amenity}', 'edit')->name('edit');
        Route::post('/update/{amenity}', 'update')->name('update');
        Route::post('/destroy/{amenity}', 'destroy')->name('destroy');
    });


});

require __DIR__.'/auth.php';



// Home route
Route::get('/', [HomeController::class, 'home'])->name('home');

// About route
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Accommodation route
Route::get('/accommodation', [HomeController::class, 'accommodation'])->name('accommodation');

// Banquets and Meetings route
Route::get('/banquets-and-meetings', [HomeController::class, 'banquetsAndMeetings'])->name('banquets-and-meetings');

// Rules and Regulations route
Route::get('/rules-and-regulations', [HomeController::class, 'rulesAndRegulations'])->name('rules-and-regulations');

// Careers route
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');

// Gallery route
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

// Contact Us route
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');

Route::get('/crescent', [HomeController::class, 'crescent'])->name('crescent');

Route::get('/crescentfacilities', [HomeController::class, 'crescentfacilities'])->name('crescentfacilities');

// Accommodation Routes
Route::get('/accommodation/standard-room', [HomeController::class, 'standardRoom'])->name('accommodation.standard');
Route::get('/accommodation/deluxe-room', [HomeController::class, 'deluxeRoom'])->name('accommodation.deluxe');
Route::get('/accommodation/suite-room', [HomeController::class, 'suiteRoom'])->name('accommodation.suite');

// Banquets and Meetings Routes
Route::get('/banquets/lawn-package', [HomeController::class, 'lawnPackage'])->name('banquets.lawn');
Route::get('/banquets/ballroom-package', [HomeController::class, 'ballroomPackage'])->name('banquets.ballroom');
Route::get('/banquets/elite1', [HomeController::class, 'elite1'])->name('banquets.elite1');
Route::get('/banquets/elite2', [HomeController::class, 'elite2'])->name('banquets.elite2');

// footerpages
Route::get('/termandcondition', [HomeController::class, 'termandcondition'])->name('termandcondition');
Route::get('/conditions', [HomeController::class, 'conditions'])->name('conditons');
Route::get('/liability', [HomeController::class, 'liability'])->name('liability');
Route::get('/miscelleneous', [HomeController::class, 'miscelleneous'])->name('miscelleneous');
Route::get('/details', [HomeController::class, 'details'])->name('details');
Route::get('/information', [HomeController::class, 'information'])->name('information');
Route::get('/policy', [HomeController::class, 'policy'])->name('policy');

Route::post('/send-booking-email', [BookingController::class, 'sendBookingEmail'])->name('booking.send');
Route::get('/thank-you', [BookingController::class, 'thankyou'])->name('thankyou');

<<<<<<< HEAD
Route::post('rooms/available', [HomeController::class, 'availableRoom'])->name('rooms.available');
=======
Route::get('/bookingdetail', [HomeController::class, 'bookingdetail'])->name('bookingdetail');
Route::get('/roomdetail', [HomeController::class, 'roomdetail'])->name('frontend.roomdetail');
>>>>>>> 4444eb500961afd4bd9337f8e3088e554b51cf6b
