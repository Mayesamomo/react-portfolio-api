<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\ProjectController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//testing route
// Route::get('portfolio', function() {
//     return "This is a portfolio testing";
// });

//project's route
Route::get('projects', [ProjectController::class, 'index']);


//tag's route 
Route::get('tags', [TagController::class, 'index']);
Route::post('tags', [TagController::class, 'store']);
Route::get('tags/{id}',[TagController::class,'show']);
Route::get('tags/{id}/edit',[TagController::class,'edit']);
Route::put('tags/{id}/edit',[TagController::class,'update']);

