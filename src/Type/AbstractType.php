<?php

declare(strict_types=1);

namespace Hexlet\Validator\Type;

use Hexlet\Validator\Constraint\CallbackConstraint;
use Hexlet\Validator\Constraint\ConstraintInterface;

class AbstractType
{
    protected bool $canBeNull = false;

    protected array $constraints;

    protected array $customConstraints;

    public function isValid(mixed $value): bool
    {
        if ($this->canBeNull && is_null($value)) {
            return true;
        }

        return collect($this->constraints)->every(fn (ConstraintInterface $constraint) => $constraint->isValid($value));
    }

    public function addValidator(string $name, callable $fn): void
    {
        $this->customConstraints[$name] = $fn;
    }

    public function test(string $name, ...$args): AbstractType
    {
        $this->constraints[$name] = new CallbackConstraint($this->customConstraints[$name], ...$args);
        return $this;
    }
}
