<?php

namespace App\Services\Admin;

class BaseService
{
    protected $model;

    public function create($params)
    {
        return $this->model->create($params);
    }

    public function update($id, $params)
    {
        $model = $this->model->find($id);
        $model->update($params);

        return $this->model->find($id);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if ($this->model->find($id)) {
            return $this->model->find($id);
        }

        return false;
    }

    public function insert($params)
    {
        return $this->model->insert($params);
    }

    public function all()
    {
        return $this->model->all();
    }
}
