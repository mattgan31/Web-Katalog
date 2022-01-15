<?php

use App\Http\Controllers\AdminFoodController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;


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
Route::get('/', [FoodController::class, 'index'])->name('home');
Route::post('food', [FoodController::class, 'store'])->name('food');
Route::get('add-food', [FoodController::class, 'create']);

// Admin
Route::get('admin', [AdminFoodController::class, 'index'])->name('admin');
Route::get('admin/add-food', [AdminFoodController::class, 'create'])->name('admin-add');
Route::post('admin/add-food', [AdminFoodController::class, 'create'])->name('admin-add');
Route::get('admin/show/{food}', [AdminFoodController::class, 'show'])->name('admin-show');
