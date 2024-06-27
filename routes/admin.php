<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
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
});
