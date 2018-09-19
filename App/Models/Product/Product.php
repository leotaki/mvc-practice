<?php

namespace App\Models\Product;

use Core\Model;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'product';

    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $category_id;

    /**
     * @var
     */
    private $code;

    /**
     * @var
     */
    private $price;

    /**
     * @var
     */
    private $availability;

    /**
     * @var
     */
    private $brand;

    /**
     * @var
     */
    private $description;

    /**
     * @var
     */
    private $is_new;

    /**
     * @var
     */
    private $is_recommended;

    /**
     * @var
     */
    private $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param mixed $availability
     */
    public function setAvailability($availability): void
    {
        $this->availability = $availability;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getisNew()
    {
        return $this->is_new;
    }

    /**
     * @param mixed $is_new
     */
    public function setIsNew($is_new): void
    {
        $this->is_new = $is_new;
    }

    /**
     * @return mixed
     */
    public function getisRecommended()
    {
        return $this->is_recommended;
    }

    /**
     * @param mixed $is_recommended
     */
    public function setIsRecommended($is_recommended): void
    {
        $this->is_recommended = $is_recommended;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return array|mixed
     */
    protected function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'status' => $this->getStatus(),
            'category_id' => $this->getCategoryId(),
            'brand' => $this->getBrand(),
            'code' => $this->getCode(),
            'price' => $this->getPrice(),
            'availability' => $this->getAvailability(),
            'description' => $this->getDescription(),
            'is_new' => $this->getisNew(),
            'is_recommended' => $this->getisRecommended(),
        ];
    }
}