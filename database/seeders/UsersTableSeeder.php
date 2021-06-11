<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bas',
            'email' => 'bas.vandekamer@cobrasystems.nl',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Ryan',
            'email' => 'ryan.debruijne@cobrasystems.nl',
            'password' => Hash::make('password')
        ]);
    }
}
