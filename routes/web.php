<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\Authenticate;


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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [FoodController::class, 'index']);
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('home', [FoodController::class, 'index'])->name('home');
Route::get('admin', [AuthController::class, 'error']);
Route::group(['middleware' => 'auth'], function () {
    // User

    // Admin
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('admin/food', [AdminController::class, 'index'])->name('admin');
    Route::get('admin/add-food', [AdminController::class, 'create'])->name('admin-add');
    Route::post('admin/add-food', [AdminController::class, 'store'])->name('admin-add');
    Route::get('admin/show/{food}', [AdminController::class, 'show'])->name('admin-show');
    Route::get('admin/edit/{food}', [AdminController::class, 'edit'])->name('admin-edit');
    Route::put('admin/edit/{food}', [AdminController::class, 'update'])->name('admin-update');
    Route::delete('admin/delete/{food}', [AdminController::class, 'destroy'])->name('admin-delete');
    Route::get('admin/user', [UserController::class, 'index'])->name('list-users');


    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin
