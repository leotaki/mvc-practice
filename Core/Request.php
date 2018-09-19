<?php

namespace Core;

/**
 * Class Request
 * @package Core
 */
class Request
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @var array
     */
    private $params = [];

    /**
     * @var string
     */
    private $url;

    /**
     * Request constructor.
     * @param array $params
     * @param string $url
     */
    private function __construct(array $params, string $url)
    {
        $this->params = $params;
        $this->url = $url;
    }

    /**
     *
     */
    private function __clone()
    {
        //
    }

    /**
     * @param array $params
     * @param string $url
     * @return Request
     */
    public static function getInstance(array $params, string $url)
    {
        if (! self::$instance) {
            self::$instance = new self($params, $url);
        }

        return self::$instance;
    }

    /**
     * @param string|null $key
     * @return null
     */
    public function getInput(string $key = null)
    {
        $input = $_POST;
        if (! $key) {
            return $input;
        }

        return $input[$key] ?? null;
    }

    /**
     * @param string|null $key
     * @return null
     */
    public function getQuery(string $key = null)
    {
        $query = $_GET;
        unset($query[$this->getUrl()]);
        if (! $key) {
            return $query;
        }

        return $query[$key] ?? null;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}