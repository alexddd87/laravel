<?php
namespace App\Transformers;

class Transformer
{
    /**
     * Преобразование данных коллекций
     *
     * @param array $items
     * @param array $relations
     * @return array
     */
    public function transformCollection($items, $relations = [])
    {
        $transformCollections = [];
        foreach($items as $item) {
            $transformCollections[] = $this->transform($item, $relations);
        }

        return $transformCollections;
    }

    /**
     * Преобразование одной записи из коллекции
     *
     * @param array $item
     * @param $relations
     * @return array
     */
    public function transform($item, $relations)
    {
        if ( ! is_array($item)) {
            $data = $item->toArray();
            foreach ($relations as $relation) {
                $data[$relation] = $item->$relation ? $item->$relation->toArray() : null;
            }
        } else {
            $data = $item;
        }

        return $data;
    }
}