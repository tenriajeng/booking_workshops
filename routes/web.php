<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/schedule/{date}', [App\Http\Controllers\HomeController::class, 'schedule'])->name('schedule');


Route::group(['middleware' => ['role:pimpinan', 'auth'], 'prefix' => 'pimpinan'], function () {
    Route::get('/pimpinan', [App\Http\Controllers\Pimpinan\PimpinanController::class, 'index'])->name('pimpinan.home');
    Route::get('/create', [App\Http\Controllers\Pimpinan\PimpinanController::class, 'create'])->name('pimpinan.create');
    Route::post('/store', [App\Http\Controllers\Pimpinan\PimpinanController::class, 'store'])->name('pimpinan.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Pimpinan\PimpinanController::class, 'edit'])->name('pimpinan.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Pimpinan\PimpinanController::class, 'update'])->name('pimpinan.update');
    Route::get('/delete/{id}', [App\Http\Controllers\Pimpinan\PimpinanController::class, 'destroy'])->name('pimpinan.delete');


    Route::get('/Lproduct', [App\Http\Controllers\Pimpinan\LDataProductController::class, 'index'])->name('LDproduct');
    Route::get('/Lpengguna', [App\Http\Controllers\Pimpinan\LDataPenggunaController::class, 'index'])->name('LDpengguna');
    Route::get('/Ltransaksi', [App\Http\Controllers\Pimpinan\LDataTransaksiController::class, 'index'])->name('LDtransaksi');
});


Route::group(['middleware' => ['role:user', 'auth'], 'prefix' => 'account'], function () {
    Route::get('/book', [App\Http\Controllers\HomeController::class, 'book'])->name('book');
    Route::get('/book/{id}', [App\Http\Controllers\user\BookingController::class, 'show'])->name('book.show');
    Route::post('/book', [App\Http\Controllers\BookingController::class, 'store'])->name('book.store');

    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'book'])->name('profile');
    Route::get('/', [App\Http\Controllers\user\HomeController::class, 'index'])->name('user.home');
    Route::get('/history', [App\Http\Controllers\user\BookingController::class, 'index'])->name('user.history');
    Route::get('/product', [App\Http\Controllers\user\ProductController::class, 'index'])->name('user.product');
});

// Route::post('/save-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('save-token');
// Route::post('/send-notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send.notification');

// Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
Route::post('/store-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('store.token');
// Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
Route::prefix('admin')->group(function () {
    // Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');

    // User
    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
    Route::get('/user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.delete');


    //Booking
    Route::resource('booking', App\Http\Controllers\Admin\BookingController::class);
    Route::get('/booking/edit/{id}', [App\Http\Controllers\Admin\BookingController::class, 'edit'])->name('admin.booking.edit');
    Route::get('/booking/update/{id}', [App\Http\Controllers\Admin\BookingController::class, 'update'])->name('admin.booking.update');
    Route::get('/booking/delete/{id}', [App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('admin.booking.delete');


    //Category
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::get('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.delete');


    //Schedule
    Route::resource('schedule', App\Http\Controllers\Admin\ScheduleController::class);
    // Route::get('/schedule/store', [App\Http\Controllers\Admin\ScheduleController::class, 'store'])->name('admin.schedule.store');
    Route::get('/schedule/edit/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'edit'])->name('admin.schedule.edit');
    Route::get('/schedule/update/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'update'])->name('admin.schedule.update');
    Route::get('/schedule/delete/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'destroy'])->name('admin.schedule.delete');



    //Product
    // Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.index');
    Route::post('/product/upload', [App\Http\Controllers\Admin\ProductController::class, 'upload'])->name('product.upload');
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
    Route::get('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.product.edit');
    Route::get('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.product.delete');
});
