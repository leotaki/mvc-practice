<?php

namespace App\Services\Validators\Validators;

use App\Services\Validators\ValidatorInterface;

/**
 * Class CategoryStoreValidator
 * @package App\Services\Validators\Validators
 */
final class CategoryStoreValidator implements ValidatorInterface
{
    /**
     * @var array
     */
    private $structureStandard = [
        'name', 'status'
    ];

    /**
     * @var array
     */
    private $ignoredFields = [
        'id'
    ];

    /**
     * @param array $params
     * @return bool
     */
    public function validate(array $params): bool
    {
        return $this->checkStructure(array_keys($this->removeIgnoredField($params)))
            && $this->checkNameLenght($params['name']);
    }

    /**
     * @param array $params
     * @return bool
     */
    private function checkStructure(array $params)
    {
        $standard = $this->structureStandard;
        natsort($params);
        natsort($standard);

        return $params === $standard;
    }

    /**
     * @param array $params
     * @return array
     */
    private function removeIgnoredField(array $params)
    {
        foreach ($this->ignoredFields as $ignoredField) {
            unset($params[$ignoredField]);
        }

        return $params;
    }

    /**
     * @param string $name
     * @return bool
     */
    private function checkNameLenght(string $name)
    {
        return strlen($name) > 3;
    }
}
