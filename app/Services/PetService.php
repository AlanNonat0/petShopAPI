<?php

namespace App\Services;

use App\Http\Requests\PetRequest;
use App\Repositories\PetRepository;


class PetService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PetRepository();
    }

    public function showAll()
    {
        $responseData = $this->repository->all();

        if ($responseData) {
            return response()->json(['message' => 'success', 'data' => $responseData], 200);
        }
        return response()->json(['message' => 'Data does not exist'], 404);

    }

    public function storePet(PetRequest $request)
    {
        $responseData = $this->repository->create($request->all());

        if ($responseData) {
            return response()->json(['message' => 'Success', 'data' => $responseData], 201);
        }

        return response()->json(['message' => 'the data could not be saved'], 400);

    }

    public function findById($id)
    {

        $responseData = $this->repository->find($id);
        
        if ($responseData) {
            return response()->json(['message' => 'Success', 'data' => $responseData], 200);
        }

        return response()->json(['message' => 'Data not found'], 404);
    }

    public function deleteById($id)
    {
        if ($this->repository->find($id)) {

            $this->repository->destroy($id);
            return response()->json(['message' => 'Data has been deleted', 'data' => true], 200);
        }

        return response()->json(['message' => 'Data not found', 'data' => false], 404);
    }

    public function update(PetRequest $request, $id){
        $responseData = $this->repository->find($id);

        if(!$responseData) {
            return ['response' => ['message' => 'Data not found'], 'code' => 404];
        }

        $responseData->fill($request->all());
        $responseData->save();

        return ['response' => ['message' => 'Success', 'data' => $responseData], 'code' => 201];
    }
    
}