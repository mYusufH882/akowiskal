<?php

namespace App\Http\Controllers;

use App\ChildMenu;
use App\Menu;
use App\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        $child = ChildMenu::all();

        return view('admin.pengaturan', compact('menu', 'child'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = Auth::user()->id;

        $update = User::find($id);

        $gambar = $request->file('picture');
        $password = $request->password != null ? $request->password : '';

        if(!empty($gambar)) {
            $nmgambar = $request->file('picture')->getClientOriginalName();
            $path = public_path() . '/asset/images/profil/';

            $data = $update->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => $password,
                'picture'   => $nmgambar
            ]);

            if(Auth::user()->picture !== 'default.png') {
                File::delete('asset/profile/'. $nmgambar);
            }
            $gambar->move($path , $nmgambar);

        } else {
            $data = $update->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($password),
                'picture'   => Auth::user()->picture
            ]);
        }

        if($data) {
            return back()->with(['success' => 'Data Berhasil Diubah']);
        } else {
            return back()->with(['error' => 'Data Gagal Diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
