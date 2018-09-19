<?php

namespace Core;

use PDO;
use App\Config;

/**
 * Base model
 *
 * PHP version 7.0
 */
abstract class Model
{
    /**
     * @var \PDO
     */
    protected $db;

    /**
     * @var
     */
    protected $table;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = $this->getDB();
    }

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    private function getDB()
    {
        $dsn = 'mysql:host=' . Config::getHost() . ';dbname=' . Config::getDBName() . ';charset=utf8';
        $db = new \PDO($dsn, Config::getDBUser(), Config::getDBPassword());
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }

    /**
     * @param \PDOStatement $stmt
     * @return array
     */
    protected function execute(\PDOStatement $stmt)
    {
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this));

        return $stmt->fetchAll();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql = sprintf('SELECT * FROM %s', $this->table);
        $stmt =  $this->db->prepare($sql);

        return $this->execute($stmt);
    }

    /**
     * @param int $id
     * @return array
     */
    public function findById(int $id)
    {
        $result = $this->findBy(['id' => $id]);

        return array_shift($result);
    }

    /**
     * @param array $params
     * @return array
     */
    public function findBy(array $params)
    {
        $sql = sprintf('SELECT * FROM %s WHERE %s', $this->table, $this->getWhereQuery($params));
        $stmt = $this->db->prepare($sql);
        $stmt = $this->bindQueryParams($stmt, $params);

        return $this->execute($stmt);
    }

    /**
     * @param array $params
     * @return string
     */
    private function getWhereQuery(array $params)
    {
        $queries = [];

        foreach($params as $attribute => $value) {
            $queries[] = sprintf("%s = :%s", $attribute, $attribute);
        }

        return implode(' AND ', $queries);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $sql = sprintf('DELETE FROM %s WHERE id = :value', $this->table);
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':value', $id);

        return $stmt->execute();
    }

    /**
     * @return bool
     */
    public function save()
    {
        $attributes = $this->toArray();
        $id = $attributes['id'];
        unset($attributes['id']);

        return $id ? $this->update($id, $attributes) : $this->create($attributes);
    }

    /**
     * @param array $params
     * @return bool
     */
    private function create(array $params)
    {
        $queries = [];
        $values = [];

        foreach($params as $attribute => $value) {
            $queries[] = sprintf("%s", $attribute);
            $values[] = sprintf(":%s", $attribute);
        }

        $createdString = implode(', ', $queries);
        $valuesString = implode(', ', $values);

        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $this->table, $createdString, $valuesString);
        $stmt = $this->db->prepare($sql);
        $stmt = $this->bindQueryParams($stmt, $params);

        return $stmt->execute();
    }

    /**
     * @param int $id
     * @param array $params
     * @return bool
     */
    private function update(int $id, array $params)
    {
        $sql = sprintf('UPDATE %s SET %s WHERE id = :id', $this->table, $this->getQueryString($params));
        $stmt = $this->db->prepare($sql);
        $stmt = $this->bindQueryParams($stmt, $params);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    /**
     * @param array $params
     * @return string
     */
    private function getQueryString(array $params)
    {
        $queries = [];

        foreach($params as $attribute => $value) {
            $queries[] = sprintf("%s = :%s", $attribute, $attribute);
        }

        return implode(', ', $queries);
    }

    /**
     * @param \PDOStatement $stmt
     * @param array $params
     * @return \PDOStatement
     */
    private function bindQueryParams(\PDOStatement $stmt, array $params)
    {
        foreach($params as $attribute => $value) {
            $bindValue{$attribute} = $value;
            $stmt->bindParam(sprintf(':%s', $attribute), $bindValue{$attribute});
        }

        return $stmt;
    }

    /**
     * @return mixed
     */
    abstract protected function toArray();
}
