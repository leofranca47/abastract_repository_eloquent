<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;
    protected $wheres;
    protected $query;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    abstract protected function resolveModel(): Model;

    public function updateById($id, $data): bool
    {
        $this->unMountQuery();
        return $this->model->find($id)->update($data);
    }

    public function deleteById($id)
    {
        $this->model->find($id)->delete();

        return [
            'message' => 'deleted'
        ];
    }

    /**Equal Eloquent */

    public function find($id)
    {
        $this->unMountQuery();
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        $this->unMountQuery();
        return $this->model->create($data);
    }

    public function all()
    {
        $this->unMountQuery();
        return $this->model->all();
    }

    public function where(string $column, string $value, string $operator = '=')
    {
        $this->wheres[] = compact('column', 'value', 'operator');
        return $this;
    }

    public function first(array $columns = ['*'])
    {
        $this->newQuery()->mountWhere();
        $model = $this->query->firstOrFail($columns);
        $this->unMountQuery();
        return $model;
    }

    public function get(array $columns = ['*'])
    {
        $this->newQuery()->mountWhere();
        $models = $this->query->get($columns);
        $this->unMountQuery();
        return $models;
    }

    public function update(array $attributes = [], array $options = [])
    {
        $this->unMountQuery();
        return $this->model->update($attributes, $options);
    }

    /**metodhs to chain */

    protected function newQuery()
    {
        $this->query = $this->model->newQuery();
        return $this;
    }

    protected function mountWhere()
    {
        if (!is_array($this->wheres)) {
            return $this->query;
        }

        foreach ($this->wheres as $where) {
            $this->query->where($where['column'], $where['operator'], $where['value']);
        }

        return $this;
    }

    protected function unMountQuery()
    {
        $this->wheres = null;
        $this->query = null;
    }
}
