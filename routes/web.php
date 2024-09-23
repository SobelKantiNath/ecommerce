<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
//login na korar agahr route a product show korar jonno
Route::get('/',[HomeController::class,'home']);

//login korar por product show korar code
Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

Route::get('view_category',[AdminController::class,'view_category']);

Route::POST('add_category',[AdminController::class,'add_category']);

Route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);

Route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);

Route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);

Route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);

Route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);

Route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);

Route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);

Route::get('product_details/{id}',[HomeController::class,'product_details']);

Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth','verified']);

Route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth','verified']);

// Route::get('delete_cart/{id}',[HomeController::class,'delete_cart'])->middleware(['auth','verified']);

Route::post('confirm_order',[HomeController::class,'confirm_order'])->middleware(['auth','verified']);