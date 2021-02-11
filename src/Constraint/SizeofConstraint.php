<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Constraint;

class SizeofConstraint implements ConstraintInterface
{
    public function __construct(private int $length)
    {
    }

    public function isValid(mixed $value): bool
    {
        return count($value) >= $this->length;
    }
}
