<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Constraint;

class PositiveConstraint implements ConstraintInterface
{
    public const NAME = 'positive';

    public function isValid(mixed $value): bool
    {
        return $value > 0;
    }
}
