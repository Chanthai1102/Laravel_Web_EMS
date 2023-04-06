<?php

use Illuminate\Support\Facades\Route;
//Backend
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\adminController;
use App\Http\Controllers\Backend\WebsiteLogoController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ColorController;

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
//Register and Login
//Register
Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/register/submit',[UserController::class, 'register_submit']);
//Login
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login/submit', [UserController::class, 'login_submit']);
//@admin
Route::prefix('/admin')->group(function (){
    Route::middleware(['auth'])->group(function (){
//        admin
        Route::get('/',[adminController::class, 'admin'])->name('admin');
        //Logout
        Route::get('/logout', [UserController::class, 'logout']);

//        website Logo
        Route::get('/websitelogo', [WebsiteLogoController::class, 'websitelogo']);
        Route::get('/websitelogo-add',[WebsiteLogoController::class, 'add_websitelogo']);
        Route::post('/websitelogo-add/submit', [WebsiteLogoController::class, 'add_websitelogo_submit']);
        Route::get('/websitelogo-edit/{id}', [WebsiteLogoController::class, 'edit_websitelogo']);
        Route::post('/websitelogo-edit/submit', [WebsiteLogoController::class, 'edit_websitelogo_submit']);
//        Category
        Route::get('/category-add', [CategoryController::class, 'add_category']);
        Route::post('/category-add/submit', [CategoryController::class, 'add_category_submit']);
        Route::get('/category-view', [CategoryController::class, 'view_category']);
        Route::get('/category-edit/{id}', [CategoryController::class, 'edit_category']);
        Route::post('/category-edit/submit', [CategoryController::class, 'edit_category_submit']);
//        Size
        Route::get('/size-add', [SizeController::class, 'add_size']);
        Route::post('/size-add/submit', [SizeController::class, 'add_size_submit']);
        Route::get('/size-view', [SizeController::class, 'view_size']);
        Route::get('/size-edit/{id}', [SizeController::class, 'edit_size']);
        Route::post('/size-edit/submit', [SizeController::class, 'edit_size_submit']);
//        Color
        Route::get('/color-view', [ColorController::class, 'view_color']);
        Route::get('/color-add', [ColorController::class, 'add_color']);
        Route::post('/color-add/submit', [ColorController::class, 'add_color_submit']);
        Route::get('/color-edit/{id}', [ColorController::class, 'edit_color']);
        Route::post('/color-edit/submit', [ColorController::class, 'edit_color_submit']);
//        Product
        Route::get('/product-add', [ProductController::class, 'add_product']);
    });
});
