<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GetMangaAllController extends Controller
{
    //getMangaAll

    public function getMangaAll(string $id,$numberPc)
    {
  
        $query = DB::table('mangas');

        // ต่อเพิ่มเงื่อนไขคิวรีตามที่คุณต้องการ
        $query->leftJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
            ->select('mangas.*', 'manga_episodes.mangesId', DB::raw('MAX(manga_episodes.episodeId) as maxEpisodeId'))
            ->where('mangas.categories_id', $id)
            ->groupBy('mangas.id')
            ->paginate($numberPc);
        
        // ดำเนินการคิวรีด้วย $query
        $data = $query->get();
        
        // ดำเนินการนับจำนวนแถว
        $dataCount = DB::table('mangas')->where('categories_id', $id)->count();

        return response()->json([
            'data' => $data,
            'dataCount' => $dataCount,
        ]);
        

    }
    
    public function getMangaRandom(string $id)
    {
        $data = DB::table('mangas')
        ->inRandomOrder()
        ->paginate(5);
        return response()->json($data);

    }
}