<?php

declare(strict_types=1);

namespace Hexlet\Validator\Type;

use Illuminate\Support\Collection;

class AbstractType
{
    protected bool $canBeNull = false;

    protected Collection $validators;

    protected array $customValidators;

    public function isValid(mixed $value): bool
    {
        if ($this->canBeNull && is_null($value)) {
            return true;
        }

        return $this->validators->every(static fn (callable $fn) => $fn($value));
    }

    public function addValidator(string $name, callable $fn): void
    {
        $this->customValidators[$name] = $fn;
    }

    public function test(string $name, ...$args): AbstractType
    {
        $fn = $this->customValidators[$name];
        $this->validators->add(static fn (mixed $value) => $fn(...[$value, ...$args]));
        return $this;
    }
}
