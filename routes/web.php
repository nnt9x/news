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

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [\App\Http\Controllers\NewsController::class, 'viewHomePage']);

Route::get('/home/news/{id}', [\App\Http\Controllers\NewsController::class, 'viewNewsById']);

Route::delete('/home/news/{id}', [\App\Http\Controllers\NewsController::class, 'deleteNewsById']);

Route::post('/home/create', [\App\Http\Controllers\NewsController::class, 'createNews']);

Route::get('/home/create', [\App\Http\Controllers\NewsController::class, 'viewCreateNewsPage']);
