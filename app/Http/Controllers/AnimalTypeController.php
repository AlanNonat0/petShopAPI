<?php

namespace App\Http\Controllers;

use App\Services\AnimalTypeService;
use App\Http\Requests\AnimalTypeRequest;

class AnimalTypeController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new AnimalTypeService();
    }

    public function index()
    {
        $data = $this->service->showAll();
        return response()->json($data['response'],$data['code']);
    }

    public function store(AnimalTypeRequest $request)
    {
        $data =  $this->service->storePetType($request);
        return response()->json($data['response'],$data['code']);
    }

    public function find($id)
    {
        $data =   $this->service->findById($id);
        return response()->json($data['response'],$data['code']);
    }

    public function update(AnimalTypeRequest $request, $id)
    {

        $data =   $this->service->update($request, $id);
        return response()->json($data['response'],$data['code']);
    }



    public function destroy($id)
    {
        $data =  $this->service->deleteById($id);
        return response()->json($data['response'],$data['code']);
    }
}
