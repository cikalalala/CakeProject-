<?php

use GuzzleHttp\Middleware;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/checkout/{product_slug}/{qty}',[ShopController::class,'checkout'])->name('shop.checkout');
Route::post('/buy', [ShopController::class, 'store'])->name('buy.store');
Route::get('/confirm/{orderId}', [ShopController::class, 'confirm'])->name('shop.confirm');
Route::get('/shop/{product_slug}',[ShopController::class,'product_details'])->name('shop.product.details');
Route::middleware(['auth'])->group(function () {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
});

Route::middleware([AuthAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/brands', [AdminController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brand/add', [AdminController::class, 'add_brand'])->name('admin.brand.add');
    Route::post('/admin/brand/store', [AdminController::class, 'add_brand_store'])->name('admin.brand.store');
    Route::get('/admin/brand/edit/{id}', [AdminController::class, 'edit_brand'])->name('admin.brand.edit');
    Route::put('/admin/brand/update', [AdminController::class, 'update_brand'])->name('admin.brand.update');
    Route::delete('/admin/brand/{id}/delete', [AdminController::class, 'delete_brand'])->name('admin.brand.delete');

    route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    route::get('/admin/categories/add', [AdminController::class, 'categories_add'])->name('admin.category.add');
    route::post('/admin/categories/store', [AdminController::class, 'category_store'])->name('admin.category.store');
    route::get('/admin/category/{id}/edit', [AdminController::class, 'edit_category'])->name('admin.category.edit');
    route::put('/admin/category/update', [AdminController::class, 'update_category'])->name('admin.category.update');
    route::delete('/admin/category/{id}/delete',[AdminController::class,'delete_category'])->name('admin.category.delete');

    Route::get('/admin/products',[AdminController::class,'products'])->name('admin.products');
    Route::get('/admin/product/add',[AdminController::class,'add_product'])->name('admin.product.add');
    Route::post('/admin/product/store',[AdminController::class,'product_store'])->name('admin.product.store');
    Route::get('/admin/product/{id}/edit',[AdminController::class,'edit_product'])->name('admin.product.edit');
    Route::put('/admin/product/update',[AdminController::class,'update_product'])->name('admin.product.update');
    Route::delete('/admin/product/{id}/delete',[AdminController::class,'delete_product'])->name('admin.product.delete');
});
