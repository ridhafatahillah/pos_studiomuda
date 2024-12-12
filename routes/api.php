<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/booking', 'App\Http\Controllers\API\booking@store');
Route::get('/booking', 'App\Http\Controllers\API\booking@index');
Route::put('/booking', 'App\Http\Controllers\API\booking@update');
Route::patch('/booking', 'App\Http\Controllers\API\booking@destroy');
