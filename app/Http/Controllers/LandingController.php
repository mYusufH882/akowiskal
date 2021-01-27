<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $wisata = DB::table('ow_lampiran')
                            ->select(DB::raw('ow_lampiran.id AS owid'), 'ow_lampiran.*', 'objek_wisata.*','lampiran.*')
                            ->join('objek_wisata','objek_wisata.id','=','ow_lampiran.id_ow')
                            ->join('lampiran', 'lampiran.id', '=', 'ow_lampiran.id_lampiran')
                            ->get();

        return view('landing', compact('kategori', 'wisata'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
