<?php

namespace App\Http\Controllers;

use App\ChildMenu;
use App\InfoLamp;
use App\InfoObjek;
use App\Menu;
use App\ObjekWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoObjekController extends Controller
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
        $info = DB::table('info_objek')
                        ->select(DB::raw('info_objek.id AS idof'), 'info_objek.*', 'objek_wisata.*')
                        ->join('objek_wisata', 'info_objek.id_ow', '=', 'objek_wisata.id')
                        ->get();
        $wisata = ObjekWisata::all();

        return view('admin.info_objek.index', compact('menu', 'child', 'info', 'wisata'));
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
        $simpan = InfoObjek::create($request->all());
        $ow_info = InfoLamp::create([
            'id_ow' => $request->id_ow,
            'id_info' => $simpan->id
        ]);

        if($simpan && $ow_info) {
            return redirect('info_objek')->with(['success' => 'Data Berhasil Ditambahkan']);
        } else {
            return redirect('info_objek')->with(['error' => 'Data Gagal Ditambahkan']);
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
        $menu = Menu::all();
        $child = ChildMenu::all();
        $wisata = ObjekWisata::all();

        return view('admin.info_objek.create', compact('menu', 'child', 'wisata'));
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
        $data = InfoObjek::find($id);
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
        $delete = InfoObjek::destroy($id);

        if($delete) {
            return back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return back()->with(['error' => 'Data Gagal Dihapus']);
        }
    }
}
