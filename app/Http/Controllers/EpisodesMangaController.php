<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Manga_episode;

class EpisodesMangaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $data = DB::table('manga_episodes')
        ->where('id', $id)
        ->get();
        return view('admin.episodes.create',['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'zip_file' => ['required', 'mimes:zip'],
        ]);
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
        
                $fileManges = $fileParts[1];

                // เพิ่ม เรียง ภาพ
                $filenameExtension = $fileParts[2];
                $filenameParts = explode('.', $filenameExtension);
                $fileEpisode = $filenameParts[0];

                
                $fileData = $zip->getFromIndex($i);
                $filename =  $fileManges.time().$filename;
                 $relativePath = 'imageManga/episode_mange/'.$request['foldedManges'].'/'.$filename; // เเบบ ไม่ สร้าง Folded  เอาเเค่ไฟล์ ถาพขึ้นไป
               // $relativePath = Storage::disk('ftp')->putFileAs('imageManga/episode_mange/' .$request['foldedManges'], $zipFile, $filename);
                Storage::disk('ftp')->put($relativePath, $fileData);
               
              
        
                  Manga_episode::create([
                    'mangesId' =>  $request['mangesId'], //mangesId
                    'episodeId' =>  $fileManges,
                    'id_image' => $fileEpisode,
                    'episode_name' => $request['episode_name'],
                    'view' => 0,
                    'episode_name_image' => $request['foldedManges'].'/'.$filename,
                    'foldedManges' => $request['foldedManges'],
                ]);
            }
        }
    
        $zip->close();
    
        return redirect('view-mange/'.$request['mangesId'])->with('message', "เพิ่มสำเร็จ");
    
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
    public function edit(string $mangesId, $episodeId)
    {
   
        $data = DB::table('manga_episodes')
        ->where('mangesId', $mangesId)
        ->where('episodeId', $episodeId)
        ->get();

        return view('admin.episodes.edit',['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string  $mangesId, $episodeId)
    {
        $validated = $request->validate([
            'zip_file' => ['required', 'mimes:zip'],
        ]);

        $affected = DB::table('manga_episodes')
        ->where('mangesId', $mangesId)
        ->where('episodeId',  $episodeId)
        ->get();


       // loop ลบ
        foreach( $affected as  $episode) {
            $fileParts = explode('/', $episode->episode_name_image);
              Storage::disk('ftp')->delete('imageManga/episode_mange/'.$fileParts[0].'/'.$fileParts[1]);
             
            $member = Manga_episode::find($episode->id);
            $member->delete();
        }

   
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
        
                $fileManges = $fileParts[1];

                // เพิ่ม เรียง ภาพ
                $filenameExtension = $fileParts[2];
                $filenameParts = explode('.', $filenameExtension);
                $fileEpisode = $filenameParts[0];

                
                $fileData = $zip->getFromIndex($i);
                $filename =  $fileManges.time().$filename;
                 $relativePath = 'imageManga/episode_mange/'.$request['foldedManges'].'/'.$filename; // เเบบ ไม่ สร้าง Folded  เอาเเค่ไฟล์ ถาพขึ้นไป
               // $relativePath = Storage::disk('ftp')->putFileAs('imageManga/episode_mange/' .$request['foldedManges'], $zipFile, $filename);
                Storage::disk('ftp')->put($relativePath, $fileData);
               
                Manga_episode::create([
                    'mangesId' =>  $request['mangesId'], //mangesId
                    'episodeId' =>  $fileManges,
                    'id_image' => $fileEpisode,
                    'episode_name' => $request['episode_name'],
                    'view' => 0,
                    'episode_name_image' => $request['foldedManges'].'/'.$filename,
                    'foldedManges' => $request['foldedManges'],
                ]);
            
            }
        }
    
        $zip->close();

     
        return redirect('view-mange/'.$mangesId)->with('message', "เเก้ไข สำเร็จ");
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string  $mangesId, $episodeId)
    {

        $affected = DB::table('manga_episodes')
        ->where('mangesId', $mangesId)
        ->where('episodeId',  $episodeId)
        ->get();


       // loop ลบ
        foreach( $affected as  $episode) {
            $fileParts = explode('/', $episode->episode_name_image);
              Storage::disk('ftp')->delete('imageManga/episode_mange/'.$fileParts[0].'/'.$fileParts[1]);
             
            $member = Manga_episode::find($episode->id);
            $member->delete();
        }
        return redirect('view-mange/'.$mangesId)->with('messageDelete', "ลบ สำเร็จ");
    }
}