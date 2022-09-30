<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

 
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('userlist', [AuthController::class, 'userList']);
Route::post('updateuser/{id}', [AuthController::class, 'updateUser']);
Route::get('usershow/{id}', [AuthController::class, 'showUser']);
Route::get('userdelete/{id}', [AuthController::class, 'destroyUser']);
  
Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [AuthController::class, 'userInfo']);
});