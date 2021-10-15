<?php

namespace App\Services;

use App\Http\Requests\AnimalTypeRequest;
use App\Repositories\AnimalTypeRepository;

class AnimalTypeService
{

    private $repository;

    public function __construct()
    {
        $this->repository = new AnimalTypeRepository();
    }

    public function showAll()
    {
        $responseData = $this->repository->all();

        if ($responseData) {
            return ['response' => ['message' => 'success', 'data' => $responseData], 'code' => 200];
        }
        return ['response' => ['message' => 'Data does not exist'], 'code' => 404];

    }

    public function storePetType(AnimalTypeRequest $request)
    {
        $responseData = $this->repository->create($request->all());

        if (!$responseData) {
            return ['response' => ['message' => 'the data could not be saved'], 'code' => 400];
        }

        return ['response' => ['message' => 'Success', 'data' => $responseData], 'code' => 201];
        
    }

    public function findById($id)
    {

        $responseData = $this->repository->find($id);

        if (!$responseData) {
            return ['response' => ['message' => 'Data not found'], 'code' => 404];
        }

        return ['response' => ['message' => 'Success', 'data' => $responseData], 'code' => 200];
        
    }

    public function deleteById($id)
    {
        if (!$this->repository->find($id)) {
            return ['response' => ['message' => 'Data not found'], 'code' => 404];
        }

        $this->repository->destroy($id);
        return ['response' => ['message' => 'Data has been deleted'], 'code' => 200];
    }

    public function update(AnimalTypeRequest $request, $id){
        $responseData = $this->repository->find($id);

        if(!$responseData) {
            return ['response' => ['message' => 'Data not found'], 'code' => 404];
        }

        $responseData->fill($request->all());
        $responseData->save();

        return ['response' => ['message' => 'Success', 'data' => $responseData], 'code' => 201];
    }

}
