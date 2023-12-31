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
use App\Http\Controllers\GetMangaAllController;
use App\Http\Controllers\CommentMangasController;
use App\Http\Controllers\SitemapController;



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
    $data = DB::table('categories')
    ->get();
    return view('welcome' ,['data' => $data]);
});



Auth::routes();

//  หน้า อ่าน Manga 


Route::post('/update-user-status', [HomeController::class, 'userUploadsStatus'])->name('update-user-status');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user-uploads', [HomeController::class, 'userUploads'])->name('user-uploads');
Route::post('/user-uploads', [HomeController::class, 'userUploads'])->name('user-uploads');
Route::get('/get-manga-all/{id}/{numberPc}', [GetMangaAllController::class, 'getMangaAll']);
Route::get('/get-manga-random/{id}', [GetMangaAllController::class, 'getMangaRandom']);
Route::get('/update-retral/{name}', [ServeApiClassController::class, 'update']);
Route::get('/manga-cover-show/{id}', [MangaCoverController::class, 'show']);
Route::get('/profile', [MangaCoverController::class, 'profile']);
Route::get('/manga-chapter/{id}/{episodeId}', [MangaCoverController::class, 'showMangaChapter']);
Route::get('/episodes-all/{id}', [MangaCoverController::class, 'episodesAll']);
Route::post('/add-comment', [CommentMangasController::class, 'store'])->name('add-comment');
Route::post('/add-comment-episode', [CommentMangasController::class, 'storeEpisode'])->name('add-comment-episode');
Route::post('/add-image-profile', [HomeController::class, 'store'])->name('add-image-profile');
Route::get('/search-manges', [MangaCoverController::class, 'searchManges'])->name('search-manges');
Route::get('/search-manges/{id}', [MangaCoverController::class, 'searchMangesId'])->name('search-manges');
Route::post('/search-manges', [MangaCoverController::class, 'searchManges'])->name('search-manges');
Route::get('/search-categories/{id}', [MangaCoverController::class, 'searchCategories'])->name('search-categories');


Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap_xml');


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

// admin
Route::group(['middleware' => ['is_admin']], function () {
    Route::get('admin', [CreateAdminController::class, 'index']);
    Route::get('register-admin', [CreateAdminController::class, 'create']);
    Route::post('create-admin', [CreateAdminController::class, 'store']);
    Route::get('delete-admin/{id}', [CreateAdminController::class, 'destroy']);
   

    Route::get('create-category', [CategoryController::class, 'create'])->name('create-category');
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::post('add-category', [CategoryController::class, 'store'])->name('add-category');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::put('update-category/{id}', [CategoryController::class, 'update'])->name('update-category');
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete-category');
 });