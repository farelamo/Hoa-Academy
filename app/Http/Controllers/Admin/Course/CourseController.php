<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Requests\Admin\Course\CourseRequest;
use App\Services\Admin\Course\CourseService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct(CourseService $service)
    {
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

    public function store(CourseRequest $request)
    {
        return $this->service->store($request);
    }

    public function edit($id)
    {
        return $this->service->edit($id);
    }

    public function update($id, CourseRequest $request)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }

    public function updateImage($id, Request $request)
    {
        return $this->service->updateImage($id, $request);
    }
}
