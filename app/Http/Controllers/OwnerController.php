<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerRequest;
use App\Services\OwnerService;

class OwnerController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new OwnerService();
    }

    public function index()
    {
        $data = $this->service->showAll();
        return response()->json($data['response'], $data['code']);
    }

    public function store(OwnerRequest $request)
    {
        $data = $this->service->storeOwner($request);
        return response()->json($data['response'], $data['code']);
    }

    public function find($id)
    {
        $data = $this->service->findById($id);
        return response()->json($data['response'], $data['code']);
    }

    public function update(OwnerRequest $request, $id)
    {
        $data = $this->service->update($request, $id);
        return response()->json($data['response'], $data['code']);
    }

    public function destroy($id)
    {
        $data = $this->service->deleteById($id);
        return response()->json($data['response'], $data['code']);
    }
}
