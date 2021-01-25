<?php

namespace App\Http\Controllers;

use App\ChildMenu;
use App\Kategori;
use App\Menu;
use Illuminate\Http\Request;

class KategoriController extends Controller
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
        $kategori = Kategori::all();

        return view('admin.kategori.index', compact('menu', 'child', 'kategori'));
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
        $simpan = Kategori::create($request->all());

        if($simpan) {
            return back()->with(['success' => 'Data Berhasil Dimasukkan']);
        } else {
            return back()->with(['error' => 'Data Gagal Dimasukkan']);
        }
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
        $data = Kategori::find($id);
        $update = $data->update($request->all());

        if($update) {
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
        $delete = Kategori::destroy($id);

        if($delete) {
            return back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return back()->with(['error' => 'Data Gagal Dihapus']);
        }
    }
}
