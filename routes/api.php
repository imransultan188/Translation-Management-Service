<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\ScopeController;

use App\Http\Controllers\API\{
    LoginController,
    TranslationController,
};


Route::post('/oauth/token', [AccessTokenController::class, 'issueToken'])
    ->middleware(['throttle']);


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

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/translations', [TranslationController::class, 'store']);
    Route::put('/translations/{id}', [TranslationController::class, 'update']);
    Route::get('/translations', [TranslationController::class, 'index']);
    Route::get('/translations/export', [TranslationController::class, 'export']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
