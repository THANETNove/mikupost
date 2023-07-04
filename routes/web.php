<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServeApiClassController;
use App\Http\Controllers\MangaCoverController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/update-retral/{name}', [ServeApiClassController::class, 'update']);
Route::get('/manga-cover-show/{id}', [MangaCoverController::class, 'show']);