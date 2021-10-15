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
            return ['response' => ['message' => 'success', 'data' => $responseData], 'code' => 200];
        }
        return ['response' => ['message' => 'Data does not exist'], 'code' => 404];

    }

    public function storePet(PetRequest $request)
    {
        $responseData = $this->repository->create($request->all());

        if ($responseData) {
            return ['response' => ['message' => 'Success', 'data' => $responseData], 'code' => 201];
        }

        return ['response' => ['message' => 'the data could not be saved'], 'code' => 400];

    }

    public function findById($id)
    {

        $responseData = $this->repository->find($id);
        
        if ($responseData) {
            return ['response' => ['message' => 'Success', 'data' => $responseData], 'code' => 200];
        }

        return ['response' => ['message' => 'Data not found'], 'code' => 404];
    }

    public function deleteById($id)
    {
        if ($this->repository->find($id)) {

            $this->repository->destroy($id);
            return ['response' => ['message' => 'Data has been deleted', 'data' => true], 'code' => 200];
        }

        return ['response' => ['message' => 'Data not found', 'data' => false], 'code' => 404];
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