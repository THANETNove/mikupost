<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MangaCoverController extends Controller
{
 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('mangaCover.manga_cover');
    }

    public function showMangaChapter(string $id)
    {
        return view('mangaCover.manga_chapter');
    }

   
}