<?php

namespace App\Services;

use App\Models\Device;
use App\Models\DeviceMeta;

class DeviceService
{

    public function handleDeviceIndex()
    {

        try {
            $devices = Device::get();
            return response()->json($devices, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function handleDeviceShow($id)
    {
        try {
            $device = Device::where('id', $id)->get();
            return response()->json($device, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function handleDeviceDelete($id)
    {
        try {
            Device::find($id)->delete();
            DeviceMeta::where('device_id', $id)->delete();
            return response()->json('Device successfully deleted', 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function handleDeviceCreate($request)
    {

        try {
            $fields = $request->validate([
                'name' => 'required',
                'type' => 'required',
            ]);

            $device = Device::create($fields);

            $meta = DeviceMeta::create([
                'device_id' => $device->id,
                'mac_address' => $request->mac_address ? $request->mac_address : NULL,
                'co2_offset' => $request->co2_offset ? $request->co2_offset : NULL,
                'humidity_offset' => $request->humidity_offset ? $request->humidity_offset : NULL,
                'temperature_offset' => $request->temperature_offset ? $request->temperature_offset : NULL,
            ]);

            if ($device && $meta) {
                return response('Device created successfully', 200);
            }

            return response('Error creating device, please try again', 500);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function handleDeviceUpdate($request, $id)
    {
        try {

            $device = Device::where('id', $id)->update([
                'name' => $request->name ? $request->name : 'name',
                'type' => $request->type ? $request->type : 'type',
            ]);

            $meta = DeviceMeta::where('device_id', $id)->update([
                'mac_address' => $request->mac_address ? $request->mac_address : NULL,
                'co2_offset' => $request->co2_offset ? $request->co2_offset : NULL,
                'humidity_offset' => $request->humidity_offset ? $request->humidity_offset : NULL,
                'temperature_offset' => $request->temperature_offset ? $request->temperature_offset : NULL,
            ]);

            if ($device && $meta) {
                return response('Device updated successfully', 200);
            }

            return response('Error updating device, please try again', 500);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
