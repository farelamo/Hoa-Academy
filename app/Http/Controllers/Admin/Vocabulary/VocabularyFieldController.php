<?php

namespace App\Http\Controllers\Admin\Vocabulary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\Vocabulary\VocabularyFieldService;
use App\Http\Requests\Admin\Vocabulary\VocabularyFieldRequest;

class VocabularyFieldController extends Controller
{
    public function __construct(VocabularyFieldService $service)
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

    public function store(VocabularyFieldRequest $request)
    {
        return $this->service->store($request);
    }

    public function edit($id)
    {
        return $this->service->edit($id);
    }

    public function update($id, VocabularyFieldRequest $request)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
