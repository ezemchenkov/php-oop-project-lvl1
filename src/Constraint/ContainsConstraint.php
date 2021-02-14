<?php

declare(strict_types=1);

namespace Hexlet\Validator\Constraint;

class ContainsConstraint implements ConstraintInterface
{
    public function __construct(private string $substr)
    {
    }

    public function isValid(mixed $value): bool
    {
        return str_contains($value, $this->substr);
    }
}
