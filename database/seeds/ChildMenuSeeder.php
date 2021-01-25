<?php

use App\ChildMenu;
use Illuminate\Database\Seeder;

class ChildMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ['nama_menu' => 'Objek Wisata', 'url' => 'objek_wisata'],
            ['nama_menu' => 'Kategori', 'url' => 'kategori'],
            ['nama_menu' => 'Lampiran', 'url' => 'lampiran'],
            ['nama_menu' => 'Info Objek', 'url' => 'info_objek'],
        ];

        foreach ($list as $key => $value) {
            ChildMenu::create($value);
        }
    }
}
