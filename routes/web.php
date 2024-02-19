<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/guestproduct', [App\Http\Controllers\ProductController::class, 'index'])->name('guestproduct');

// notif test
Route::post('/save-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send.notification');



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

    Route::get('/laporan_pengguna', [App\Http\Controllers\Pimpinan\LDataPenggunaController::class, 'laporan'])->name('laporan.pengguna');

    Route::get('/laporan_transaksi', [App\Http\Controllers\Pimpinan\LDataTransaksiController::class, 'laporan'])->name('laporan.transaksi');
    Route::get('/laporantransaksi', [App\Http\Controllers\Pimpinan\LDataTransaksiController::class, 'cek']);
    Route::post('/laporantransaksi', [App\Http\Controllers\Pimpinan\LDataTransaksiController::class, 'cek']);

    Route::get('/laporan_product', [App\Http\Controllers\Pimpinan\LDataProductController::class, 'laporan'])->name('laporan.product');
    Route::get('/laporanproduct', [App\Http\Controllers\Pimpinan\LDataProductController::class, 'cek']);
    Route::post('/laporanproduct', [App\Http\Controllers\Pimpinan\LDataProductController::class, 'cek']);
});


Route::group(['middleware' => ['role:user', 'auth'], 'prefix' => 'account'], function () {
    Route::get('/book', [App\Http\Controllers\HomeController::class, 'book'])->name('book');
    Route::get('/book/{id}', [App\Http\Controllers\User\BookingController::class, 'show'])->name('book.show');
    Route::post('/book', [App\Http\Controllers\BookingController::class, 'store'])->name('book.store');

    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'book'])->name('profile');
    Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
    Route::get('/history', [App\Http\Controllers\User\BookingController::class, 'index'])->name('user.history');
    Route::get('/product', [App\Http\Controllers\User\ProductController::class, 'index'])->name('user.product');
});

// Route::post('/save-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('save-token');
// Route::post('/send-notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send.notification');

// Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
Route::post('/store-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('store.token');
// Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
Route::group(['middleware' => ['role:admin', 'auth'], 'prefix' => 'admin'], function () {
    // Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

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
    Route::post('/booking/update/{id}', [App\Http\Controllers\Admin\BookingController::class, 'update'])->name('admin.booking.update');
    Route::get('/booking/delete/{id}', [App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('admin.booking.delete');


    //Category
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.delete');


    //Schedule
    Route::resource('schedule', App\Http\Controllers\Admin\ScheduleController::class);
    // Route::get('/schedule/store', [App\Http\Controllers\Admin\ScheduleController::class, 'store'])->name('admin.schedule.store');
    Route::get('/schedule/edit/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'edit'])->name('admin.schedule.edit');
    Route::get('/schedule/update/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'update'])->name('admin.schedule.update');
    Route::get('/schedule/delete/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'destroy'])->name('admin.schedule.delete');

    //Services
    Route::resource('services', App\Http\Controllers\Admin\ServicesController::class);
    Route::get('/services/edit/{id}', [App\Http\Controller\Admin\ServicesController::class, 'edit'])->name('admin.services.edit');
    Route::get('/services/update/{id}', [App\Http\Controller\Admin\ServicesController::class, 'update'])->name('admin.services.update');
    // Route::get('/services/delete/{id}', [App\Http\Controller\Admin\ServicesController::class, 'destroy'])->name('admin.services.delete');
    Route::get('/services/delete/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'destroy'])->name('admin.services.delete');




    //Product
    // Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.index');
    Route::post('/product/upload', [App\Http\Controllers\Admin\ProductController::class, 'upload'])->name('product.upload');
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
    Route::get('/product/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.product.edit');
    Route::get('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.product.delete');
});
