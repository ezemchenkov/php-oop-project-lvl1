<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Validator;

use Hexlet\Validator\Validator\Constraint\ConstraintInterface;

class AbstractValidator
{
    protected bool $canBeNull = false;

    protected array $constraints;

    public function isValid(mixed $value): bool
    {
        if ($this->canBeNull && is_null($value)) {
            return true;
        }

        return collect($this->constraints)->every(fn (ConstraintInterface $constraint) => $constraint->isValid($value));
    }
}
