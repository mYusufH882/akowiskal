<?php

namespace App\Http\Controllers;

use App\ChildMenu;
use App\Kategori;
use App\Lampiran;
use App\Menu;
use App\ObjekWisata;
use App\owKategori;
use App\owLampiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjekWisataController extends Controller
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
        $wisata = ObjekWisata::all();

        return view('admin.objek_wisata.index', compact('menu', 'child', 'wisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::all();
        $child = ChildMenu::all();
        $kategori = Kategori::all();
        $wisata = ObjekWisata::all();

        return view('admin.objek_wisata.create', compact('menu', 'child', 'kategori', 'wisata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owisata = ObjekWisata::create([
            'nama'          => $request->nama,
            'nama_lain'     => $request->nama_lain,
            'deskripsi'     => $request->deskripsi,
            'cara_tempuh'   => $request->cara_tempuh,
            'fasilitas'     => $request->fasilitas
        ]);

        $gambar = $request->file('lamp_gambar');
        $nmgambar = $request->file('lamp_gambar')->getClientOriginalName();
        $path = public_path() . '/asset/images/lampiran/';

        $lampiran = Lampiran::create([
            'lamp_judul'        => $request->lamp_judul,
            'lamp_deskripsi'    => $request->lamp_deskripsi,
            'lamp_alamat'       => $request->lamp_alamat,
            'lamp_gambar'       => $nmgambar,
            'lamp_referensi'    => $request->lamp_referensi
        ]);

        $gambar->move($path , $nmgambar);

        $owKategori = owKategori::create([
            'id_ow'         => $owisata->id,
            'id_kategori'   => $request->id_kategori
        ]);

        $owLampiran = owLampiran::create([
            'id_ow'         => $owisata->id,
            'id_lampiran'   => $lampiran->id
        ]);

        if($owisata && $lampiran && $owKategori && $owLampiran) {
            return back()->with(['success' => 'Data Berhasil Ditambahkan']);
        } else {
            return back()->with(['error' => 'Data Gagal Ditambahkan']);
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
        $menu = Menu::all();
        $child = ChildMenu::all();
        $join1 = DB::table('lamp_info_objek')
                        ->join('objek_wisata', 'lamp_info_objek.id_ow', '=', 'objek_wisata.id')
                        ->join('info_objek', 'lamp_info_objek.id_info', '=', 'info_objek.id')
                        ->where('lamp_info_objek.id_ow', '=', $id)
                        ->get();

        $join2 = DB::table('ow_lampiran')
                        ->join('objek_wisata', 'ow_lampiran.id_ow', '=', 'objek_wisata.id')
                        ->join('lampiran', 'ow_lampiran.id_lampiran', '=', 'lampiran.id')
                        ->where('ow_lampiran.id_ow', '=', $id)
                        ->get();

        $join3 = DB::table('ow_kategori')
                        ->join('objek_wisata', 'ow_kategori.id_ow', '=', 'objek_wisata.id')
                        ->join('kategori', 'ow_kategori.id_kategori', '=', 'kategori.id')
                        ->where('ow_kategori.id_ow','=', $id)
                        ->get();

        return view('admin.objek_wisata.detail', compact('menu', 'child', 'join1', 'join2', 'join3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owisata = ObjekWisata::find($id);
        $menu = Menu::all();
        $child = ChildMenu::all();
        $kategori = Kategori::all();
        $owlamp = DB::table('ow_lampiran')
                ->select(['objek_wisata.*', 'lampiran.*'])
                ->join('objek_wisata', 'ow_lampiran.id_ow', '=', 'objek_wisata.id')
                ->join('lampiran', 'ow_lampiran.id_lampiran', '=', 'lampiran.id')
                ->where('objek_wisata.id', '=', 1)
                ->get();
                // dd($owlamp);
        $pilihanKategori = owKategori::find($id);
        $wisata = ObjekWisata::all();

        return view('admin.objek_wisata.edit', compact('menu', 'child', 'kategori', 'owlamp', 'pilihanKategori'));
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
        $gambar = $request->file('lamp_gambar');

        $data = ObjekWisata::find($id);

        $dataowlamp = owLampiran::where('id_ow', $id)->get();

        foreach ($dataowlamp as $key) {
            $klamp = Lampiran::find($key->id_lampiran);
        }

        $datalamp = Lampiran::find($klamp->id);

        $owisata = $data->update([
            'nama'          => $request->nama,
            'nama_lain'     => $request->nama_lain,
            'deskripsi'     => $request->deskripsi,
            'cara_tempuh'   => $request->cara_tempuh,
            'fasilitas'     => $request->fasilitas
        ]);

        if($gambar == null) {
            $lampiran = $datalamp->update([
                'lamp_judul'        => $request->lamp_judul,
                'lamp_deskripsi'    => $request->lamp_deskripsi,
                'lamp_alamat'       => $request->lamp_alamat,
                'lamp_gambar'       => $klamp->lamp_gambar,
                'lamp_referensi'    => $request->lamp_referensi
            ]);
        } else {
            $nmgambar = $request->file('lamp_gambar')->getClientOriginalName();
            $path = public_path() . '/asset/images/lampiran/';

            $lampiran = $datalamp->update([
                'lamp_judul'        => $request->lamp_judul,
                'lamp_deskripsi'    => $request->lamp_deskripsi,
                'lamp_alamat'       => $request->lamp_alamat,
                'lamp_gambar'       => $nmgambar,
                'lamp_referensi'    => $request->lamp_referensi
            ]);

            $gambar->move($path , $nmgambar);
        }


        $dataowkat = owKategori::where('id_ow', $id)->get();
        foreach($dataowkat as $i) {
            $kate = OwKategori::find($i->id);
        }

        $owKategori = $kate->update([
            'id_ow'         => $id,
            'id_kategori'   => $request->id_kategori
        ]);

        $owLampiran = $klamp->update([
            'id_ow'         => $id,
            'id_lampiran'   => $klamp->id
        ]);

        if($owisata && $lampiran && $owKategori && $owLampiran) {
            return redirect('objek_wisata')->with(['success' => 'Data Berhasil Diubah']);
        } else {
            return redirect('objek_wisata')->with(['error' => 'Data Gagal Diubah']);
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
        $delete = ObjekWisata::destroy($id);

        if($delete) {
            return back()->with(['success' => 'Data Berhasil Ditambahkan']);
        } else {
            return back()->with(['error' => 'Data Gagal Ditambahkan']);
        }
    }
}
