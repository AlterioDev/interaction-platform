<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->can('view location')) {
            $locations = $user->userMeta->allowed_locations;
            $query = Location::query();
            return $locations == '*' ? $query->get() : $query->whereIn('id', explode(',', $locations))->get();
        } else {
            return response('No permission to perform this request', 403);
        }
    }
}
