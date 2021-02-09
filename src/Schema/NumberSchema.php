<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Schema;

class NumberSchema
{
    private array $checks;

    public function __construct()
    {
        $this->checks[] = static fn(mixed $value) => is_null($value) || is_numeric($value);
    }

    public function required(): self
    {
        $this->checks[] = static fn(mixed $value) => !empty($value);
        return $this;
    }

    public function positive(): self
    {
        $this->checks[] = static fn(mixed $value) => $value > 0;
        return $this;
    }

    public function range(int|float $min, int|float $max): self
    {
        $this->checks[] = static fn(mixed $value) => $value >= $min && $value <= $max;
        return $this;
    }

    public function isValid(mixed $value): bool
    {
        return collect($this->checks)->every(fn (callable $fn) => $fn($value));
    }
}
