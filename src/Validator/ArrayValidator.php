<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Validator;

class ArrayValidator
{
    private array $checks;

    public function __construct()
    {
        $this->checks[] = static fn(mixed $value) => is_array($value);
    }

    public function required(): self
    {
//        $this->checks[] = static fn(mixed $value) => is_array($value);
        return $this;
    }

    public function sizeof(int $len): self
    {
        $this->checks[] = static fn(mixed $value) => count($value) >= $len;
        return $this;
    }

    public function isValid(mixed $value): bool
    {
        return collect($this->checks)->every(fn (callable $fn) => $fn($value));
    }
}
