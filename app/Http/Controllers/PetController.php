<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Repositories\PetRepository;

class PetController extends Controller
{
    /**@var PetRepository $repository Instance of PetRepository */
    private $repository;

    public function __construct()
    {
        $this->repository = new PetRepository();
    }

    /**
     * List all pets
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $data = $this->repository->all();

        if(isset($data)){
            return response()->json(['message' => 'success', 'data' => $data]);
        }

        return response()->json(['message' => 'data does not exist', 'data' => $data]);
    }

    /**
     * Store a new pet in storage
     *
     * @param App\Http\Requests\PetRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {

      $data = $this->repository->create($request->all());

       if(isset($data)){
           return response()->json(['message' => 'success', 'data' => $data]);
       }

        return response()->json(['message' => 'data not entered', 'data' => $data]);

    }

    /**
     * Find a pet in storage
     *
     * @param int $id Identification of a pet
     * @return \Illuminate\Http\Response
     */
    function find($id)
    {
        $data = $this->repository->find($id);

        if(isset($data)){
            return response()->json(['message' => 'success', 'data' => $data]);
        }
        return response()->json(['message' => 'data does not exist', 'data' => $data]);
    }

    /**
     * Delete a pet from storage
     *
     * @param int $id Identification of a pet
     * @return \Illuminate\Http\Response
     */
    function destroy($id)
    {
        $dataExists = $this->repository->find($id);

        if($dataExists){

            $data = $this->repository->destroy($id);
            return response()->json(['message' => 'success', 'data' => true]);

        }

        return response()->json(['message' => 'data does not exist', 'data' => false]);
    }
}
