<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GetMangaAllController extends Controller
{
    //getMangaAll

    public function getMangaAll(string $id)
    {
        $data = DB::table('mangas')
        ->leftJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
        ->select('mangas.*',  'manga_episodes.mangesId', DB::raw('MAX(manga_episodes.episodeId) as maxEpisodeId'))
        ->where('mangas.categories_id', $id)
        ->groupBy('mangas.id')
        ->get();
        return response()->json($data);

    }
}