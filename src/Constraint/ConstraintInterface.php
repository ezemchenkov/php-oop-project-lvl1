<?php

declare(strict_types=1);

namespace Hexlet\Validator\Constraint;

interface ConstraintInterface
{
    public function isValid(mixed $value): bool;
}
