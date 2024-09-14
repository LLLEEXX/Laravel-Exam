<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PositionController;

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


Route::post('/store-position', [PositionController::class, 'store_position']);

Route::get('/get-all-positions', [PositionController::class, 'get_all_positions']);

Route::get('/get-position', [PositionController::class, 'get_position']);

Route::put('/update-position/{id}', [PositionController::class,'update_position']);

Route::delete('/delete-position/{id}', [PositionController::class,'delete_position']);
