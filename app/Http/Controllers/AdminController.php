<?php

namespace App\Http\Controllers;

use App\ChildMenu;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $menu = Menu::all();
        $child = ChildMenu::all();

        $wisata = DB::table('objek_wisata')->select('id')->distinct()->count();
        $kategori = DB::table('kategori')->select('id')->distinct()->count();
        $lampiran = DB::table('lampiran')->select('id')->distinct()->count();
        $info = DB::table('info_objek')->select('id')->distinct()->count();

        return view('admin.dashboard', compact('menu', 'child', 'wisata', 'kategori', 'lampiran', 'info'));
    }
}
