<?php

use Illuminate\Support\Facades\Route;

// This is an API-only backend. The web routes file is intentionally
// kept minimal. All application endpoints live in routes/api.php.
Route::get('/', function () {
    return response()->json([
        'service' => config('app.name'),
        'message' => 'API-only backend. See /api for endpoints.',
    ]);
});
