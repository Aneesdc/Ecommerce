<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Category;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('user_register', [AuthController::class, 'user_register'])->name('user_register');
Route::post('user_login', [AuthController::class, 'user_login'])->name('user_login');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('category-add',[CategoryController::class,'category_add'])->name('cateogry-add');
    Route::post('category-request',[CategoryController::class , 'category_request'])->name('category-request');
    Route::get('category',[CategoryController::class ,'category'])->name('category');
    Route::get('category-delete/{id}',[CategoryController::class,'category_delete'])->name('category-delete');
    Route::get('category-update/{id}',[CategoryController::class,'category_update'])->name('category-update');
    Route::post('update-request',[CategoryController::class, 'update_request'])->name('update-request');

    // sub category
    Route::get('subcategory',[SubCategoryController::class,'index'])->name('subcategory');
    Route::get('subcategory-add',[SubCategoryController::class,'subcategory_add'])->name('subcategory-add');
    Route::post('subcategory-request',[SubCategoryController::class,'subcategory_request'])->name('subcategory-request');
    Route::get('subcategory-delete/{id}',[SubCategoryController::class, 'subcategory_delete'])->name('subcategory-delete');
});
