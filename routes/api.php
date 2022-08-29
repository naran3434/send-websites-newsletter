<?php

use App\Http\Controllers\CreatePost;
use App\Http\Controllers\Subscribe;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('post/store', CreatePost::class)->name('post.store');
Route::post('user/subscribe', Subscribe::class)->name('user.subscribe');
