<?php namespace App\Services;
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16.07.16
 * Time: 16:27
 */

use App\Repositories\Repository;
use App\Traits\SetFilterAndRelationsAndSort;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseService {
    use SetFilterAndRelationsAndSort;

    const DEFAULT_PAGINATE = 10;

    /**
     * Костыль для обхода коллизий в названии полей при фильтрации по вложенным моделям
     * Ключ - имя реляции
     * Значение - имя таблицы
     * @var array
     */
    protected $compareRelationAndTable = [
        'emailGroups' => 'email_group',
    ];

    /**
     * @var Transformer
     */
    protected $transformer;

    /**
     * Репозиторий. Должен назначатся в конструкторах дочерних классах
     *
     * @var Repository
     */
    protected $repository;


    /**
     * Вызов функции в сервисе, если ее нет - вызовется в репозитории
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->repository, $method], $args);
    }

    /**
     * @return Transformer
     */
    public function getTransformer()
    {
        return $this->transformer;
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
        $model = $this->repository->getModel();
        $query = $model::where(DB::raw('1'), 1);

        if (method_exists($this, 'setFilterAndRelationsSort')) {
            $query = $this->setFilterAndRelationsSort($query, $request, $params);
        }

        $items = $query->paginate($this->getPaginate($request));

        $collection = $items->toArray();

        if ($this->transformer instanceof \App\Transformers\ITransformer) {
            $collection['data'] = $this->transformer->transformCollection($items->items(), $this->relations);
        } else {
            $collection['data'] = $items->items();
        }

        return $collection;
    }

    /**
     * Получение сущностей
     *
     * @param $id
     * @param Request $request
     * @param array $params
     * @param bool $needTransform
     * @return bool
     */
    public function getItem($id, Request $request = null, $params = [], $needTransform = true)
    {
        $model = $this->repository->model();
        $query = $model::where(DB::raw('1'), 1);

        if (method_exists($this, 'setFilterAndRelationsSort')) {
            $query = $this->setFilterAndRelationsSort($query, $request, $params);
        }

        // небольшой костыль
        try {
            $model = $query->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return false;
        }

        if ($needTransform && $this->transformer instanceof \App\Transformers\ITransformer) {
            $data = $this->transformer->transform($model, $this->relations);
        } else {
            $data = $model;
        }

        return $data;
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

    public function getModel($needTransform = true, Request $request = null)
    {
        $model = $this->repository->getModel();
        $query = $model;
        $query = $this->setRelations($query, $request);
        return $needTransform ? $this->transformer->transform($query, $this->relations) : $model;
    }
}