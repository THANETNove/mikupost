<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MangaCoverController extends Controller
{
 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $dataViews = DB::table('mangas')
        ->rightJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
        ->where('manga_episodes.mangesId', 4)
        ->select('manga_episodes.*', 'mangas.cover_photo','mangas.manga_name','mangas.manga_details','mangas.author','mangas.artist','mangas.status',
        'mangas.views as mangas_views','mangas.website','mangas.updated_at as mangas_updated_at')
        ->groupBy('manga_episodes.episodeId')
        ->orderBy('manga_episodes.episodeId', 'DESC')
        ->paginate(100);

        
        return view('mangaCover.manga_cover',['dataViews'=> $dataViews]);
    }

    public function showMangaChapter(string $id,$episodeId)
    {

        $dataViews = DB::table('mangas')
        ->rightJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
        ->where('manga_episodes.mangesId',  $id)
        ->where('manga_episodes.episodeId', $episodeId)
        ->select('manga_episodes.*','mangas.manga_name')
        ->orderBy('manga_episodes.id_image', 'ASC')
        ->get();

   /*      $dataRan = DB::table('mangas')
        ->inRandomOrder()
        ->paginate(10);
       */

     

       // ต่อเพิ่มเงื่อนไขคิวรีตามที่คุณต้องการ
       $dataRan =    DB::table('mangas')->leftJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
           ->select('mangas.*', 'manga_episodes.mangesId', DB::raw('MAX(manga_episodes.episodeId) as maxEpisodeId'))
           ->groupBy('mangas.id')
           ->inRandomOrder()
           ->paginate(10);
          
        return view('mangaCover.manga_chapter',['dataViews' =>$dataViews,'dataRan'=>$dataRan]);
    }

   
}