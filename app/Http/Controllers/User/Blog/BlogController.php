<?php

namespace App\Http\Controllers\User\Blog;

use App\Services\User\Blog\BlogService;
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

    public function show($id)
    {
        return $this->service->show($id);
    }
}
