<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $user = User::where('id', 2)->first();
        
        if ($user->can('delete location')) {
            return Location::all();
        } else {
            return response('No permission to perform this request', 403);
        }
    }
}
