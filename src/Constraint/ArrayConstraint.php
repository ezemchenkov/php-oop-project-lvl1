<?php

declare(strict_types=1);

namespace Hexlet\Validator\Constraint;

class ArrayConstraint implements ConstraintInterface
{
    public function isValid(mixed $value): bool
    {
        return is_array($value);
    }
}
