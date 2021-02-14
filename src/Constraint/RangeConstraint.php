<?php

declare(strict_types=1);

namespace Hexlet\Validator\Constraint;

class RangeConstraint implements ConstraintInterface
{
    public const NAME = 'range';

    public function __construct(private int | float $min, private int | float $max)
    {
    }

    public function isValid(mixed $value): bool
    {
        return $value >= $this->min && $value <= $this->max;
    }
}
