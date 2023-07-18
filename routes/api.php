<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProtectedController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout']);
Route::post('/token/refresh', [TokenController::class, 'refresh']);

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/protected-route', [ProtectedController::class, 'index']);
});
