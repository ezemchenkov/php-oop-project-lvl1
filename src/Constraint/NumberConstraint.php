<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Constraint;

class NumberConstraint implements ConstraintInterface
{
    public function isValid(mixed $value): bool
    {
        return is_numeric($value);
    }
}
