<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository {
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findOne($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create( $data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $modelInstance = $this->findOne($id);
        $modelInstance->update($data);
        return $modelInstance;
    }

    public function delete($id)
    {
        $modelInstance = $this->findOne($id);
        $modelInstance->delete();
        return true;
    }
    public function paginate($perPage = 30)
    {
        return $this->model::paginate($perPage);
    }
}
