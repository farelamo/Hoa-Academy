<?php

namespace App\Http\Controllers\Admin\Absensi;

use App\Http\Requests\Admin\Absensi\AbsensiRequest;
use App\Services\Admin\Absensi\AbsensiService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function __construct(AbsensiService $service)
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

    public function edit($id)
    {
        return $this->service->edit($id);
    }

    public function store(AbsensiRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(AbsensiRequest $request, $id)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
