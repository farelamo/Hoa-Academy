<?php

namespace App\Http\Controllers\User\Event;

use App\Services\User\Event\EventService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(EventService $service)
    {
        $this->middleware(['auth', 'user'])->only('join');
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function join($id)
    {
        return $this->service->join($id);
    }
}