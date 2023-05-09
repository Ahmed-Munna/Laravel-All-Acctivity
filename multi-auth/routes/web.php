<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/register', 'showReg')->name('admin-reg')->withoutMiddleware([EnsureTokenIsValid::class]);
    Route::post('/admin/register', 'store')->name('store');
    Route::get('/admin/dashboard', 'showDash')->name('admin-dashboard')->middleware('admin');
    Route::get('/admin/login', 'loginView')->name('admin-login');
    Route::post('/admin/login', 'login')->name('login');
});
// Route::middleware(['middleware'=>'admin'])->group(function () {
//     Route::controller(AdminController::class)->group(function () {
        
//     });
// });

