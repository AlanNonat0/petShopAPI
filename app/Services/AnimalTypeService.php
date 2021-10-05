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
        return response()->json(['data' => $this->repository->all()], 200);
    }

    public function storePetType(AnimalTypeRequest $request)
    {
        $responseData = $this->repository->create($request->all());
        if($responseData){
            return response()->json(['message' => 'Success', 'data' => $request->all()], 201);
        }
 
        return response()->json(['message' => 'the data could not be saved'], 400);
 
    }

    public function findById($id)
    {
        
        if($this->repository->find($id)){
            return response()->json(['message' => 'Success', 'data' => $this->repository->find($id)], 200);
        }
        
        return response()->json(['message' => 'the data not found'], 404);
    }

    public function deleteById($id)
    {
        if($this->repository->find($id)){

            $this->repository->destroy($id);
            return response()->json(['message' => 'Data has been deleted'], 200);
        }
              
        return response()->json(['message' => 'the data not found'], 404);
    }

}
