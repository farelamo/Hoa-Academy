<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Requests\Admin\Event\EventRequest;
use App\Services\Admin\Event\EventService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct(EventService $service)
    {
        $this->middleware(['auth', 'admin']);
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function updateImage($id, Request $request)
    {
        return $this->service->updateImage($id, $request);
    }

    public function create()
    {
        return $this->service->create();
    }

    public function edit($id)
    {
        return $this->service->edit($id);
    }

    public function store(EventRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(EventRequest $request, $id)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
