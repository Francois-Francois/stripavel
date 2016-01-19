<?php

namespace App\Repositories;

/**
 * Class AbstractReopsitory.
 */
abstract class AbstractRepository
{
    /**
     * @var
     */
    protected $errors;

    /**
     * Return the errors.
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * @param int   $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * @param int   $id
     * @param array $columns
     *
     * @return mixed
     */
    public function findIfExists($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }

    /**
     * @param array $columns
     * @param $groupBy
     *
     * @return mixed
     */
    public function all($columns = array('*'), $groupBy = false)
    {
        if ($groupBy) {
            return $this->model->all($columns)->groupBy($groupBy)->get();
        }

        return $this->model->all($columns);
    }

    /**
     * @param       $with
     * @param array $columns
     *
     * @return mixed
     */
    public function allWith($with, $columns = array('*'))
    {
        return $this->model->with($with)->get($columns);
    }

    /**
     * @param string $column
     * @param $key
     *
     * @return mixed
     */
    public function lists($column, $key = false)
    {
        return $this->model->lists($column, $key)->all();
    }

    /**
     * @param array $attributes
     */
    public function add(array $attributes)
    {
        $this->create($attributes);
    }

    /**
     * @param $qt
     *
     * @return mixed
     */
    public function orderDesc()
    {
        return $this->model->orderBy($this->model->getKeyName(), 'desc');
    }


    /**
     * @param array $attributes
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     */
    public function firstOrCreate(array $attributes)
    {
        return $this->model->firstOrCreate($attributes);
    }


    /**
     * @return mixed
     */
    public function delete()
    {
        return $this->model->delete();
    }

    /**
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param int   $perPage
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate($perPage = 0, $columns = array('*'), $relations = false)
    {
        if ($relations != false && is_array($relations)) {
            return $this->model->with($relations)->paginate($perPage, $columns);
        }

        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param int   $perPage
     * @param array $columns
     *
     * @return mixed
     */
    public function paginateDesc($perPage = 0, $columns = array('*'), $relations = false)
    {
        if ($relations != false && is_array($relations)) {
            return $this->model->with($relations)->orderBy($this->model->getKeyName(), 'desc')->paginate($perPage, $columns);
        }

        return $this->model->orderBy($this->model->getKeyName(), 'desc')->paginate($perPage, $columns);
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function update(array $attributes = array())
    {
        return $this->model->update($attributes);
    }


    /**
     * @param array $options
     */
    public function save(array $options = array())
    {
        return $this->model->save($options);
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function insertGetId(array $attributes)
    {
        return $this->model->create($attributes)->id;
    }

    /**
     * @param array $attributes
     *
     * @return mixed
     */
    public function insert(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function latest()
    {
        return $this->model->latest();
    }

    public function workWithEloquent($method, $params = false)
    {
        if (method_exists($this->model, 'scope'.ucfirst($method))) {
            if ($params) {
                return $this->model->{$method}($params);
            }

            return $this->model->{$method}();
        }

        throw new \InvalidArgumentException();
    }
}
