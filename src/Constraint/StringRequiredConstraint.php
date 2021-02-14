<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Constraint;

class StringRequiredConstraint implements ConstraintInterface
{
    public function isValid(mixed $value): bool
    {
        return $value !== '';
    }
}
