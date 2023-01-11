<?php

namespace App\Http\Controllers\User\Course;

use App\Services\User\Course\CourseService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct(CourseService $service)
    {
        $this->middleware(['auth', 'user'])->except('indexHome');
        $this->service = $service;
    }

    public function indexHome()
    {
        return $this->service->indexHome();
    }

    public function indexDashboard()
    {
        return $this->service->indexDashboard();
    }

    public function progress()
    {
        return $this->service->progress();
    }

    public function finished()
    {
        return $this->service->finished();
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function join($id)
    {
        return $this->service->join($id);
    }

    public function showChapter($courseId, $id)
    {
        return $this->service->showChapter($courseId, $id);
    }
}
