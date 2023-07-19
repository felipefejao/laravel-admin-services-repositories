<?php

namespace App\Repositories\BaseRepository;

use App\Repositories\BaseRepository\Contract\BaseRepositoryContract;

class BaseRepository implements BaseRepositoryContract
{
    /**
     * @var
     */
    protected $model;

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function find_where(array $data)
    {
        return $this->model->selectWhere($data)->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data)
    {
        return $this->model->update($id, $data);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->model->delete($id);
    }
}
