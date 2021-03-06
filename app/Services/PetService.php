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

        if (!$responseData) {
             return ['response' => ['message' => 'Internal Server Error'], 'code' => 500];
        }

        if(count($responseData->toArray()) <= 0){

            return  ['response' => ['message' => 'Data does not exist'], 'code' => 404];
        }

        return ['response' => ['message' => 'success', 'data' => $responseData], 'code' => 200];


    }

    public function storePet(PetRequest $request)
    {
        $responseData = $this->repository->create($request->all());

        if (!$responseData) {
            return ['response' => ['message' => 'the data could not be saved'], 'code' => 500];
        }

        return ['response' => ['message' => 'Success', 'data' => $responseData], 'code' => 201];

    }

    public function findById($id)
    {
        $responseData = $this->repository->find($id);

        if($responseData === null) {
            return ['response' => ['message' => 'Data not found'], 'code' => 404];
        }

        if (!$responseData) {
            return ['response' => ['message' => 'Internal Server Error'], 'code' => 500];
        }

        return ['response' => ['message' => 'Success', 'data' => $responseData], 'code' => 200];

    }

    public function deleteById($id)
    {
        $responseData = $this->repository->find($id);

        if($responseData === null) {
            return ['response' => ['message' => 'Data not found'], 'code' => 404];
        }
        $destroy = $this->repository->destroy($id);

        if (!$responseData || !$destroy) {
            return ['response' => ['message' => 'Internal Server Error'], 'code' => 500];
        }

        return ['response' => ['message' => 'Data has been deleted'], 'code' => 200];
    }

    public function update(PetRequest $request, $id){

        $responseData = $this->repository->find($id);

        if($responseData === null) {
            return ['response' => ['message' => 'Data not found'], 'code' => 404];
        }

        if (!$responseData) {
            return ['response' => ['message' => 'Internal Server Error'], 'code' => 500];
        }

        $updateData = $this->repository->update($request, $id);

        return ['response' => ['message' => 'Success', 'data' => $updateData], 'code' => 201];
    }

}
