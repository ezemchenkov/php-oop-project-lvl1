<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Constraint;

class StringConstraint implements ConstraintInterface
{
    public function isValid(mixed $value): bool
    {
        return is_string($value);
    }
}
