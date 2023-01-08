<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Requests\Admin\Blog\BlogRequest;
use App\Services\Admin\Blog\BlogService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(BlogService $service)
    {
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

    public function store(BlogRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(BlogRequest $request, $id)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
