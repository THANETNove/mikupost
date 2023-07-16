<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('categories')
        ->orderBy('id','DESC')
        ->paginate(50);
        return view('admin.category.index' ,['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'categories_name' =>  $request['category'], //mangesId
        ]);

        return redirect('category')->with('message', "เพิ่มสำเร็จ");
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
        $data = DB::table('categories')
        ->where('id',$id)
        ->get();
        return view('admin.category.edit' ,['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        DB::table('categories')->where('id',$id)
        ->update([
          'categories_name' => $request['category']
        ]);


        return redirect('category')->with('message', "เเก้ไข สำเร็จ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Category::find($id);
        $member->delete();

        return redirect('category')->with('messageDelete', "ลบ สำเร็จ");
    }
}