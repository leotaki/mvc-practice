<?php

namespace App\Services\Store\Services;

use App\Models\Product\Category;
use App\Services\Store\StoreService;
use Core\Model;

/**
 * Class CategoryStore
 * @package App\Services\Store\Services
 */
final class CategoryStore extends StoreService
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return mixed
     */
    protected function fillFields(Model $model, array $data)
    {
        /**
         * @var Category $model
         */
        $model->setName($data['name']);
        $model->setStatus($data['status']);

        return $model;
    }
}
