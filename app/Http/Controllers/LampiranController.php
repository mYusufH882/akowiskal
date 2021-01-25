<?php

namespace App\Http\Controllers;

use App\ChildMenu;
use App\Lampiran;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LampiranController extends Controller
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
        $join = DB::table('ow_lampiran')
                        ->select(DB::raw('objek_wisata.id AS idow'), 'objek_wisata.nama', 'lampiran.*')
                        ->join('objek_wisata', 'ow_lampiran.id_ow', '=', 'objek_wisata.id')
                        ->join('lampiran', 'ow_lampiran.id_lampiran', '=', 'lampiran.id')
                        ->get();
        $lampiran = Lampiran::all();

        return view('admin.lampiran.index', compact('menu', 'child', 'join', 'lampiran'));
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
        //
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
