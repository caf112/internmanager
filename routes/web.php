<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProgramController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles/search', [ArticleController::class, 'search'])->name('articles.search');

Route::get('/programs/search', [ProgramController::class, 'search'])->name('programs.search');


Route::resource('/articles', ArticleController::class);

Route::resource('/programs', ProgramController::class);

