<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Requests\Admin\Blog\BlogCategory\BlogCategoryEditRequest;
use App\Http\Requests\Admin\Blog\BlogCategory\BlogCategoryAddRequest;
use App\Services\Admin\Blog\BlogCategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    public function __construct(BlogCategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(BlogCategoryAddRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(BlogCategoryEditRequest $request, $id)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
