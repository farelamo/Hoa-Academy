<?php

namespace App\Http\Controllers\Auth\Providers;

use App\Http\Controllers\Controller;
use App\Services\Auth\Providers\GoogleProviderService;

class GoogleProviderController extends Controller
{
    public function __construct(GoogleProviderService $service){
        $this->middleware('authRoute');
        $this->service = $service;
    }

    public function login()
    {
        return $this->service->login();
    }

    public function handleCallback()
    {
        return $this->service->handleCallback();
    }

}
