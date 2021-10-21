<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Services\PetService;

class PetController extends Controller
{
    /** @var PetService $service Instance of PetService */
    private $service;

    public function __construct()
    {
        $this->service = new PetService();
    }

    /**
     * List all pets
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->service->showAll();
        return response()->json($data['response'], $data['code']);
    }

    /**
     * Store a new pet in storage
     *
     * @param App\Http\Requests\PetRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {
        $data = $this->service->storePet($request);
        return response()->json($data['response'], $data['code']);
    }

    /**
     * Find a pet in storage
     *
     * @param int $id Identification of a pet
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        $data = $this->service->findById($id);
        return response()->json($data['response'], $data['code']);
    }

    public function update(PetRequest $request, $id)
    {

        $data = $this->service->update($request, $id);
        return response()->json($data['response'], $data['code']);
    }

    /**
     * Delete a pet from storage
     *
     * @param int $id Identification of a pet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->service->deleteById($id);
        return response()->json($data['response'], $data['code']);
    }
}
