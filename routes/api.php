<?php

use App\Http\Controllers\Note\CategoryController;
use App\Http\Controllers\Note\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/notes', [NoteController::class, 'get']);
Route::get('/notes/{id}', [NoteController::class, 'show']);
Route::post('/note/add', [NoteController::class, 'create']);

Route::get('/categories', [CategoryController::class, 'get']);
