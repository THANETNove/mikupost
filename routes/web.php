<?php

use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServeApiClassController;
use App\Http\Controllers\MangaCoverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MangaAdminController;
use App\Http\Controllers\CreateAdminController;
use App\Http\Controllers\EpisodesMangaController;



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

//  หน้า อ่าน Manga 

Route::get('/home', [HomeController::class, 'index']);
Route::get('/update-retral/{name}', [ServeApiClassController::class, 'update']);
Route::get('/manga-cover-show/{id}', [MangaCoverController::class, 'show']);
Route::get('/manga-chapter/{id}', [MangaCoverController::class, 'showMangaChapter']);




// admin
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('admin', [CreateAdminController::class, 'index']);
    Route::get('register-admin', [CreateAdminController::class, 'create']);
    Route::post('create-admin', [CreateAdminController::class, 'store']);
    Route::get('delete-admin/{id}', [CreateAdminController::class, 'destroy']);
    Route::get('admin-home', [MangaAdminController::class, 'index'])->name('admin-home');
    Route::get('create-manga', [MangaAdminController::class, 'create']);
    Route::post('add-manga', [MangaAdminController::class, 'store'])->name('add-manga');
    Route::get('view-mange/{id}', [MangaAdminController::class, 'show'])->name('view-mange');
    Route::get('create-episodes/{id}', [EpisodesMangaController::class, 'create'])->name('view-mange');
    Route::post('add-episodes', [EpisodesMangaController::class, 'store'])->name('add-episodes');
    Route::get('edit-episode/{id}', [EpisodesMangaController::class, 'edit'])->name('edit-episodes');
 });