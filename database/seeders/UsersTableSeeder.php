<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserMeta;
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
        $this->add_users();
        $this->add_meta_to_users();
        $this->assing_roles_to_users();
    }

    public function add_users()
    {
        $this->user['bas'] = User::create([
            'name' => 'Bas',
            'email' => 'bas.vandekamer@cobrasystems.nl',
            'password' => Hash::make('password')
        ]);
        $this->user['ryan'] = User::create([
            'name' => 'Ryan',
            'email' => 'ryan.debruijne@cobrasystems.nl',
            'password' => Hash::make('password')
        ]);
    }

    public function add_meta_to_users()
    {
        $this->userMeta['bas'] = UserMeta::create([
            'user_id' => $this->user['bas']->id,
            'telegram_id' => '123456789',
            'allowed_locations' => [1, 2, 3]
        ]);
        $this->userMeta['ryan'] = UserMeta::create([
            'user_id' => $this->user['ryan']->id,
            'telegram_id' => '123456789',
            'allowed_locations' => [1, 2]
        ]);
    }

    public function assing_roles_to_users()
    {
        $this->user['bas']->assignRole('Administrator');
        $this->user['ryan']->assignRole('Employee');
    }
}
