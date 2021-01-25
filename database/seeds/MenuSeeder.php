<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ['nama_menu' => 'Dashboard', 'ikon' => 'fas fa-tachometer-alt', 'url' => 'home', 'jenis' => 'parent'],
            ['nama_menu' => 'Pengaturan', 'ikon' => 'fas fa-cog', 'url' => 'pengaturan', 'jenis' => 'parent'],
            ['nama_menu' => 'Master Data', 'ikon' => 'fas fa-copy', 'url' => '#', 'jenis' => 'child'],
        ];

        foreach ($list as $key => $value) {
            Menu::create($value);
        }
    }
}
