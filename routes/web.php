<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//    Route::get('/articles', CreateController::class, 'index'])->name('articles.index');
//    Route::get('/articles/create', [CreateController::class, 'create'])->name('articles.create');
//    Route::get('/articles/{id}', [ShowController::class, 'show'])->name('articles.show');
//    Route::get('/articles/{id}/edit', [EditController::class, 'edit'])->name('articles.edit');
//    Route::post('/articles', [StoreController::class, 'store'])->name('articles.store');
//    Route::patch('/articles/{id}', [UpdateController::class, 'update'])->name('articles.update');
//    Route::delete('/articles/{id}', [DestroyController::class, 'destroy'])->name('articles.destroy');




Route::namespace('App\Http\Controllers\Article')->group(function () {
    Route::get('/articles','IndexController')->name('articles.index');
    Route::get('/articles/create', 'CreateController')->name('articles.create');
    Route::get('/articles/{id}', 'ShowController')->name('articles.show');
    Route::get('/articles/{id}/edit', 'EditController')->name('articles.edit');
    Route::post('/articles', 'StoreController')->name('articles.store');
    Route::patch('/articles/{id}', 'UpdateController')->name('articles.update');
    Route::delete('/articles/{id}', 'DestroyController')->name('articles.destroy');
});
