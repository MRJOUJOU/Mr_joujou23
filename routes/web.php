<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\OeuvreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes pour mes catégories
Route::resource('categories', CategorieController::class);

// Routes pour mes œuvres d’art
Route::resource('oeuvres', OeuvreController::class);
