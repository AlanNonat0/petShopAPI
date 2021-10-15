<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

abstract class AbstractRepository
{
    protected $model;
    protected $pivot = '';

    /**
     * Assigns the child's model class to the template attribute.
     */
    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    /**
     *  Returns the model class used by the child class
     *
     * @return \App\Models
     */
    protected function resolveModel()
    {
        return app($this->model);
    }

    /**
     *  Returns the model class used by the child class
     *
     * @return \App\Models
     */
    protected function resolvePivot()
    {
        return app($this->model->pivot);
    }


    /**
     * Return all data
     *
     * @return Collection
     */
    public function all()
    {
        if (!$this->testConnection()) {
            return false;
        }

        if($this->pivot){
            return $this->model->with($this->pivot)->get();
        }

        return $this->model->all();

    }

    /**
     * Crate new register in database
     *
     * @return Collection
     */
    public function create($data)
    {
        if ($this->testConnection()) {
            return $this->model->create($data);
        }

        return false;

    }

    /**
     * Returns data by id
     *
     * @return Collection
     */
    public function find(int $id)
    {
        if (!$this->testConnection()) {
             return false;
        }
        if($this->pivot){

            $search = $this->model->where('id',$id)->with($this->pivot)->get();

            return count($search) <= 0 ? null : $search;
        }
        return $this->model->find($id);


    }

    /**
     * update a register in database
     *
     * @return Collection
     */
    public function update($request, $id)
    {

        $instanceModel = $this->find($id);
// dd($instanceModel);
        if (!$instanceModel) {
            return false;
        }
        if ($instanceModel === null) {
            return null;
        }

        if ($this->testConnection()) {

            $instanceModel->fill($request->all());
            $instanceModel->save();

            return $instanceModel;

        }
        return false;
    }

    /**
     * Delete data by id
     *
     * @return Collection
     */
    public function destroy(int $id)
    {
        if ($this->testConnection()) {
            return $this->model->destroy($id);
        }
        return false;

    }

    public function testConnection()
    {
        try {
            if (DB::connection()->getPdo()) {
                return true;
            }

        } catch (\PDOException $e) {
            return false;

        }
    }
}
