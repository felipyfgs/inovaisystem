<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| All HTTP endpoints for the Inovai ERP backend live here. The group is
| automatically prefixed with /api and uses the "api" middleware group
| as configured in bootstrap/app.php.
|
*/

// Public health probe used by Nuxt and CI to confirm the API is reachable.
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'service' => config('app.name'),
        'environment' => config('app.env'),
        'time' => now()->toIso8601String(),
    ]);
})->name('api.health');

// Authenticated user shortcut (Sanctum is added in phase 2).
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
})->name('api.user');
