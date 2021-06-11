<?php

namespace Database\Seeders;

use App\Models\Locations;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Locations::create([
            'name' => 'Location 1',
        ]);

        Locations::create([
            'name' => 'Location 2',
        ]);

        Locations::create([
            'name' => 'Location 3',
        ]);
    }
}
