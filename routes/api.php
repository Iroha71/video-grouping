<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaylistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::get('/playlist', [PlaylistController::class, 'index'])->middleware('auth:sanctum');
Route::post('/playlist', [PlaylistController::class, 'create'])->middleware('auth:sanctum');
