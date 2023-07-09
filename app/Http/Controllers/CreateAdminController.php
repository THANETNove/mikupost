<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;


class CreateAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('users')
        ->where('status',1)
        ->whereNotNull('pass_admin')
        ->orderBy('id','DESC')
        ->paginate(50);


        return view('admin.auth.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'status' => $request['status'],
            'pass_admin' => $request['password'],
            'password' => Hash::make($request['password']),
        ]);
         return redirect('admin')->with('message', "สร้าง Admin สำเร็จ" );

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
        $flight = User::find($id);

        $flight->delete();
        return redirect('admin')->with('message', "ลบสำเร็จ" );
    }
}