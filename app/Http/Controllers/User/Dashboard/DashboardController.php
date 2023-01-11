<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\User\Dashboard\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(DashboardService $service)
    {
        $this->middleware(['auth', 'user']);
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }
}
