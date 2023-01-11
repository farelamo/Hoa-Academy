<?php

namespace App\Http\Controllers\User\Vocabulary;

use App\Services\User\Vocabulary\VocabularyService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    public function __construct(VocabularyService $service)
    {
        $this->middleware(['auth', 'user']);
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
