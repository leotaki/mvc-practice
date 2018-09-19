<?php

namespace Core;

/**
 * Base controller
 *
 * PHP version 7.0
 */
abstract class Controller
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * Class constructor
     *
     * @param Request $request     Request class
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Magic method called when a non-existent or inaccessible method is
     * called on an object of this class. Used to execute before and after
     * filter methods on action methods. Action methods need to be named
     * with an "Action" suffix, e.g. indexAction, showAction etc.
     *
     * @param string $name  Method name
     * @param array $args Arguments passed to the method
     *
     * @return void
     */
    public function __call($name, $args)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                $this->{$method}(... $args);
                $this->after();
            }
        } else {
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }

    /**
     * Before filter - called before an action method.
     *
     * @return void
     */
    protected function before()
    {
    }

    /**
     * After filter - called after an action method.
     *
     * @return void
     */
    protected function after()
    {
    }

    /**
     * @param string $url
     */
    protected function redirect(string $url)
    {
        header(sprintf('Location:%s', $url), 301);
        exit();
    }
}
