<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{

    public function __construct(ProfileService $service)
    {
        $this->middleware(['auth']);
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function update(ProfileRequest $request)
    {
        return $this->service->update($request);
    }

    public function updateSmall(Request $request)
    {
        return $this->service->updateSmall($request);
    }
}
