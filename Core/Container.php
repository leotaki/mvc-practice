<?php

namespace Core;

class Container
{
    /**
     * @param string $className
     * @param Request $request
     * @return mixed
     * @throws \ReflectionException
     */
    public function buildController(string $className, Request $request)
    {
        $params = $this->getClassConstructorParameters($className);
        $arguments = [$request];

        foreach ($params as $param) {
            $argumentClassName = $param->getClass()->getName();
            if ($argumentClassName != get_class($request)) {
                $arguments[] = $this->buildClass($argumentClassName);
            }
        }

        return $this->createInstance($className, $arguments);
    }

    /**
     * @param string $className
     * @return array
     * @throws \ReflectionException
     */
    private function getClassConstructorParameters(string $className): array
    {
        $class = new \ReflectionClass($className);
        $constructor = $class->getConstructor();

        return $constructor ? $constructor->getParameters() : [];
    }

    /**
     * @param string $className
     * @return mixed
     * @throws \ReflectionException
     */
    public function buildClass(string $className)
    {
        $params = $this->getClassConstructorParameters($className);
        $attributes = [];
        foreach ($params as $param) {
            $attributes[] = $this->buildClass($param->getClass()->getName());
        }

        return $this->createInstance($className, $attributes);
    }

    /**
     * @param string $className
     * @param array $arguments
     * @return mixed
     */
    private function createInstance(string $className, array $arguments)
    {
        if (empty($arguments)) {
            return new $className();
        }

        return new $className(...$arguments);
    }
}
