<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin-login', [\App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');


Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    $notify = array('message' => 'Successfuly logout', 'alert-type' => 'success');
    return redirect()->route('admin.login')->with($notify);
})->name('logout');

Route::group(['namespace' => '\App\Http\Controllers\Admin', 'middelware' => 'is_admin'],function () {
    Route::get('/admin/home', 'AdminContoller@admin')->name('admin.home');
    Route::get('/admin/profile/password_change', 'AdminContoller@profile')->name('profile.home');
    Route::post('/admin/profile/update_password', 'AdminContoller@changePass')->name('profile.changePass');

    Route::prefix('category')->group(function () {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('/create', 'CategoryController@create')->name('category.create');
        Route::get('/updateView/{id}', 'CategoryController@updateView')->name('category.updateView');
        Route::post('/update', 'CategoryController@update')->name('category.update');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    });

    Route::prefix('subcategory')->group(function() {
        Route::get('/', 'SubCategoryController@index')->name('subcategory.index');
        Route::post('/create', 'SubCategoryController@create')->name('subcategory.create');
        Route::get('/updateView/{id}', 'SubCategoryController@updateView')->name('subcategory.updateView');
        Route::post('/update', 'SubCategoryController@update')->name('subcategory.update');
        Route::get('/delete/{id}', 'SubCategoryController@delete')->name('subcategory.delete');
    });

    Route::prefix('childcategory')->group(function() {
        Route::get('/', 'ChildCategoryController@index')->name('childcategory.index');
        Route::post('/create', 'ChildCategoryController@create')->name('childcategory.create');
        Route::get('/updateView/{id}', 'ChildCategoryController@updateView')->name('childcategory.updateView');
        Route::post('/update', 'ChildCategoryController@update')->name('childcategory.update');
        Route::get('/delete/{id}', 'ChildCategoryController@delete')->name('childcategory.delete');
    });

    Route::prefix('brands')->group(function() {
        Route::get('/', 'BrandController@index')->name('brand.index');
        Route::post('/create', 'BrandController@create')->name('brand.create');
        Route::get('/updateView/{id}', 'BrandController@updateView')->name('brand.updateView');
        Route::post('/update', 'BrandController@update')->name('brand.update');
        Route::get('/delete/{id}', 'BrandController@delete')->name('brand.delete');
    });

});