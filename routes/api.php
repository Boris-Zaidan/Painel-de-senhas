<?php


use App\Http\Controllers\SenhaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('senhas', [SenhaController::class, 'store']);
    Route::get('senhas', [SenhaController::class, 'index']);
});

