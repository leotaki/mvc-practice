<?php

namespace App\Models\Order;

use Core\Model;

class Order extends Model
{
    protected $table = 'orders';

    /**
     * @var int
     */
    private $id;

    /**
     * \DateTime
     */
    private $date;

    /**
     * @var int
     */
    private $status_id;

    /**
     * @var int
     */
    private $customer_id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getStatusId(): int
    {
        return $this->status_id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @param int $status_id
     */
    public function setStatusId(int $status_id): void
    {
        $this->status_id = $status_id;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customer_id;
    }

    /**
     * @param int $customer_id
     */
    public function setCustomerId(int $customer_id): void
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return array|mixed
     */
    protected function toArray()
    {
        return [
            'id' => $this->getId(),
            'date' => $this->getDate(),
            'status_id' => $this->getStatusId(),
            'customer_id' => $this->getCustomerId()
        ];
    }


}