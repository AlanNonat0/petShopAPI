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

    function index()
    {
        return $this->service->showAll();
    }

    public function store(AnimalTypeRequest $request)
    {
        return $this->service->storePetType($request);
    }

    function find($id)
    {
        return  $this->service->findById($id);
    }

    function destroy($id)
    {
        return  $this->service->deleteById($id);
    }
}
