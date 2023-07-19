<?php

namespace App\Repositories\BaseRepository\Contract;

interface BaseRepositoryContract
{
    public function all();

    public function find(int $id);

    public function find_where(array $data);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}
