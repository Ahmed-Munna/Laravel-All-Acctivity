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

    Route::prefix('category')->group(function () {
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('/create', 'CategoryController@create')->name('category.create');
        Route::get('/updateView/{id}', 'CategoryController@updateView')->name('category.updateView');
        Route::put('/update', 'CategoryController@update')->name('category.update');
        Route::get('/delete/{id}', 'CategoryController@delete')->name('category.delete');
    });
});