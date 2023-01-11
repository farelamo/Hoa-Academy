<?php

namespace App\Http\Controllers\User\Absensi;

use App\Http\Requests\User\Absensi\AbsensiRequest;
use App\Services\User\Absensi\AbsensiService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function __construct(AbsensiService $service)
    {
        $this->middleware(['auth', 'user']);
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(AbsensiRequest $request)
    {
        return $this->service->store($request);
    }
}
