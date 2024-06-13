<?php

namespace App\Services;

use App\Repositories\BaseRepository;

class BaseService
{
    protected $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getAll($perPage=10)
    {
        return $this->repository->paginate($perPage);
    }

    public function findOne($id)
    {
        return $this->repository->findOne($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    
}

