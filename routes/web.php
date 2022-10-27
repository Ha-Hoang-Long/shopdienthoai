<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('FE.layouts.home');
});

Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class,'index'])->name('admin.login');
    Route::post('/login',[AdminController::class,'account_verification'])->name('admin.account_verification');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::middleware(['admin'])->group(function(){
        Route::get('/dashboard',[AdminController::class,'show_dashboard'])->name('admin.show_dashboard');
        Route::get('/listing/{model}',[ListingController::class,'index'])->name('listing.index');
        
        
        Route::prefix('category-Product')->group(function(){
            Route::get('/add-category-product',[CategoryProductController::class,'add_categoryProduct'])->name('category_product.add');
            Route::post('/save-category-Product',[CategoryProductController::class,'create_categoryProduct'])->name('category_product.create');
            Route::get('/unactive-category-Product/{Ma_danh_muc}',[CategoryProductController::class,'unactive_categoryProduct'])->name('category_product.unactive');
            Route::get('/active-category-Product/{Ma_danh_muc}',[CategoryProductController::class,'active_categoryProduct'])->name('category_product.active');
            Route::get('/edit-category-Product/{Ma_danh_muc}',[CategoryProductController::class,'edit_categoryProduct']);
            Route::get('/delete-category-Product/{Ma_danh_muc}',[CategoryProductController::class,'delete_categoryProduct']);
            Route::post('/update-category-Product/{Ma_danh_muc}',[CategoryProductController::class,'update_categoryProduct']);
        });
        Route::prefix('brand-Product')->group(function(){
            Route::get('/add-brand-product',[BrandProductController::class,'add_brandProduct'])->name('brand_product.add');
            Route::post('/save-brand-Product',[BrandProductController::class,'save_brandProduct'])->name('brand_product.save');
            Route::get('/unactive-brand-Product/{Ma_hang}',[BrandProductController::class,'unactive_brandProduct'])->name('brand_product.unactive');
            Route::get('/active-brand-Product/{Ma_hang}',[BrandProductController::class,'active_brandProduct'])->name('brand_product.active');
            Route::get('/edit-brand-Product/{Ma_hang}',[BrandProductController::class,'edit_brandProduct']);
            Route::get('/delete-brand-Product/{Ma_hang}',[BrandProductController::class,'delete_brandProduct']);
            Route::post('/update-brand-Product/{Ma_hang}',[BrandProductController::class,'update_brandProduct']);
        });
        Route::prefix('Product')->group(function(){
            Route::get('/add-product',[ProductController::class,'add_Product'])->name('product.add');
            Route::post('/save-Product',[ProductController::class,'save_Product'])->name('product.save');
            Route::get('/unactive-Product/{Ma_sp}',[ProductController::class,'unactive_Product'])->name('product.unactive');
            Route::get('/active-Product/{Ma_sp}',[ProductController::class,'active_Product'])->name('product.active');
            Route::get('/edit-Product/{Ma_sp}',[ProductController::class,'edit_Product']);
            Route::post('/update-Product/{Ma_sp}',[ProductController::class,'update_Product']);
            Route::get('/delete-Product/{Ma_sp}',[ProductController::class,'delete_Product']);
        });
    });
});
