<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseService
{
    const DEFAULT_PAGINATE = 10;

    protected $model;

    /**
     * Call method from model if it not exist in service
     *
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }

    /**
     * Получение коллекций
     *
     * @param Request $request
     * @param array $params параметры для фильтра
     * @return
     */
    public function getItems(Request $request = null, $params = [])
    {
        $query = $this->model->where(DB::raw('1'), 1);

        $items = $query->paginate($this->getPaginate($request));

        return $items->items();
    }

    /**
     * Получение сущностей
     *
     * @param $id
     * @param Request $request
     * @param array $params
     * @return bool
     */
    public function getItem($id, Request $request = null, $params = [])
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Получить пагинацию
     *
     * @param Request|null $request
     * @return int|mixed
     */
    public function getPaginate(Request $request = null)
    {
        return ($request && $request->has('limit')) ? $request->get('limit') : self::DEFAULT_PAGINATE;
    }
}
