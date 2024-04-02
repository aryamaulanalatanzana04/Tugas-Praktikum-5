<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
 /* The line `return ->user();` is returning the authenticated user associated with the
 incoming request. In this context, it is using Laravel Sanctum authentication middleware to
 retrieve the authenticated user making the request. The `user()` method on the `` object
 fetches the authenticated user instance. This route is protected by the 'auth:sanctum' middleware,
 which ensures that only authenticated users can access it. */
    return $request->user();
});
