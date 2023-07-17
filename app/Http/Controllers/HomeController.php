<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageProfile;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
//ImageProfile

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $affected = DB::table('image_profiles')
        ->where('id_user_image', Auth::user()->id)
        ->get();
      
        if(Auth::user()->status == 1) {
            return redirect('admin-home');
        }else {
            return view('home',['affected'=> $affected]);
        }
  
       
    }

    public function store(Request $request){
        $validated = $request->validate([
            'image' => ['required', 'image', 'image:jpg,png,jpeg,webp'],
        ]);

        $image = $request->file('image');
        $originalFilename = $image->getClientOriginalName();
        $filename = time() . '_' . $originalFilename;

        $affected = DB::table('image_profiles')
        ->where('id_user_image', Auth::user()->id)
        ->get();
    
        if (count($affected) > 0) {
            if (Storage::disk('ftp')->exists('imageManga/profile/'.$affected[0]->image_user)) {  // เช็คว่ามีภาพใหม
                Storage::disk('ftp')->delete('imageManga/profile/'.$affected[0]->image_user); // ลบภาพ
            }
            Storage::disk('ftp')->putFileAs('/imageManga/profile', $image, $filename);
            DB::table('image_profiles')->where('id_user_image',Auth::user()->id)
            ->update([
                'image_user' => $filename,
            ]);
        }else {
 
            Storage::disk('ftp')->putFileAs('/imageManga/profile', $image, $filename);  //อัพ ผ่านเเล้ว
            ImageProfile::create([
                'id_user_image' => Auth::user()->id,
                'image_user' => $filename,

            ]);
            
        }
        return redirect('home')->with('message', "เพิ่มสำเร็จ");

    }

    
}