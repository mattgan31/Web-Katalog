<?php

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
Route::get('/', [FoodController::class, 'index'])->name('food');
Route::post('food', [FoodController::class, 'store'])->name('food');
Route::get('add-food', [FoodController::class, 'create']);
