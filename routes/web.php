<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
});

require __DIR__ . '/auth.php';
