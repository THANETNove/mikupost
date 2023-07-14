<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use DB;
use App\Models\Manga;
use App\Models\Manga_episode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Ftp as Adapter;



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
        ->leftJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
        ->select('mangas.*', 'manga_episodes.mangesId', DB::raw('MAX(manga_episodes.episodeId) as maxEpisodeId'))
        ->groupBy('mangas.id')
        ->orderBy('mangas.id', 'DESC')
        ->paginate(100);

        
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
        $fileCount = session()->get('fileCount');
        return view('admin.mange.create',compact('fileCount'));
    }

    
  


    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        $validated = $request->validate([
            'image' => ['required', 'image', 'image:jpg,png,jpeg,webp'],
            'zip_file' => ['required', 'mimes:zip'],
        ]);

      // Retrieve the uploaded file
    
    
    /** 
     * !  ส่วนของการอัพปกภาพ
    */
        $image = $request->file('image');
        $originalFilename = $image->getClientOriginalName();
        $filename = time() . '_' . $originalFilename;
        
        Storage::disk('ftp')->putFileAs('/imageManga/mangaCover', $image, $filename);  //อัพ ผ่านเเล้ว
        $manga =   Manga::create([
            'cover_photo' => $filename,
            'manga_name' => $request['manga_name'],
            'manga_details' => $request['manga_details'],
            'author' => $request['author'],
            'status' => $request['status'],
            'views' => 0,
            'website' => $request['website'],
        ]);
    /** 
     * !  ส่วนของการอัพตอนงังงะ
    */

    $zipFile = $request->file('zip_file');
    $foldedName = $zipFile->getClientOriginalName();
    
    // ตั้งชื่อ  foldedใหม่ หาก มีช่องว่าง
    if (strpos($foldedName, ' ') !== false) {
        // ลบช่องว่างออกจาก $foldedName
        $foldedName = str_replace(' ', '', $foldedName);
    }
    $newFoldedName = explode('.', $foldedName);

    $zip = new ZipArchive;
    $zip->open($zipFile->getPathname());



    for ($i = 0; $i < $zip->numFiles; $i++) {
        $entry = $zip->statIndex($i);
        $filename = basename($entry['name']);

        if (substr($entry['name'], -1) === '/') {
            continue; // Skip directories
        }

        // Skip hidden files starting with "._"
        if (preg_match('/^._/', $filename)) {
            continue;
        }

        if (preg_match('/\.(jpg|jpeg|png|gif|webp)$/', $filename)) {
            
            $fileParts = explode('_', $filename);
            $filenameWithoutExtension = $fileParts[0];
            $fileExtension = $fileParts[1];
            $fileInfo = [
                'filename' => $filenameWithoutExtension,
                'extension' => $fileExtension
            ];
            // เรียงภาพ
            $filenameExtension = $fileParts[2];
            $filenameParts = explode('.', $filenameExtension);
            $file_id_image = $filenameParts[0];
/*     dd( $fileParts, $file_id_image); */
            $fileData = $zip->getFromIndex($i);
            $filename =  $fileInfo['extension'].time().$filename;
            // $relativePath = `imageManga/episodeMange/'.$filename; // เเบบ ไม่ สร้าง Folded  เอาเเค่ไฟล์ ถาพขึ้นไป
            $relativePath = Storage::disk('ftp')->putFileAs('imageManga/episode_mange/' . $newFoldedName[0], $zipFile, $filename);
            Storage::disk('ftp')->put($relativePath, $fileData);
           
          
    
              Manga_episode::create([
                'mangesId' =>  $manga->id,
                'episodeId' => $fileInfo['extension'],
                'id_image' => $file_id_image,
                'episode_name' => NULL,
                'view' => 0,
                'episode_name_image' => $newFoldedName[0].'/'.$filename,
                'foldedManges' => $newFoldedName[0],
            ]);
        }
    }

    $zip->close();

    return redirect('admin-home')->with('message', "เพิ่มสำเร็จ");


    
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $dataViews = DB::table('mangas')
        ->rightJoin('manga_episodes', 'mangas.id', '=', 'manga_episodes.mangesId')
        ->where('manga_episodes.mangesId', $id)
        ->select('manga_episodes.*', 'mangas.cover_photo','mangas.manga_name','mangas.manga_details','mangas.author','mangas.status',
        'mangas.views as mangas_views','mangas.website','mangas.updated_at as mangas_updated_at')
        ->groupBy('manga_episodes.episodeId')
        ->orderBy('manga_episodes.id', 'DESC')
        ->paginate(100);
    
    


        return view('admin.mange.view',['dataViews' => $dataViews ]);
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = DB::table('mangas')
        ->where('id', $id)
        ->get();
        return view('admin.mange.edit',['data' => $data]);
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = $request->file('image');
        $originalFilename = $image->getClientOriginalName();
        $filename = time().$originalFilename;
        $affected = DB::table('mangas')
        ->where('id', $id)
        ->get();
        if ($request['image']) {
            Storage::disk('ftp')->delete('imageManga/mangaCover/'.$affected[0]->cover_photo); // ลบภาพ
            Storage::disk('ftp')->putFileAs('/imageManga/mangaCover', $image, $filename);  //อัพ ภาพ
            DB::table('mangas')->where('id',$id)
            ->update([
              'cover_photo' => $filename
            ]);
        }

        DB::table('mangas')->where('id',$id)
              ->update([
                'manga_name' => $request['manga_name'],
                'manga_details' => $request['manga_details'],
                'author' => $request['author'],
                'status' => $request['status'],
                'website' => $request['website']
              ]);
        return redirect('admin-home')->with('message', "เเก้ไข สำเร็จ");
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $affected = DB::table('manga_episodes')
        ->where('mangesId', $id)
        ->get();

        $mangas = DB::table('mangas')
        ->where('id', $id)
        ->get();

      
        Storage::disk('ftp')->deleteDirectory('imageManga/episode_mange/'.$affected[0]->foldedManges); // ลบโพเดอร์
        Storage::disk('ftp')->delete('imageManga/mangaCover/'.$mangas[0]->cover_photo); // ลบภาพ
       // loop ลบ
        foreach( $affected as  $episode) {
            $member = Manga_episode::find($episode->id);
            $member->delete();
        }

        $deleteManga = Manga::find($id);
        $deleteManga->delete();
       
        return redirect('admin-home')->with('messageDelete', "ลบ สำเร็จ");
    
    }
}