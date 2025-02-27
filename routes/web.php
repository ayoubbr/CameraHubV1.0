<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

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
    // $adminRole = Role::where('name', 'admin')->first();
    // echo $adminRole->description;
    return view('welcome');
});



Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('/profile', 'profile')->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('users', App\Http\Controllers\UserController::class);
    // Route::resource('categories', App\Http\Controllers\CategoryController::class);
    
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    
    Route::get('subcategories', [SubCategoryController::class, 'index'])->name('subcategories');
    Route::post('subcategories/store', [SubCategoryController::class, 'store'])->name('subcategories.store');

    
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
});

require __DIR__ . '/auth.php';
