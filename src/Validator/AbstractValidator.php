<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Validator;

use Hexlet\Validator\Validator\Constraint\ConstraintInterface;

class AbstractValidator
{
    protected array $constraints;

    public function isValid(mixed $value): bool
    {
        return collect($this->constraints)->every(fn (ConstraintInterface $constraint) => $constraint->isValid($value));
    }
}
