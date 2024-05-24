<?php

// routes/web.php
use App\Http\Controllers\UrlController;

Route::get('/', [UrlController::class, 'index']);
Route::post('/shorten', [UrlController::class, 'store']);
Route::get('/{short_code}', [UrlController::class, 'show']);
