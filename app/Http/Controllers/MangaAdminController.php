<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Models\Manga;
use App\Models\Manga_episode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;



class MangaAdminController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('mangas')
        ->orderBy('id','DESC')
        ->paginate(50);



        if(Auth::user()->status == 0) {
            return redirect('home');
        }else {

  
    
    
            return view('admin.mange.homeAdmin',['data' => $data]);
        }
       
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mange.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
dd($request->zip_file);
       
        $image = $request->file('image');
        $originalFilename = $image->getClientOriginalName();
        $filename = time() . '_' . $originalFilename;
   
        $response = Http::attach(
            'image',
            file_get_contents($image),
            $filename
        )->post(env('FTP_URL').'uploadedImageMangaCover.php');
        
        if ($response->successful()) {
            $responseData = $response->json();


            
            $manga =   Manga::create([
                'cover_photo' => $filename,
                'manga_name' => $request['manga_name'],
                'manga_details' => $request['manga_details'],
                'author' => $request['author'],
                'status' => $request['status'],
                'views' => 0,
                'website' => $request['website'],
            ]);
            //$mangaId = $manga->id;
           
        } else {
            $statusCode = $response->status();
            $errorResponse = [
                'error' => 'An error occurred during the request.',
                'status' => $statusCode,
            ];
        }
        return redirect('admin-home')->with('message', "เพิ่ม $request->manga_name สำเร็จ");
   /*      Manga_episode::create([
            'episodeId' => $manga->id,
            'episode_name' => NULL,
            'episode_name_image' => $filename,
          
        ]); */
      //  Manga_episode    

        
      /*   return redirect('admin-home')->with('errorResponse', $response->getBody());
        return redirect('admin-home')->with('message', "เพิ่ม $request->manga_name สำเร็จ"); */
 
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}