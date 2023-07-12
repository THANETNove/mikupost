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
/* use Illuminate\Support\Facades\File; */
use Illuminate\Http\File;
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
        return view('admin.mange.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
      // Retrieve the uploaded file
      $image = $request->file('image');
      $originalFilename = $image->getClientOriginalName();
      $filename = time() . '_' . $originalFilename;
    
     // Storage::disk('public')->putFileAs(path:'public/images', file:$image ,name: $filename);  // ถูกเเล้ว
     
     // อัพผ่าน ftp 
     Storage::disk('ftp')->putFileAs('/domains/th-projet.com/public_html', $image, $filename);  //อัพ ผ่านเเล้ว
      

       
  dd("asdas");


  
        
   // Get the uploaded file
         $zipFile = $request->file('zip_file');
        
   // Extract the zip file to a temporary location
/*         $zip = new ZipArchive;
        $tempLocation = storage_path('app/temp');
        $zip->open($zipFile->getPathname());
        $zip->extractTo($tempLocation);
        $zip->close();

        // Move the extracted files to public/img/product
        $extractedFiles = File::allFiles($tempLocation);

       
        foreach ($extractedFiles as $file) {
            $filenameEp = time().$file->getFilename();
            $fileParts = explode('_', $filenameEp);
            $filenameWithoutExtension = $fileParts[0];
            $fileExtension = $fileParts[1];

            $fileInfo = [
                'filename' => $filenameWithoutExtension,
                'extension' => $fileExtension
            ];

            Manga_episode::create([
                'episodeId' => $fileInfo['extension'],
                'episode_name' => NULL,
                'episode_name_image' => $filenameEp,
              
            ]);
    
            $response = Http::attach(
                'image',
                file_get_contents($file->getRealPath()),
                $filenameEp
            )->post('https://img.neko-post.net/uploadedImageEpisode.php');

        
        }

        // Clean up: delete the temporary files
        File::cleanDirectory($tempLocation);
        File::deleteDirectory($tempLocation); */
dd('asd');
  /* 
        $filename = 'ep_1100_1333.webp';
        $fileParts = explode('_', $filename);
        $filenameWithoutExtension = $fileParts[0];
        $fileExtension = $fileParts[1];

        $fileInfo = [
            'filename' => $filenameWithoutExtension,
            'extension' => $fileExtension
        ]; */
  
dd('asdas');
   /*     
    dd($zipFile->getClientOriginalName() );
      // ย้ายไฟล์ .zip ไปยังตำแหน่งที่ต้องการ
            $zipPath = public_path('/img/product' . $zipFile->getClientOriginalName());
            $zipFile->move(public_path() . '/img/product', $zipFile->getClientOriginalName());
            
            // แตกไฟล์ .zip
            $zip = new ZipArchive;
            $res = $zip->open($zipPath);
            
            if ($res == true) {
                $zip->extractTo($zipPath);
                $response = Http::attach(
                    'zip_file',
                    file_get_contents($zipPath),
                    $zipFile->getClientOriginalName()
                )->post(env('FTP_URL').'uploadedImageEpisode.php');
            
                $zip->close();
            }
        dd("555"); */
        // ลบไฟล์ .zip หลังจากแตกไฟล์เสร็จสิ้น
       
        
        // โค้ดอื่น ๆ ที่คุณต้องการทำหลังจากการอัพโหลดและแตกไฟล์

        dd('asdas');
       /* 
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
        return redirect('admin-home')->with('message', "เพิ่ม $request->manga_name สำเร็จ"); */
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