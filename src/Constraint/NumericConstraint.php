<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Constraint;

class NumericConstraint implements ConstraintInterface
{
    public function isValid(mixed $value): bool
    {
        return is_null($value) || is_numeric($value);
    }
}
