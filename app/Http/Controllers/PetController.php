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
        return $this->service->showAll();
    }

    /**
     * Store a new pet in storage
     *
     * @param App\Http\Requests\PetRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {
        return $this->service->storePet($request);
    }

    /**
     * Find a pet in storage
     *
     * @param int $id Identification of a pet
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        return $this->service->findById($id);
    }

    public function update(PetRequest $request, $id)
    {

        $data =   $this->service->update($request, $id);
        return response()->json($data['response'],$data['code']);
    }

    /**
     * Delete a pet from storage
     *
     * @param int $id Identification of a pet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->service->deleteById($id);
    }
}
