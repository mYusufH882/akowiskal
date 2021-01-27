<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        $wisata = DB::table('ow_lampiran')
        ->select(DB::raw('ow_lampiran.id AS owid'), 'ow_lampiran.*', 'objek_wisata.*','lampiran.*')
        ->join('objek_wisata','objek_wisata.id','=','ow_lampiran.id_ow')
        ->join('lampiran', 'lampiran.id', '=', 'ow_lampiran.id_lampiran')
        ->get();

        $kategori = Kategori::all();

        return view('categories', compact('wisata', 'kategori'));
    }

    public function show($id)
    {
        $wisata = DB::table('ow_lampiran')
                        ->select(DB::raw('ow_lampiran.id AS owid'), 'ow_lampiran.*', 'objek_wisata.*','lampiran.*')
                        ->join('objek_wisata','objek_wisata.id','=','ow_lampiran.id_ow')
                        ->join('lampiran', 'lampiran.id', '=', 'ow_lampiran.id_lampiran')
                        ->where(['ow_lampiran.id' => $id])
                        ->get();

                        $kategori = Kategori::all();

        $owkategori = DB::table('ow_kategori')
                        ->join('objek_wisata', 'ow_kategori.id_ow', '=', 'objek_wisata.id')
                        ->join('kategori', 'ow_kategori.id_kategori', '=', 'kategori.id')
                        ->where('ow_kategori.id_ow','=', $id)
                        ->get();

        return view('detail_wisata', compact('wisata','owkategori'));
    }
}
