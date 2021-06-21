<?php

namespace App\Services;

use App\Models\Location;
use App\Models\LocationMeta;

class LocationService
{
    public function handleLocationIndex()
    {
        try {
            $user = auth()->user();
            if ($user->can('view location')) {
                $locations = $user->userMeta->allowed_locations;
                $query = Location::query();

                return $locations == '*' ? $query->get() : $query->whereIn('id', explode(',', $locations))->get();
            } else {
                return response('No permission to perform this request', 403);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function handleLocationShow($id)
    {
        try {
            $location = Location::where('id', $id)->get();

            return response()->json($location, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function handleLocationDelete($id)
    {
        try {
            Location::find($id)->delete();
            LocationMeta::where('device_id', $id)->delete();

            return response()->json('Location successfully deleted', 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function handleLocationCreate($request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                'city' => 'required',
                'country' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'timezone' => 'required',
            ]);

            $location = Location::create([
                'name' => $request->name ? $request->name : 'name',
                'address' => $request->address ? $request->address : 'address',
                'postal_code' => $request->postal_code ? $request->postal_code : 'postal_code',
                'city' => $request->city ? $request->city : 'city',
                'country' => $request->country ? $request->country : 'country',
                'state' => $request->state ? $request->state : 'state',
                'latitude' => $request->latitude ? $request->latitude : 54.37795600,
                'longitude' => $request->longitude ? $request->longitude : 54.37795600,
                'timezone' => $request->timezone ? $request->timezone : 'America/New_York',
            ]);

            $meta = LocationMeta::create([
                'device_id' => $location->id,
                'mist_org_id' => $request->mist_org_id ? $request->mist_org_id : null,
                'mist_site_id' => $request->mist_site_id ? $request->mist_site_id : null,
                'mist_map_id' => $request->mist_map_id ? $request->mist_map_id : null,
                'accuweather_location_key' => $request->accuweather_location_key ? $request->accuweather_location_key : null,
                'co2_notification_offset_low' => $request->co2_notification_offset_low ? $request->co2_notification_offset_low : null,
                'co2_notification_offset_high' => $request->co2_notification_offset_high ? $request->co2_notification_offset_high : null,
                'humidity_notification_offset' => $request->humidity_notification_offset ? $request->humidity_notification_offset : null,
                'capacity_notification_offset' => $request->capacity_notification_offset ? $request->capacity_notification_offset : null,
                'floorplan_image' => $request->floorplan_image ? $request->floorplan_image : null,
                'floorplan_height' => $request->floorplan_height ? $request->floorplan_height : null,
                'floorplan_width' => $request->floorplan_width ? $request->floorplan_width : null,
                'public_ssid' => $request->public_ssid ? $request->public_ssid : null,
            ]);

            if ($location && $meta) {
                return response('Location created successfully', 200);
            }

            return response('Error creating location, please try again', 500);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function handleLocationUpdate($request, $id)
    {
        try {
            $location = Location::where('id', $id)->update([
                'name' => $request->name ? $request->name : 'name',
                'address' => $request->address ? $request->address : 'address',
                'postal_code' => $request->postal_code ? $request->postal_code : 'postal_code',
                'city' => $request->city ? $request->city : 'city',
                'country' => $request->country ? $request->country : 'country',
                'state' => $request->state ? $request->state : 'state',
                'latitude' => $request->latitude ? $request->latitude : 54.37795600,
                'longitude' => $request->longitude ? $request->longitude : 54.37795600,
                'timezone' => $request->timezone ? $request->timezone : 'America/New_York',
            ]);

            $meta = LocationMeta::where('location_id', $id)->update([
                'mist_org_id' => $request->mist_org_id ? $request->mist_org_id : null,
                'mist_site_id' => $request->mist_site_id ? $request->mist_site_id : null,
                'mist_map_id' => $request->mist_map_id ? $request->mist_map_id : null,
                'accuweather_location_key' => $request->accuweather_location_key ? $request->accuweather_location_key : null,
                'co2_notification_offset_low' => $request->co2_notification_offset_low ? $request->co2_notification_offset_low : null,
                'co2_notification_offset_high' => $request->co2_notification_offset_high ? $request->co2_notification_offset_high : null,
                'humidity_notification_offset' => $request->humidity_notification_offset ? $request->humidity_notification_offset : null,
                'capacity_notification_offset' => $request->capacity_notification_offset ? $request->capacity_notification_offset : null,
                'floorplan_image' => $request->floorplan_image ? $request->floorplan_image : null,
                'floorplan_height' => $request->floorplan_height ? $request->floorplan_height : null,
                'floorplan_width' => $request->floorplan_width ? $request->floorplan_width : null,
                'public_ssid' => $request->public_ssid ? $request->public_ssid : null,
            ]);

            if ($location && $meta) {
                return response('Location updated successfully', 200);
            }

            return response('Error updating location, please try again', 500);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
