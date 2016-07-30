<?php
/**
 * Created by PhpStorm.
 * User: jackblack
 * Date: 10.11.15
 * Time: 22:35
 */
namespace App\Traits;

use Illuminate\Http\Request;



trait SetFilterAndRelationsAndSort
{

    /** @var  array Список необходимых связей */
    protected $relations = [];


    public function setFilterAndRelationsSort($query, Request $request = null, $params = [])
    {
        $query = $this->setFilter($query, $params, $request);
        $query = $this->setRelations($query, $request);
        $query = $this->setSort($query, $request);

        return $query;
    }

    /**
     * Установить значения фильтра
     *
     *
     * @param QueryBuilder $query
     * @param array $params астомные параметры для фильтра
     * @param Request $request нужен для выборки по фильтрам с клинта
     * @return mixed
     */
    public function setFilter($query, $params, $request = null)
    {
        if ($params) {
            foreach ($params as $key => $param) {
                if ($param) {
                    /** QueryBuilder */
                    $query->where($key, '=', $param);
                }
            }
        }

        if ($request && $request->input('filter')) {
            $filter = json_decode($request->input('filter'), true);

            if ($filter) {
                foreach ($filter as $key => $value) {

                    $keys_array = explode('.', $key);

                    $relation = null;
                    $table_name = null;
                    if (count($keys_array) == 2 && in_array($keys_array[0], $this->extraFields())) {
                        $relation = $keys_array[0];
                        $table_name = $this->detectTableNameFromRelation($relation);
                        $field_name = $keys_array[1];
                    } else {
                        $field_name = $keys_array[0];
                    }

                    if ($relation) {
                        if (isset($value['operation']) && $value['operation'] == '<>') {
                            $value['operation'] = '=';
                            $query->whereDoesntHave($relation, function($qu) use ($field_name, $value, $table_name) {
                                $this->addFilterCondition($qu, $field_name, $value, $table_name);
                            });
                        } else {
                            $query->whereHas($relation, function ($qu) use ($field_name, $value, $table_name) {
                                $this->addFilterCondition($qu, $field_name, $value, $table_name);
                            });
                        }
                    } else {
                        $this->addFilterCondition($query, $field_name, $value);
                    }
                }
            }
        }

        return $query;
    }

    /**
     * Добавление условий к фильтру
     *
     * @param QueryBuilder $query
     * @param string $key Поле по которому фильтровать
     * @param string $value значение по которому фильтровать
     * @param string $table_name
     * @return mixed
     */
    public function addFilterCondition(&$query, $key, $value, $table_name = null)
    {
        $allow_operations = ['=', '>', '<', '>=', '<=', '<>', 'not in', 'in', 'like'];

        if ($table_name) {
            $key = $table_name . '.' . $key;
        }

        if (is_array($value)) {
            if (isset($value['isNull']) && $value['isNull'] === true) {
                $query->whereNull($key);
            } elseif (isset($value['isNull']) && $value['isNull'] === false) {
                $query->whereNotNull($key);
            }

            $pattern = "/^(\d{2}).(\d{2}).(\d{4})$/";
            if (isset($value['operation']) && in_array(strtolower($value['operation']), $allow_operations) && isset($value['value'])) {
                if (in_array(strtolower($value['operation']), ['in', 'not in']) && is_array($value['value'])) {
                    $query->whereIn($key, $value['value']);
                } elseif (strtolower($value['operation']) == 'like') {
                    $query->where($key, 'like', "%{$value['value']}%");
                } else {
                    $value['value'] = preg_match($pattern, $value['value']) ? (new \DateTime($value['value']))->format("Y-m-d") : $value['value'];
                    $query->where($key, $value['operation'], \DB::raw($value['value']));
                }
            } elseif (isset($value['from']) || isset($value['to'])) {
                if (isset($value['from']) && $value['from']) {
                    $from = preg_match($pattern, $value['from']) ? (new \DateTime($value['from']))->format("Y-m-d") : $value['from'];
                    $query->where($key, '>=', $from);
                }

                if (isset($value['to']) && $value['to']) {
                    $to = preg_match($pattern, $value['to']) ? (new \DateTime($value['to']))->format("Y-m-d") : $value['to'];
                    $query->where($key, '<=', $to);
                }
            }
        } else {
            $query->where($key, $value);
        }

        return $query;
    }

    /**
     * Установить связи
     *
     * @param $query
     * @param Request|null $request
     * @return mixed
     */
    public function setRelations($query, Request $request = null)
    {
        $this->relations = $this->getRelations($request);
        if ($this->relations) {
            $query->with($this->relations);
        }

        return $query;
    }

    /**
     * Получить список связей из expand
     *
     * @param Request $request
     * @return array
     */
    public function getRelations(Request $request = null)
    {
        $relations = [];

        if ($request && $request->get('expand')) {
            $relations = array_intersect($this->extraFields(), explode(',',$request->get('expand')));
        }

        return $relations;
    }

    /**
     * Задает сортировку
     *
     * @param $query
     * @param Request|null $request
     * @return mixed
     */
    public function setSort($query, Request $request = null)
    {
        if ($request && $request->has('sort')) {
            $sort = $request->get('sort');
            $sign = substr($sort, 0, 1);

            if ($sign == '-') {
                $sort_direction = 'desc';
                $sort = trim($sort, '-');
            } else {
                $sort_direction = 'asc';
            }

            $sort_arguments = explode('.', $sort);
            $arg_count = count($sort_arguments);

            if ($arg_count == 2) {
                if (in_array($sort_arguments[0], $this->extraFields())) {
                    $query->modelJoin($sort_arguments[0], $sort_arguments[1]);
                    $table_name = $this->detectTableNameFromRelation($sort_arguments[0]);
                    $query->orderBy($table_name . '.' . $sort_arguments[1], $sort_direction);
                }
            } else {
                $query->orderBy($sort_arguments[0], $sort_direction);
            }
        }

        return $query;
    }

    /**
     * Определение имени таблицы по имени реляции
     *
     * @param string $relation
     * @return string
     */

    protected function detectTableNameFromRelation($relation)
    {
        return $this->$relation()->getRelated()->getTable();
    }

}
