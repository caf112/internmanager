<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProgramController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles/search', [ArticleController::class, 'search'])->name('articles.search');
Route::post('/articles/industryFilter', [ArticleController::class, 'industryFilter'])->name('industryFilter');
Route::post('/articles/periodFilter', [ArticleController::class, 'periodFilter'])->name('periodFilter');
Route::post('/articles/selectionFilter', [ArticleController::class, 'selectionFilter'])->name('selectionFilter');
Route::get('/articles/order', [ArticleController::class,'order'])->name('articles.order');

Route::get('/programs/search', [ProgramController::class, 'search'])->name('programs.search');
Route::post('/programs/industryFilter', [ProgramController::class, 'industryFilter'])->name('industryFilter');
Route::post('/programs/periodFilter', [ProgramController::class, 'periodFilter'])->name('periodFilter');
Route::post('/programs/selectionFilter', [ProgramController::class, 'selectionFilter'])->name('selectionFilter');

Route::resource('/articles', ArticleController::class);

Route::resource('/programs', ProgramController::class);