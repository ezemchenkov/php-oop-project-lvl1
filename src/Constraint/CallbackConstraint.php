<?php

declare(strict_types=1);

namespace Hexlet\Validator\Constraint;

class CallbackConstraint implements ConstraintInterface
{
    private $fn;
    private array $args;

    public function __construct(callable $fn, ...$args)
    {
        $this->fn = $fn;
        $this->args = $args;
    }

    public function isValid(mixed $value): bool
    {
        return call_user_func_array($this->fn, [$value, ...$this->args]);
    }
}
