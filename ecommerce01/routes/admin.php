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

    Route::prefix('offer')->group(function() {

        Route::get('/coupon', 'OfferController@couponIndex')->name('coupon.index');
        Route::post('/coupon', 'OfferController@couponCreate')->name('coupon.create');
        Route::get('/delete/{id}', 'OfferController@couponDelete')->name('coupon.delete');
        Route::get('/updateView/{id}', 'OfferController@couponUpdateView')->name('coupon.updateView');
        Route::post('/update', 'OfferController@couponUpdate')->name('coupon.update');

        Route::get('/campaign', 'OfferController@campagnIndex')->name('campaign.index');

    });

    Route::prefix('picup')->group(function() {

        Route::get('/point', 'PicupController@picupIndex')->name('picup.point.index');
        Route::post('/coupon', 'PicupController@picupCreate')->name('picup.point.create');
        Route::get('/delete/{id}', 'PicupController@picupDelete')->name('picup.point.delete');
        Route::get('/updateView/{id}', 'PicupController@picupUpdateView')->name('picup.point.updateView');
        Route::post('/update', 'PicupController@picupUpdate')->name('picup.point.update');

    });

    Route::prefix('product')->group(function() {
        Route::get('/', 'ProductController@productIndex')->name('product.index');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::get('/manage', 'ProductController@manageIndex')->name('manage.index');
        // Route::get('/', 'ProductController@productIndex')->name('product.index');
    });

    Route::prefix('setting')->group(function() {
        // on-page seo route
        Route::get('/onPageSeo', 'SeoController@index')->name('seo.index');
        Route::post('/update', 'SeoController@update')->name('seo.update');
        // SMTP mail route
        Route::get('/smtp', 'SmtpController@index')->name('smtp.index');
        Route::post('/smtp/update', 'SmtpController@update')->name('smtp.update');
        // Dynamic pages route
        Route::get('/page/manage', 'PageCreationController@index')->name('page.index');
        Route::post('/page/create', 'PageCreationController@create')->name('page.create');
        Route::get('/updateView/{id}', 'PageCreationController@updateView')->name('page.updateView');
        Route::post('/page/update', 'PageCreationController@update')->name('page.update');
        Route::get('/page/delete/{id}', 'PageCreationController@delete')->name('page.delete');

        // websetting route
        Route::get('/website-setting', 'WebsiteAllSetting@index')->name('website.index');
        Route::post('/website-update', 'WebsiteAllSetting@update')->name('website.update');

        // Warehouse route
        Route::get('/warehouse', 'WarehouseController@index')->name('warehouse.index');
        Route::post('/warehouse/update', 'WarehouseController@update')->name('warehouse.update');
        
    });

});