<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LocationService;

class LocationController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index()
    {
        $response = $this->locationService->handleLocationIndex();
        return $response;
    }

    public function show($id)
    {
        $response = $this->locationService->handleLocationShow($id);
        return $response;
    }

    public function create(Request $request)
    {
        $response = $this->locationService->handleLocationCreate($request);
        return $response;
    }

    public function update(Request $request, $id)
    {
        $response = $this->locationService->handleLocationUpdate($request, $id);
        return $response;
    }

    public function delete($id)
    {
        $response = $this->locationService->handleLocationDelete($id);
        return $response;
    }
}
