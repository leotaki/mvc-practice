<?php

namespace App\Services\Store;

use Core\Model;

abstract class StoreService implements StoreInterface
{
    /**
     * @var Model
     */
    private $model;

    /**
     * StoreService constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return bool|mixed
     */
    public function store(array $data)
    {
        $model = $this->getObject($data['id'] ?? null);
        $preparedModel = $this->fillFields($model, $data);

        return $this->save($preparedModel);
    }

    /**
     * @param Model $category
     * @return bool
     */
    private function save(Model $category)
    {
        return $category->save();
    }

    /**
     * @param Model $model
     * @param array $data
     * @return mixed
     */
    abstract protected function fillFields(Model $model, array $data);

    /**
     * @param int|null $id
     * @return array|Model
     */
    private function getObject(int $id = null)
    {
        return $id ? $this->model->findById($id) : $this->model;
    }
}