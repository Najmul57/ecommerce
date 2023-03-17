<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'is_admin'], function () {
    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('admin/password/change', 'AdminController@adminPasswordChange')->name('admin.password.change');
    Route::post('admin/password/update', 'AdminController@adminPasswordUpdate')->name('admin.password.update');


    // category
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('store', 'CategoryController@store')->name('store.category');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('update', 'CategoryController@update')->name('update.category');
        Route::get('delete/{id}', 'CategoryController@destroy')->name('delete.category');
    });

    Route::get('get-child-category/{id}','CategoryController@getChildCategory');

    // category
    Route::group(['prefix' => 'warehouse'], function () {
        Route::get('/', 'WarehouseController@index')->name('warehouse.index');
        Route::post('store', 'WarehouseController@store')->name('store.warehouse');
        Route::get('/edit/{id}', 'WarehouseController@edit');
        Route::post('update', 'WarehouseController@update')->name('update.warehouse');
        Route::get('delete/{id}', 'WarehouseController@destroy')->name('delete.warehouse');
    });

    // subcategory
    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/', 'SubcategoryController@index')->name('subcategory.index');
        Route::post('store', 'SubcategoryController@store')->name('store.subcategory');
        Route::get('/edit/{id}', 'SubcategoryController@edit');
        Route::post('update', 'SubcategoryController@update')->name('update.subcategory');
        Route::get('delete/{id}', 'SubcategoryController@destroy')->name('delete.subcategory');
    });
    // childcategory
    Route::group(['prefix' => 'childcategory'], function () {
        Route::get('/', 'ChildcategoryController@index')->name('childcategory.index');
        Route::post('store', 'ChildcategoryController@store')->name('store.childcategory');
        Route::get('/edit/{id}', 'ChildcategoryController@edit');
        Route::post('update', 'ChildcategoryController@update')->name('update.childcategory');
        Route::get('delete/{id}', 'ChildcategoryController@destroy')->name('delete.childcategory');
    });
    // brand
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', 'BrandController@index')->name('brand.index');
        Route::post('store', 'BrandController@store')->name('store.brand');
        Route::get('/edit/{id}', 'BrandController@edit');
        Route::post('update', 'BrandController@update')->name('update.brand');
        Route::get('delete/{id}', 'BrandController@destroy')->name('delete.brand');
    });
    // product
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('store', 'ProductController@store')->name('store.product');
        Route::get('/edit/{id}', 'ProductController@edit');
        Route::post('update', 'ProductController@update')->name('update.product');
        Route::get('delete/{id}', 'ProductController@destroy')->name('delete.product');
    });
    // coupon
    Route::group(['prefix' => 'coupon'], function () {
        Route::get('/', 'CouponController@index')->name('coupon.index');
        Route::post('store', 'CouponController@store')->name('store.coupon');
        Route::get('/edit/{id}', 'CouponController@edit');
        Route::post('update', 'CouponController@update')->name('update.coupon');
        Route::get('delete/{id}', 'CouponController@destroy')->name('delete.coupon');
    });
    // setting
    Route::group(['prefix' => 'setting'], function () {
        // seo
        Route::group(['prefix' => 'seo'], function () {
            Route::get('/', 'SettingController@seo')->name('seo.setting');
            Route::post('/update/{id}', 'SettingController@seoupdate')->name('seo.update');
        });
        // smtp
        Route::group(['prefix' => 'smtp'], function () {
            Route::get('/', 'SettingController@smtp')->name('smtp.setting');
            Route::post('/update/{id}', 'SettingController@smtpupdate')->name('smtp.update');
        });
        // smtp
        Route::group(['prefix' => 'website'], function () {
            Route::get('/', 'SettingController@website')->name('website.setting');
            Route::post('/update/{id}', 'SettingController@websiteupdate')->name('website.update');
        });
        // smtp
        Route::group(['prefix' => 'page'], function () {
            Route::get('/', 'PageController@page')->name('page.index');
            Route::get('create', 'PageController@create')->name('create.page');
            Route::post('store', 'PageController@store')->name('store.page');
            Route::get('edit/{id}', 'PageController@edit')->name('page.edit');
            Route::post('update/{id}', 'PageController@update')->name('page.update');
            Route::get('destroy/{id}', 'PageController@destroy')->name('page.delete');
        });
        // pickup point
        Route::group(['prefix' => 'pickup-point'], function () {
            Route::get('/', 'PickupController@page')->name('pickuppoint.index');
            Route::post('store', 'PickupController@store')->name('store.page');
            Route::get('/edit/{id}', 'PickupController@edit');
            Route::post('update', 'PickupController@update')->name('page.update');
            Route::get('destroy/{id}', 'PickupController@destroy')->name('page.delete');
        });
    });
});
