<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

// Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return redirect()->route('admin.login');
})->name('logout');


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middelware' => 'is_admin'], function() {
    Route::get('admin/home', 'AdminController@admin')->name('admin.home');
});