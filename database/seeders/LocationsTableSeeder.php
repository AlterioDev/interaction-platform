<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\LocationMeta;
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

        $this->add_locations();
        $this->add_meta_to_locations();
    }

    public function add_locations()
    {
        $this->location['location_1'] = Location::create([
            'name' => 'Location 1',
            'address' => 'address 1',
            'postal_code' => '1234AB',
            'city' => 'Miami',
            'state' => 'Florida',
            'country' => 'USA',
            'latitude' => 54.377956,
            'longitude' => 4.897070,
            'timezone' => 'America/New_York',
        ]);

        $this->location['location_2'] = Location::create([
            'name' => 'Location 2',
            'address' => 'address 2',
            'postal_code' => '1234AB',
            'city' => 'Miami',
            'state' => 'Florida',
            'country' => 'USA',
            'latitude' => 52.377956,
            'longitude' => 4.897070,
            'timezone' => 'America/New_York',
        ]);

        $this->location['location_3'] = Location::create([
            'name' => 'Location 3',
            'address' => 'address 3',
            'postal_code' => '1234AB',
            'city' => 'Miami',
            'state' => 'Florida',
            'country' => 'USA',
            'latitude' => 56.377956,
            'longitude' => 4.897070,
            'timezone' => 'America/New_York',
        ]);
    }

    public function add_meta_to_locations()
    {
        $this->locationMeta['location_1'] = LocationMeta::create([
            'location_id' => $this->location['location_1']->id,
        ]);
        $this->locationMeta['location_2'] = LocationMeta::create([
            'location_id' => $this->location['location_3']->id,
        ]);
        $this->locationMeta['location_3'] = LocationMeta::create([
            'location_id' => $this->location['location_3']->id,
        ]);
    }
}
