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
        $fileCount = session()->get('fileCount');
        return view('admin.mange.create',compact('fileCount'));
    }


    private function isImageFile($file)
    {
        $allowedTypes = [
            IMAGETYPE_JPEG,
            IMAGETYPE_PNG,
            IMAGETYPE_GIF,
            18, // WebP
        ];

        $fileType = exif_imagetype($file);

        return in_array($fileType, $allowedTypes);
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        session()->put('fileCount', "0");

      // Retrieve the uploaded file
 /*     $image = $request->file('image');
      $originalFilename = $image->getClientOriginalName();
      $filename = time() . '_' . $originalFilename; */
    
   /*    /** 
     * !  ส่วนของการอัพปกภาพ
    */
      /*   Storage::disk('ftp')->putFileAs('/imageManga/mangaCover', $image, $filename);  //อัพ ผ่านเเล้ว
        $manga =   Manga::create([
            'cover_photo' => $filename,
            'manga_name' => $request['manga_name'],
            'manga_details' => $request['manga_details'],
            'author' => $request['author'],
            'status' => $request['status'],
            'views' => 0,
            'website' => $request['website'],
        ]); */
    /** 
     * !  ส่วนของการอัพตอนงังงะ
    */

    $zipFile = $request->file('zip_file');
    $foldedName = $zipFile->getClientOriginalName();
    
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
            
            $fileData = $zip->getFromIndex($i);
            $filename =  $fileInfo['extension'].time().$filename;
            // $relativePath = `imageManga/episodeMange/'.$filename; // เเบบ ไม่ สร้าง Folded  เอาเเค่ไฟล์ ถาพขึ้นไป
            $relativePath = Storage::disk('ftp')->putFileAs('imageManga/episodeMange/' . $newFoldedName[0], $zipFile, $filename);
            Storage::disk('ftp')->put($relativePath, $fileData);
           
          
    
              Manga_episode::create([
                'episodeId' => $fileInfo['extension'],
                'episode_name' => NULL,
                'episode_name_image' => $newFoldedName[0].'/'.$filename,
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