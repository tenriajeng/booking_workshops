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
    Route::get('/user/edit/{slug}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
    Route::get('/user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.delete');


    Route::resource('booking', App\Http\Controllers\Admin\BookingController::class);
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('schedule', App\Http\Controllers\Admin\ScheduleController::class);


    Route::post('/product/upload', [App\Http\Controllers\Admin\ProductController::class, 'upload'])->name('product.upload');
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
});
