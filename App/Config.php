<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{
    /**
     * @return mixed
     */
    public static function getHost()
    {
        return $_ENV['DB_HOST'];
    }

    /**
     * @return mixed
     */
    public static function getDBName()
    {
        return $_ENV['DB_DATABASE'];
    }

    /**
     * @return mixed
     */
    public static function getDBUser()
    {
        return $_ENV['DB_USERNAME'];
    }

    /**
     * @return mixed
     */
    public static function getDBPassword()
    {
        return $_ENV['DB_PASSWORD'];
    }

    /**
     * @return mixed
     */
    public static function getDebugStatus()
    {
        return $_ENV['SHOW_ERRORS'];
    }
}
