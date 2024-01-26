<?php

use App\Http\Controllers\API\v1\Auth\LoginController;
use App\Http\Controllers\API\v1\Auth\ResetPasswordController;
use App\Http\Controllers\API\v1\Auth\VerificationController;
use App\Http\Controllers\API\v1\User\RegisterController;
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
    return $request->user();
});

Route::prefix('v1')->group(function(){
    Route::apiResource('/register', RegisterController::class);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/verify/{id}', [VerificationController::class, 'verify'])->name('verification');
    Route::post('/reset', [ResetPasswordController::class, 'reset']);
    Route::get('/resetPassLink/userId={id}', [ResetPasswordController::class, 'resetPasswordEmail'])->name('reset');
    Route::post('/resetPass', [ResetPasswordController::class, 'reset']);
    Route::middleware('auth:sancutum', 'verified')->group(function(){
        require __DIR__ . '/Rooms/room.php';
    });
});
