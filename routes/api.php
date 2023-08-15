<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('portfolio', function() {
    return "This is a portfolio testing";
});
Route::get('projects', [ProjectController::class, 'index']);