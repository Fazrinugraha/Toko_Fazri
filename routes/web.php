<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\FlashsaleController;
use App\Http\Controllers\User\UserController;

// Guest Route
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');
    Route::post('/post-login', [AuthController::class, 'login']);

})->middleware('guest');

// Admin Route
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Product Route
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');   // Tambah Produk
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');  // Tambah Produk
    Route::get('/admin/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');  // Detail Produk
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');   // Edit Produk
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');   // Update Edit Produk
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete'); // Delete Produk

    // Distributor Route
    Route::get('/distributor', [DistributorController::class, 'index'])->name('admin.distributor');
    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
    Route::get('/distributor/create', [DistributorController::class, 'create'])->name('distributor.create'); // Tambah Distributor
    Route::post('/distributor/store', [DistributorController::class, 'store'])->name('distributor.store'); // Tambah Distributor
    Route::get('/admin/distributor/detail/{id}', [DistributorController::class, 'detail'])->name('distributor.detail'); // Detail Distributor
    Route::get('/distributor/edit/{id}', [DistributorController::class, 'edit'])->name('distributor.edit');   // Edit Distributor
    Route::put('distributor/update/{id}', [DistributorController::class, 'update'])->name('distributor.update');   // Update Distributor
    Route::delete('/distributor/delete/{id}', [DistributorController::class, 'delete'])->name('distributor.delete'); // Delete Distributor

    // Flashsale Routes
    Route::get('/flashsales', [FlashsaleController::class, 'index'])->name('admin.flashsales');
    Route::get('/flashsales/create', [FlashsaleController::class, 'create'])->name('admin.flashsales.create');  // Tambah Flashsale
    Route::post('/flashsales', [FlashsaleController::class, 'store'])->name('flashsale.store');  // Tambah Flashsale 
    Route::get('/flashsales/{id}', [FlashsaleController::class, 'detail'])->name('admin.flashsales.detail');  // Detail Flashsale
    Route::get('/flashsales/{id}/edit', [FlashsaleController::class, 'edit'])->name('admin.flashsales.edit');  // Edit Flashsale
    Route::put('/flashsales/{id}', [FlashsaleController::class, 'update'])->name('admin.flashsales.update');  // Udate Flashsale
    Route::delete('/flashsales/{id}', [FlashsaleController::class, 'delete'])->name('admin.flashsales.delete');  // Delete Flashsale

})->middleware('admin');


// User Route
Route::group(['middleware' => 'web'], function () {
    // Dashboard User
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');

    // Detail Produk User
    Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
    Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase']);
    Route::get('/flash-sale/{id}', [FlashsaleController::class, 'detailFlashSale']);

})->middleware('web');