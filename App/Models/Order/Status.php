<?php

namespace App\Models\Order;

use Core\Model;

/**
 * Class Status
 * @package App\Models\Order
 */
class Status extends Model
{
    /**
     * @var string
     */
    protected $table = 'statuses';

    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $name;

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
     * @return array|mixed
     */
    protected function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];
    }
}
