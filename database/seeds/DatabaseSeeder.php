<?php

use App\ChildMenu;
use App\Menu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            ChildMenuSeeder::class,
            MenuSeeder::class,
            RoleSeeder::class
        ]);
    }
}
