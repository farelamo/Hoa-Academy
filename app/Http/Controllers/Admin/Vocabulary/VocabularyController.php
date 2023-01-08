<?php

namespace App\Http\Controllers\Admin\Vocabulary;

use App\Services\Admin\Vocabulary\VocabularyService;
use App\Http\Requests\Admin\Vocabulary\VocabularyRequest;
use App\Http\Controllers\Controller;

class VocabularyController extends Controller
{
    public function __construct(VocabularyService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(VocabularyRequest $request)
    {
        return $this->service->store($request);
    }

    public function update($id, VocabularyRequest $request)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
