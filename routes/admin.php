<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');


Route::group(['namespace'=>'App\Http\Controllers\Admin', 'middleware' =>'is_admin'], function(){
	Route::get('/admin/home','AdminController@admin')->name('admin.home');
	Route::get('/admin/logout','AdminController@logout')->name('admin.logout');


    // category
    Route::group(['prefix'=>'category'],function(){
        Route::get('/','CategoryController@index')->name('category.index');
        Route::post('store','CategoryController@store')->name('store.category');
        Route::get('/edit/{id}','CategoryController@edit');
        Route::post('update','CategoryController@update')->name('update.category');
        Route::get('delete/{id}','CategoryController@destroy')->name('delete.category');
    });
    // subcategory
    Route::group(['prefix'=>'subcategory'],function(){
        Route::get('/','SubcategoryController@index')->name('subcategory.index');
        Route::post('store','SubcategoryController@store')->name('store.subcategory');
        Route::get('/edit/{id}','SubcategoryController@edit');
        Route::post('update','SubcategoryController@update')->name('update.subcategory');
        Route::get('delete/{id}','SubcategoryController@destroy')->name('delete.subcategory');
    });
    // childcategory
    Route::group(['prefix'=>'childcategory'],function(){
        Route::get('/','ChildcategoryController@index')->name('childcategory.index');
        Route::post('store','ChildcategoryController@store')->name('store.childcategory');
        Route::get('/edit/{id}','ChildcategoryController@edit');
        Route::post('update','ChildcategoryController@update')->name('update.childcategory');
        Route::get('delete/{id}','ChildcategoryController@destroy')->name('delete.childcategory');
    });
    // brand
    Route::group(['prefix'=>'brand'],function(){
        Route::get('/','BrandController@index')->name('brand.index');
        Route::post('store','BrandController@store')->name('store.brand');
        Route::get('/edit/{id}','BrandController@edit');
        Route::post('update','BrandController@update')->name('update.brand');
        Route::get('delete/{id}','BrandController@destroy')->name('delete.brand');
    });

});
