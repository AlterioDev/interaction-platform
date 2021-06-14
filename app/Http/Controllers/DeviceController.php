<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceMeta;
use Illuminate\Http\Request;
use App\Services\DeviceService;

class DeviceController extends Controller
{

    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    public function index()
    {
        $response = $this->deviceService->handleDeviceIndex();
        return $response;
    }

    public function show($id)
    {
        $response = $this->deviceService->handleDeviceShow($id);
        return $response;
    }

    public function create(Request $request)
    {
        $response = $this->deviceService->handleDeviceCreate($request);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $response = $this->deviceService->handleDeviceUpdate($request, $id);
        return $response;
    }

    public function delete($id)
    {
        $response = $this->deviceService->handleDeviceDelete($id);
        return $response;
    }
}
