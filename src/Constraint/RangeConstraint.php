<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Constraint;

class RangeConstraint implements ConstraintInterface
{
    public function __construct(private int|float $min, private int|float $max)
    {
    }

    public function isValid(mixed $value): bool
    {
        return $value >= $this->min && $value <= $this->max;
    }
}
