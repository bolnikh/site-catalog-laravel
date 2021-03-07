<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [App\Http\Controllers\CatalogController::class, 'index'])->name('home');
Route::get('/category/{category}', [App\Http\Controllers\CatalogController::class, 'category'])->name('category');
Route::get('/search', [App\Http\Controllers\CatalogController::class, 'search'])->name('search');
Route::get('/site/{site}', [App\Http\Controllers\CatalogController::class, 'site'])->name('site');
Route::get('/abuse/{site}', [App\Http\Controllers\CatalogController::class, 'abuse'])->name('site');
Route::get('/add_form', [App\Http\Controllers\CatalogController::class, 'add_form'])->name('add_form');
Route::get('/about', [App\Http\Controllers\CatalogController::class, 'about'])->name('about');
Route::get('/rules', [App\Http\Controllers\CatalogController::class, 'rules'])->name('rules');
Route::get('/search', [App\Http\Controllers\CatalogController::class, 'search'])->name('search');

Route::get('/add', [App\Http\Controllers\SiteController::class, 'add_form'])->name('add_form');
Route::post('/add', [App\Http\Controllers\SiteController::class, 'store'])->name('store');
