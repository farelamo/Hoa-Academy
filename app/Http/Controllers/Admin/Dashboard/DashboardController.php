<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Services\Admin\Dashboard\DashboardService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        return $this->service->index();
    }
}
