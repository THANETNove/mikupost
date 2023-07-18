<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use DB;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Manga::orderBy('id', 'DESC')->get();
   
          
        return response()->view('sitemap_xml',['posts' => $posts])->header('Content-Type','text/xml'); 
      
    }

    
}