<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\IndexController;
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
    return view('welcome');
});

Route::get('/first', function () {
    return view('first');
});





Route::get('createMobRecord', [IndexController::class, 'createMobRecord']);
Route::get('showMobile/{id}', [IndexController::class, 'showMobile']);
Route::get('showCustomer/{id}', [IndexController::class, 'showCustomer']);


Route::get('product/item', [ItemController::class, 'itmeView'])->name('item');
Route::get('fetchtest', [TestController::class, 'fetchTest']);
Route::get('createtest', [TestController::class, 'createTest']);
Route::get('fetchrecord/{id}', [TestController::class, 'onetoonefetch']);