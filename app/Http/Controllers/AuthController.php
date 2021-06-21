<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $response = $this->authService->handleUserRegistration($request);

        return $response;
    }

    public function login(Request $request)
    {
        $response = $this->authService->handleUserLogin($request);

        return $response;
    }

    public function user(Request $request)
    {
        $request->user()->getRoleNames();

        return response($request->user());
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response('Logged out successfully', 200);
    }
}
