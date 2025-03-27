<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;

Route::get("/", [MainController::class, 'dashboard'])->middleware('auth');
Route::get("/lainnya", [MainController::class, 'other'])->middleware('auth');

Route::resource('/barangs', ItemController::class)->withTrashed(['show']);

Route::resource('/petugass', UserController::class)->parameters(['petugass' => 'petugas'])->withTrashed(['show']);
Route::get("/profil", [UserController::class, 'profile'])->middleware('auth');

Route::get("/login", [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post("/login", [AuthController::class, 'authenticate']);
Route::post("/logout", [AuthController::class, 'logout']);

Route::get("/register", [AuthController::class, 'register'])->middleware('guest');
Route::post("/register", [AuthController::class, 'enroll']);


