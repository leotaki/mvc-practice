<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

/**
 * Error and Exception handling
 */
session_start();
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
include_once(dirname(__DIR__) . '/routes/routes.php');

$router = new Core\Router();
$router->addRoutes($routes);

$router->dispatch($_SERVER['QUERY_STRING']);
