<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;




Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->post('/admin/create-store', [AuthController::class, 'createStore']);
Route::get('/test-password', function() {
    $user = \App\Models\User::where('email', 'ali@g.com')->first();
    return [
        'user_exists' => (bool) $user,
        'check_password' => \Illuminate\Support\Facades\Hash::check('12345678', $user->password)
    ];
});