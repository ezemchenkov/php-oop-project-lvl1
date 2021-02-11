<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Constraint;

class MinLengthConstraint implements ConstraintInterface
{
    public function __construct(private int $length)
    {
    }

    public function isValid(mixed $value): bool
    {
        return mb_strlen($value) >= $this->length;
    }
}
