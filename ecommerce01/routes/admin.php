<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin-login', [\App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
Route::get('/admin/home', [\App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');