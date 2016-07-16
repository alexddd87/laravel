<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\DB;

abstract class Repository
{
    /**
     *
     * @var $app
     */
    private $app;

    /**
     *
     * @var $model
     */
    protected $model;

    /**
     * call the function of repository
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        $this->app = new App();
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public abstract function model();

    public function getModel()
    {
        return $this->model;
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws Exception
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     *
     * @param array $data
     * @return bool
     */
    public function create($data)
    {
        $this->makeModel();
        $this->model->fill($data);
        return $this->model->save();
    }

    public function getAll()
    {
        return $this->model->get();
    }

    /**
     *
     * @param array $data
     * @param string|int $id
     * @param string $attribute
     * @return mixed
     */
    public function update($id, $data, $attribute = 'id')
    {
        $this->model = $this->model->where($attribute, '=', $id)->first();
        $this->model->fill($data);

        return $this->model->save();
    }

    /**
     *
     * @param string|int $id
     * @param string $attribute
     * @return mixed
     */
    public function delete($id, $attribute = 'id')
    {
        $record = $this->model->where($attribute, '=', $id)->first();
        return $record->delete();
    }

    /**
     * Multiple insert data
     *
     * @param $data
     * @return mixed
     */
    public function insert($data)
    {
        return $this->model->insert($data);
    }

    /**
     * Multiple insert model
     *
     * @param $models
     * @return mixed
     */
    public function multipleInsertModels($models)
    {
        foreach ($models as $model) {
            $this->create($model);
        }

        return true;
    }

    /**
     * Destroy by value
     *
     * @param $column
     * @param $value
     * @return $this
     */
    public function deleteBy($column, $value)
    {
        $this->where($column, '=', $value)->delete();

        return $this;
    }

    /**
     * Destroy by value in array
     *
     * @param array $columns
     * @return $this|bool
     */
    public function deleteByArray($columns)
    {
        if (is_array($columns)) {
            $model = $this->model();
            $query = $model::where(DB::raw('1'), 1);
            foreach ($columns as $column => $value) {
                $query->where($column, '=', $value);
            }

            $query->delete();
        } else {
            return false;
        }

        return $this;
    }
}