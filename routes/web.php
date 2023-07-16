<?php

use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServeApiClassController;
use App\Http\Controllers\MangaCoverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MangaAdminController;
use App\Http\Controllers\CreateAdminController;
use App\Http\Controllers\EpisodesMangaController;
use App\Http\Controllers\CategoryController;



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
    Route::post('admin-home', [MangaAdminController::class, 'index'])->name('admin-home');
    Route::get('create-manga', [MangaAdminController::class, 'create']);
    Route::post('add-manga', [MangaAdminController::class, 'store'])->name('add-manga');
    Route::get('view-mange/{id}', [MangaAdminController::class, 'show'])->name('view-mange');
    Route::get('edit-mange/{id}', [MangaAdminController::class, 'edit'])->name('edit-mange');
    Route::put('update-manga/{id}', [MangaAdminController::class, 'update'])->name('update-manga');
    Route::get('delete-mange/{id}', [MangaAdminController::class, 'destroy'])->name('delete-mange');
    Route::get('create-episodes/{id}', [EpisodesMangaController::class, 'create'])->name('view-mange');
    Route::post('add-episodes', [EpisodesMangaController::class, 'store'])->name('add-episodes');
    Route::get('edit-episode/{mangesId}/{episodeId}', [EpisodesMangaController::class, 'edit'])->name('edit-episode');
    Route::put('update-episodes/{mangesId}/{episodeId}', [EpisodesMangaController::class, 'update'])->name('update-episodes');
    Route::get('delete-episode/{mangesId}/{episodeId}', [EpisodesMangaController::class, 'destroy'])->name('delete-episode');
    Route::get('create-category', [CategoryController::class, 'create'])->name('create-category');
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::post('add-category', [CategoryController::class, 'store'])->name('add-category');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::put('update-category/{id}', [CategoryController::class, 'update'])->name('update-category');
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete-category');
 });