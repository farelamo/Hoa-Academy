<?php

namespace App\Http\Controllers\Admin\Course;


use App\Http\Requests\Admin\Course\ChapterRequest;
use App\Services\Admin\Course\ChapterService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function __construct(ChapterService $service)
    {
        $this->middleware(['auth', 'admin']);
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function create()
    {
        return $this->service->create();
    }

    public function store(ChapterRequest $request)
    {
        return $this->service->store($request);
    }

    public function edit($id)
    {
        return $this->service->edit($id);
    }

    public function update($id, ChapterRequest $request)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
