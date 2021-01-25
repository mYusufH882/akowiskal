<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => 'Junggon',
            'email' => 'wiskol@admin.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
            'picture' => 'default.png'
        ]);
    }
}
