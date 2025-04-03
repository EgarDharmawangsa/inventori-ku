<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/chart-data', [UserController::class, 'getPieChartData']);

Route::get('/active-users', [UserController::class, 'getActiveUsers']);

Route::get('/item-logs', [ItemController::class, 'getItemLogs']);
