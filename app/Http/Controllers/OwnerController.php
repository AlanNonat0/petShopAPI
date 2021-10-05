<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use App\Repositories\OwnerRepository;

class OwnerController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new OwnerRepository();
    }

    public function store(OwnerRequest $request)
    {

      $responseData = $this->repository->create($request->all());
       if($responseData){
           return response()->json(['message' => 'Success', 'data' => $responseData]);
       }

       return response()->json(['message' => 'Error']);


    }

    function index()
    {
        return response()->json(['data' => $this->repository->all()]);
    }

    function find($id)
    {
        return response()->json(['data' => $this->repository->find($id)]);
    }

    function destroy($id)
    {
        return response()->json(['data' => $this->repository->destroy($id)]);
    }
}
