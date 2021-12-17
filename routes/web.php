<?php

use App\Http\Controllers\Travel\DestinationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Management\AccountController;
use App\Http\Controllers\Management\BookingController;
use App\Http\Controllers\Management\PostController;
use App\Http\Controllers\Management\TourController;
use App\Http\Controllers\Management\HomeController;
use App\Http\Controllers\Travel\DiscountController;
use App\Http\Controllers\Travel\ExperienceController;
use App\Http\Controllers\Travel\NewsController;
use App\Http\Controllers\Management\SettingController;

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

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Route::get('/', [\App\Http\Controllers\Travel\HomeController::class, 'index'])->name('home');
Route::get('/about-me', [\App\Http\Controllers\Travel\HomeController::class, 'aboutMe'])->name('about-me');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/contact', [\App\Http\Controllers\Travel\HomeController::class, 'conTact'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\Travel\HomeController::class, 'postContact'])->name('post.contact');

Route::group([
    'as' => 'travel.',
], function () {
    Route::get('/khuyen-mai', [DiscountController::class, 'index'])->name('discount.index');
    Route::get('/kinh-nghiem', [ExperienceController::class, 'index'])->name('experience.index');
    Route::get('/tin-tuc', [NewsController::class, 'index'])->name('news.index');
    Route::get('/tin-tuc/{post}', [NewsController::class, 'detail'])->name('news.detail');

    Route::post('/email/notification', [\App\Http\Controllers\Travel\HomeController::class, 'notification'])->name('email.notification');

    Route::get('/diem-den', [DestinationController::class, 'index'])->name('destination.index');
    Route::get('/diem-den/{destination}', [DestinationController::class, 'detail'])->name('destination.detail');

    Route::get('/tour/{tour}', [\App\Http\Controllers\Travel\TourController::class, 'detail'])->name('tour.detail');
    Route::post('/booking', [\App\Http\Controllers\Travel\BookingController::class, 'store'])->name('booking.store');
});

Route::group([
    'as' => 'management.',
    'prefix' => 'management',
    'middleware' => ['auth']
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group([
        'middleware' => ['auth', 'can:editor']
    ], function () {
        //posts
        Route::get('post', [PostController::class, 'index'])->name('post.index');
        Route::get('post-data', [PostController::class, 'getData'])->name('post.data');
        Route::get('post/new', [PostController::class, 'create'])->name('post.create');
        Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

        Route::post('post-store', [PostController::class, 'store'])->name('post.store');
        Route::match(['put', 'patch'], 'post/{post}', [PostController::class, 'update'])->name('post.update');

        Route::delete('post-delete/{post}', [PostController::class, 'delete'])->name('post.delete');
        Route::post('highlight', [PostController::class, 'highlight'])->name('post.highlight');

        //tours
        Route::get('tour', [TourController::class, 'index'])->name('tour.index');
        Route::get('tour-data', [TourController::class, 'getData'])->name('tour.data');
        Route::get('tour/new', [TourController::class, 'create'])->name('tour.create');
        Route::get('tour/{tour}/edit', [TourController::class, 'edit'])->name('tour.edit');

        Route::post('tour', [TourController::class, 'store'])->name('tour.store');
        Route::match(['put', 'patch'], 'tour-update/{tour}', [TourController::class, 'update'])->name('tour.update');

        Route::delete('tour/{tour}', [TourController::class, 'delete'])->name('tour.delete');
        Route::post('display', [TourController::class, 'display'])->name('tour.display');
    });

    Route::group([
        'middleware' => ['auth', 'can:admin']
    ], function () {
        //bookings
        Route::get('booking', [BookingController::class, 'index'])->name('booking.index');
        Route::get('booking-data', [BookingController::class, 'getData'])->name('booking.data');
        Route::get('booking/{booking}/edit', [BookingController::class, 'edit'])->name('booking.edit');

        Route::post('booking-store', [BookingController::class, 'store'])->name('booking.store');
        Route::match(['put', 'patch'], '/booking/update/{booking}', [BookingController::class, 'update'])->name('booking.update');

        Route::delete('booking/{booking}', [BookingController::class, 'delete'])->name('booking.delete');

        //accounts
        Route::get('account', [AccountController::class, 'index'])->name('account.index');
        Route::get('account-data', [AccountController::class, 'getData'])->name('account.data');
        Route::get('account/new', [AccountController::class, 'create'])->name('account.create');
        Route::get('account/{user}/edit', [AccountController::class, 'edit'])->name('account.edit');

        Route::post('account', [AccountController::class, 'store'])->name('account.store');
        Route::match(['put', 'patch'], 'account/{user}', [AccountController::class, 'update'])->name('account.update');

        Route::delete('/account/delete/{user}', [AccountController::class, 'delete'])->name('account.delete');

        Route::get('setting', [SettingController::class, 'edit'])->name('setting.edit');
        Route::match(['put', 'patch'], 'setting/{setting}', [SettingController::class, 'update'])->name('setting.update');
    });
});
