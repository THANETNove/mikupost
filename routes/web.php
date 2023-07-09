<?php

use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServeApiClassController;
use App\Http\Controllers\MangaCoverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\CreateAdminController;


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

Route::get('/home', [HomeController::class, 'index']);

Route::get('/update-retral/{name}', [ServeApiClassController::class, 'update']);
Route::get('/manga-cover-show/{id}', [MangaCoverController::class, 'show']);
Route::get('/manga-chapter/{id}', [MangaCoverController::class, 'showMangaChapter']);


// admin
Route::get('admin-home', [HomeAdminController::class, 'index']);

Route::group(['middleware' => ['is_admin']], function () {
    Route::get('admin', [CreateAdminController::class, 'index']);
    Route::get('register-admin', [CreateAdminController::class, 'create']);
    Route::post('create-admin', [CreateAdminController::class, 'store']);
    Route::get('delete-admin/{id}', [CreateAdminController::class, 'destroy']);
 });