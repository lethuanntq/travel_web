<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementAccountController;
use App\Http\Controllers\ManagementCustomerController;
use App\Http\Controllers\ManagementPostController;
use App\Http\Controllers\ManagementTourController;

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

Route::middleware('auth')->group(function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //management-posts
    Route::get('/management-post/index', [ManagementPostController::class, 'index'])->name('management-post.index');
    Route::get('/management-post/create', [ManagementPostController::class, 'create'])->name('management-post.create');
    Route::get('/management-post/{post}/edit', [ManagementPostController::class, 'edit'])->name('management-post.edit');

    Route::post('/management-post/store', [ManagementAccountController::class, 'store'])->name('management-post.store');
    Route::match(['put', 'patch'], '/management-account/post/{post}', [ManagementAccountController::class, 'update'])->name('management-post.update');

    //management-customers
    Route::get('/management-customer/index', [ManagementCustomerController::class, 'index'])->name('management-customer.index');
    Route::get('/management-customer/create', [ManagementCustomerController::class, 'create'])->name('management-customer.create');
    Route::get('/management-customer/{customer}/edit', [ManagementCustomerController::class, 'edit'])->name('management-customer.edit');

    Route::post('/management-customer/store', [ManagementAccountController::class, 'store'])->name('management-customer.store');
    Route::match(['put', 'patch'], '/management-customer/update/{customer}', [ManagementAccountController::class, 'update'])->name('management-customer.update');


    //management-accounts
    Route::get('/management-account/index', [ManagementAccountController::class, 'index'])->name('management-account.index');
    Route::get('/management-account/get-data', [ManagementAccountController::class, 'getData'])->name('management-account.data');
    Route::get('/management-account/create', [ManagementAccountController::class, 'create'])->name('management-account.create');
    Route::get('/management-account/{user}/edit', [ManagementAccountController::class, 'edit'])->name('management-account.edit');

    Route::post('/management-account/store', [ManagementAccountController::class, 'store'])->name('management-account.store');
    Route::match(['put', 'patch'], '/management-account/update/{user}', [ManagementAccountController::class, 'update'])->name('management-account.update');
    Route::delete('/management-account/delete/{user}', [ManagementAccountController::class, 'delete'])->name('management-account.delete');

    //management-tours
    Route::get('/management-tour/index', [ManagementTourController::class, 'index'])->name('management-tour.index');
    Route::get('/management-tour/create', [ManagementTourController::class, 'create'])->name('management-tour.create');
    Route::get('/management-tour/{tour}/edit', [ManagementTourController::class, 'edit'])->name('management-tour.edit');

    Route::post('/management-tour/store', [ManagementAccountController::class, 'store'])->name('management-tour.store');
    Route::match(['put', 'patch'], '/management-tour/update/{tour}', [ManagementAccountController::class, 'update'])->name('management-tour.update');
});
