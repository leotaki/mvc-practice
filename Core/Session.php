<?php

namespace Core;

class Session
{
    /**
     * @var
     */
    private static $instance;

    /**
     * Session constructor.
     */
    private function __construct()
    {
        //
    }

    /**
     *
     */
    private function __clone()
    {
        //
    }

    /**
     * @return Session
     */
    public static function getInstance()
    {
        if (! self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getParam(string $key)
    {
        $session = $_SESSION;

        return $session[$key] ?? null;
    }

    /**
     * @param string $key
     * @param $value
     */
    public function setParam(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }
}