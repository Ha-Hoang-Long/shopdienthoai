<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;

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

// Route::get('/', [App\Http\Controllers\HomeController::class, 'wellcome']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/',[HomeController::class,'index'])->name('fe.home');
// Route::get('/home',[HomeController::class,'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/listing/{model}',[HomeController::class,'listing'])->name('fe.listing');
Route::get('/chi-tiet-san-pham/{Ma_sp}',[HomeController::class,'detail_Product'])->name('fe.detail');
Route::get('/cart',[HomeController::class,'cart']);
Route::get('/Add-cart/{id}',[CartController::class,'add_cart']);
Route::get('/list-cart',[CartController::class,'list_cart'])->name('fe.list_cart');
Route::get('/delete-item-list-cart/{id}',[CartController::class,'delete_ListItemcart'])->name('fe.delete_item_list_cart');
Route::get('/update-quantity-item-cart/{id}/{quantity}',[CartController::class,'save_itemcart'])->name('fe.update_item_list_cart');
Route::get('/check-out',[CheckoutController::class,'index'])->name('fe.checkout');
Route::post('/add-customer',[CheckoutController::class,'add_customer']);
Route::get('/pay-ment',[CheckoutController::class,'payment'])->name('checkout.payment');
Route::post('/order-place',[CheckoutController::class,'order_place']);
Route::get('/checkout-notifi',[CheckoutController::class,'checkout_notifi'])->name('checkout.notifi');

// profile
Route::get('/user/profile',[UserController::class,'index_profile'])->name('user.profile');


Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class,'index'])->name('admin.login');
    Route::post('/login',[AdminController::class,'account_verification'])->name('admin.account_verification');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::middleware(['admin'])->group(function(){
        Route::get('/dashboard',[AdminController::class,'show_dashboard'])->name('admin.show_dashboard');
        Route::get('/listing/image-product',[ImageController::class,'index'])->name('listing-product.index');
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