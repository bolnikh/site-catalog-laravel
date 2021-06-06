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

Route::get('/site/{site}', [App\Http\Controllers\CatalogController::class, 'site'])->name('site');
Route::get('/abuse/{site}', [App\Http\Controllers\CatalogController::class, 'abuse'])->name('abuse');
Route::post('/abuse/{site}', [App\Http\Controllers\CatalogController::class, 'send_abuse'])->name('send_abuse');


Route::get('/search', [App\Http\Controllers\CatalogController::class, 'search'])->name('search');

Route::get('/add', [App\Http\Controllers\SiteController::class, 'add_form'])->name('add_form');
Route::post('/add', [App\Http\Controllers\SiteController::class, 'store'])->name('store');

Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\PageController::class, 'send_contact'])->name('send_contact');
Route::get('/rules', [App\Http\Controllers\PageController::class, 'rules'])->name('rules');


Route::prefix('admin')
    ->middleware(['auth.basic'])
    ->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\SiteController::class, 'index'])->name('admin.index');
    Route::get('/site/{site}', [\App\Http\Controllers\Admin\SiteController::class, 'site'])->name('admin.site');
    Route::post('/site/{site}/accept', [\App\Http\Controllers\Admin\SiteController::class, 'accept'])->name('admin.site.accept');
    Route::post('/site/{site}/decline', [\App\Http\Controllers\Admin\SiteController::class, 'decline'])->name('admin.site.decline');

    Route::get('/contact', [App\Http\Controllers\Admin\ContactController::class, 'contact'])->name('admin.contact');
    Route::get('/contact/{contact}', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('admin.contact.show');
    Route::get('/contact/{contact}/delete', [App\Http\Controllers\Admin\ContactController::class, 'delete'])->name('admin.contact.delete');

    Route::get('/abuse', [App\Http\Controllers\Admin\AbuseController::class, 'abuse'])->name('admin.abuse');
    Route::get('/abuse/{abuse}', [App\Http\Controllers\Admin\AbuseController::class, 'show'])->name('admin.abuse.show');
    Route::get('/abuse/{abuse}/delete', [App\Http\Controllers\Admin\AbuseController::class, 'delete'])->name('admin.abuse.delete');

});
