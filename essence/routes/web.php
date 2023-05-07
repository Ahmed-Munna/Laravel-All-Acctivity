<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderStatusController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EssenceController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('Home.layouts.template');
// });

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'home')->name('home-page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(DashboardController::class)->group(function() {
        Route::get('/admin/dashboard', 'index')->name('admin.dahsboard');
    });
});

// Start category route

Route::controller(CategoryController::class)->group(function () {

    Route::get('/admin/categorys/all-category', 'index')->name('all-category');
    Route::get('/admin/categorys/add-category', 'addCategory')->name('add-category');
    Route::post('/admin/categorys/store-category', 'storeCategory')->name('store-category');
    Route::get('/admin/categorys/edit-category/{id}', 'editCategory')->name('edit-category');
    Route::post('/admin/categorys/update-category', 'updateCategory')->name('update-category');
    Route::get('admin/categorys/delete-category/{id}', 'deleteCategory')->name('delete-category');

});

// end category route

// sub category controller

Route::controller(SubCategoryController::class)->group(function () {
    Route::get('/admin/categorys/all-sub-category', 'index')->name('all-sub-category');
    Route::get('/admin/categorys/add-sub-category', 'addSubCategory')->name('add-sub-category');
    Route::post('/admin/categorys/store-sub-category', 'storeSubCategory')->name('store-sub-category');
    Route::get('/admin/categorys/update-sub-category/{id}', 'editSubCategory')->name('edit-sub-category');
    Route::post('/admin/categorys/updates-sub-category', 'updateSubCategory')->name('update-sub-category');
    Route::get('/admin/categorys/delete-sub-category/{id}', 'deleteSubCategory')->name('delete-sub-category');

});

// Start product controller

Route::controller(ProductController::class)->group(function () {
    Route::get('/admin/products/all-product', 'index')->name('all-product');
    Route::get('/admin/products/add-product', 'addProduct')->name('add-product');
    Route::post('/admin/products/store-product', 'storeProduct')->name('store-product');
    Route::get('/admin/products/update-product/{id}', 'editProduct')->name('edit-product');
    Route::post('/admin/products/edit-product', 'updateProduct')->name('update-product');
    Route::get('/admin/products/delete-product/{id}','deleteProduct')->name('delete-product');
});

// End product Controller

// frondend all route start

Route::controller(EssenceController::class)->group(function () {
    Route::get('/home/contents/shop', 'index')->name('shop-page');
    Route::get('/home/contents/single-product', 'singleProduct')->name('single-product');
});

require __DIR__.'/auth.php';
