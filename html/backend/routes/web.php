<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/properties', [PropertyController::class, 'index']);
Route::get('/properties/{province}', [PropertyController::class, 'getByProvince']);