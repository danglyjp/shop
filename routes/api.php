<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
|--------------------------------------------------------------------------
| Đặc điểm API
|--------------------------------------------------------------------------
| không lưu được session
| bảo mật ap sử dụng json web token JWT
|
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Google Sign In
Route::post('/get-google-sign-in-url', [\App\Http\Controllers\Api\GoogleController::class, 'getGoogleSignInUrl']);
Route::get('/callback', [\App\Http\Controllers\Api\GoogleController::class, 'loginCallback']);
Route::get('/product', [\App\Http\Controllers\Api\ProductController::class, 'index']);
Route::get('/product/{id}', [\App\Http\Controllers\Api\ProductController::class, 'show']);