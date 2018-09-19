<?php

namespace App\Services\Validators;

interface ValidatorInterface
{
    public function validate(array $params): bool;
}