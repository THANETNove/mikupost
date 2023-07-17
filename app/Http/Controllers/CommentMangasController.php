<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentMangas;
use App\Models\CommentMangasEpisode;
use Auth;

class CommentMangasController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CommentMangas::create([
            'id_comment' => $request['id_comment'],
            'id_user' => Auth::user()->id,
            'comment' => $request['comment'],
        ]);
        
     return   redirect()->back();
    }

    
    public function storeEpisode(Request $request)
    {
        CommentMangasEpisode::create([
            'id_comment_manges' => $request['id_comment_manges'],
            'id_comment_episode' => $request['id_comment_episode'],
            'id_user' => Auth::user()->id,
            'comment' => $request['comment'],
        ]);
        
     return   redirect()->back();
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