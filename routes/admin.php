<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\WarehouseController;
use App\Http\Controllers\Backend\PickupPointController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;

Route::get('admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('admin/home', [AdminController::class, 'admin'])->name('admin.home');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    //category
    Route::controller(CategoryController::class)
        ->prefix('category')
        ->name('category.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

    //subcategory
    Route::controller(SubCategoryController::class)
        ->prefix('subcategory')
        ->name('subcategory.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

    // brand
    Route::controller(BrandController::class)
        ->prefix('brand')
        ->name('brand.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

    //warehouse
    Route::controller(WarehouseController::class)
        ->prefix('warehouse')
        ->name('warehouse.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

    //coupon
    Route::controller(CouponController::class)
        ->prefix('coupon')
        ->name('coupon.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
            Route::get('/active/{id}', 'active')->name('active');
            Route::get('/inactive/{id}', 'inactive')->name('inactive');
        });

    //pickup point
    Route::controller(PickupPointController::class)
        ->prefix('pickuppoint')
        ->name('pickuppoint.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });

    //product
    Route::controller(ProductController::class)
        ->prefix('product')
        ->name('product.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
            Route::get('/active/{id}', 'active')->name('active');
            Route::get('/inactive/{id}', 'inactive')->name('inactive');
        });
});
