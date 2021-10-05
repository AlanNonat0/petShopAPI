<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

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
     * Crate new register in database
     *
     * @return 
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * Return all data
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Returns data by id
     *
     * @return Collection
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Delete data by id
     *
     * @return Collection
     */
    public function destroy(int $id)
    {
        return $this->model->destroy($id);
    }
}
