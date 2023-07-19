<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;



class MangaCoverController extends Controller
{
 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $dataViews = DB::table('mangas')
        ->rightJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
        ->where('manga_episodes.mangesId',  $id)
        ->select('manga_episodes.*', 'mangas.cover_photo','mangas.manga_name','mangas.manga_details','mangas.categories_id','mangas.author','mangas.artist','mangas.status',
        'mangas.views as mangas_views','mangas.website','mangas.updated_at as mangas_updated_at')
        ->groupBy('manga_episodes.episodeId')
        ->orderBy('manga_episodes.episodeId', 'DESC')
        ->paginate(100);

        
        $commentData = DB::table('comment_mangas')
        ->leftJoin('users', 'comment_mangas.id_user', '=', 'users.id')
        ->leftJoin('image_profiles', 'users.id', '=', 'image_profiles.id_user_image')
        ->select('comment_mangas.*', 'users.username','image_profiles.image_user')
        ->where('id_comment', $id)
            ->orderBy('id', 'DESC')
            ->paginate(10);

          
        
        return view('mangaCover.manga_cover',['dataViews'=> $dataViews,'commentData'=>$commentData]);
    }

    public function showMangaChapter(string $id,$episodeId)
    {

        $dataViews = DB::table('mangas')
        ->rightJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
        ->where('manga_episodes.mangesId',  $id)
        ->where('manga_episodes.episodeId', $episodeId)
        ->select('manga_episodes.*','mangas.manga_name','mangas.author')
        ->orderBy('manga_episodes.id_image', 'ASC')
        ->get();

        $maxEpisodeId = DB::table('mangas')
        ->rightJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
        ->where('manga_episodes.mangesId', $id)
        ->groupBy('manga_episodes.episodeId')
        ->orderBy('manga_episodes.episodeId', 'desc')
        ->first()
        ->episodeId;
    /* 
    echo $maxEpisodeId;
    
     dd($maxEpisodeId); */

       // ต่อเพิ่มเงื่อนไขคิวรีตามที่คุณต้องการ
       $dataRan =    DB::table('mangas')->leftJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
           ->select('mangas.*', 'manga_episodes.mangesId', DB::raw('MAX(manga_episodes.episodeId) as maxEpisodeId'))
           ->groupBy('mangas.id')
           ->inRandomOrder()
           ->paginate(10);

// คแมเม้น
           $commentData = DB::table('comment_mangas_episodes')
           ->leftJoin('users', 'comment_mangas_episodes.id_user', '=', 'users.id')
           ->leftJoin('image_profiles', 'users.id', '=', 'image_profiles.id_user_image')
           ->select('comment_mangas_episodes.*', 'users.username','image_profiles.image_user')
           ->where('id_comment_manges', $id)
           ->where('id_comment_episode', $episodeId)
               ->orderBy('id', 'DESC')
               ->paginate(10);
          
        return view('mangaCover.manga_chapter',['dataViews' =>$dataViews,'dataRan'=>$dataRan,'maxEpisodeId'=> $maxEpisodeId ,'commentData'=>$commentData ]);
    }


    
    public function episodesAll(string $id)  {

        $episodeIds = DB::table('mangas')
            ->rightJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
            ->where('manga_episodes.mangesId', $id)
            ->groupBy('manga_episodes.episodeId')
            ->orderBy('manga_episodes.episodeId', 'asc')
            ->pluck('manga_episodes.episodeId')
            ->toArray();


            return response()->json($episodeIds);

    

        
    }


    public function searchManges(Request $request) {
        $search = $request['search'];
        if ($search != null) {
                $data =  DB::table('mangas')->leftJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
                    ->select('mangas.*', 'manga_episodes.mangesId', DB::raw('MAX(manga_episodes.episodeId) as maxEpisodeId'))
                    ->where('mangas.manga_name', 'like', "$search%")
                    ->groupBy('mangas.id')
                    ->get();
            return view('search',['data'=>$data]);
        }else {
 
            return view('search');
        }
       
    }

    public function searchCategories(string $id) {
        $data =  DB::table('mangas')->leftJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
                ->select('mangas.*', 'manga_episodes.mangesId', DB::raw('MAX(manga_episodes.episodeId) as maxEpisodeId'))
                ->whereRaw('JSON_CONTAINS(mangas.categories_id, \'["' . $id . '"]\')')
                ->groupBy('mangas.id')
                ->get();

        return view('search',['data'=>$data]);
       
    }



    public function searchMangesId(string $id) {
        $data =  DB::table('mangas')->leftJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
                ->select('mangas.*', 'manga_episodes.mangesId', DB::raw('MAX(manga_episodes.episodeId) as maxEpisodeId'))
                ->whereRaw('JSON_CONTAINS(mangas.categories_id, \'["' . $id . '"]\')')
                ->groupBy('mangas.id')
                ->get();

        return view('search',['data'=>$data,'id_ep'=>$id]);
       
    }


    public function profile() {

        $affected = DB::table('image_profiles')
        ->where('id_user_image', Auth::user()->id)
        ->get();


        return view('profile',['affected'=>$affected]);
       
    }
   
}