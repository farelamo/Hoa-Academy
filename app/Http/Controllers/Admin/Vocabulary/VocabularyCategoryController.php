<?php

namespace App\Http\Controllers\Admin\Vocabulary;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Vocabulary\CategoriesRequest;
use App\Services\Admin\Vocabulary\VocabularyCategoryService;

class VocabularyCategoryController extends Controller
{
    public function __construct(VocabularyCategoryService $service)
    {
        $this->middleware(['auth', 'admin']);
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(CategoriesRequest $request)
    {
        return $this->service->store($request);
    }

    public function update($id, CategoriesRequest $request)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
