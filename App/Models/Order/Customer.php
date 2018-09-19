<?php

namespace App\Models\Order;

use Core\Model;

class Customer extends Model
{
    /**
     * @var string
     */
    protected $table = 'customers';

    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $email;

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setName($email): void
    {
        $this->email = $email;
    }

    /**
     * @return array|mixed
     */
    protected function toArray()
    {
        return [
            'id' => $this->getId(),
            'email' => $this->getEmail()
        ];
    }
}