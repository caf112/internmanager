<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProgramController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/articles', ArticleController::class);

Route::resource('/programs', ProgramController::class);

Route::get('/articles/search', 'ArticleController@search')->name('articles.search');