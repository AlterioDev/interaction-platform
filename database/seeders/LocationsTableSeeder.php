<?php

namespace Database\Seeders;

use App\Models\Location;
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
        Location::create([
            'name' => 'Location 1',
        ]);

        Location::create([
            'name' => 'Location 2',
        ]);

        Location::create([
            'name' => 'Location 3',
        ]);
    }
}
