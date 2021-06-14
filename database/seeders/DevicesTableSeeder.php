<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\DeviceMeta;
use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->add_devices();
        $this->add_meta_to_devices();
    }

    public function add_devices()
    {
        $this->device['device_1'] = Device::create([
            'name' => 'device 1',
            'type' => 'access point',
        ]);

        $this->device['device_2'] = Device::create([
            'name' => 'device 2',
            'type' => 'sensor',
        ]);
    }

    public function add_meta_to_devices()
    {
        $this->deviceMeta['device_1'] = deviceMeta::create([
            'device_id' => $this->device['device_1']->id,
            'mac_address' => 'a1b2c3d4e5'

        ]);
        $this->deviceMeta['device_2'] = deviceMeta::create([
            'device_id' => $this->device['device_2']->id,
            'mac_address' => 'a6b7c8d9e1'
        ]);
    }
}
