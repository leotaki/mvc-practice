<?php

namespace App\Services\Store;

/**
 * Interface StoreInterface
 * @package App\Services\Store
 */
interface StoreInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);
}