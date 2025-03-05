<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
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
    $categories = Category::all();
    $products = Product::paginate(4);
    $cart_count = 0;
    if (session('cart') != null) {
        $cart_count = count(session()->get('cart'));
    }
    return view('welcome', compact('categories', 'products', 'cart_count'));
});

Route::get('products', [ProductController::class, 'all'])->name('products.all');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update', [ProductController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [ProductController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/orders', [OrderController::class, 'index'])->name('odrers.index');




Route::group( ['middleware' => ['role:admin']],function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    }
);



Route::prefix('admin')->middleware('auth')->group(function () {

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

    Route::put('roles/update', [UserController::class, 'update'])->name('roles.update');
});

require __DIR__ . '/auth.php';
