<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Schema;

class StringSchema
{
    private array $checks;

    public function __construct()
    {
        $this->checks[] = static fn(mixed $value) => is_null($value) || is_string($value);
    }

    public function required(): self
    {
        $this->checks[] = static fn(mixed $value) => !empty($value);
        return $this;
    }

    public function minLength(int $length): self
    {
        $this->checks[] = static fn(mixed $value) => mb_strlen($value) >= $length;
        return $this;
    }

    public function contains(string $substr): self
    {
        $this->checks[] = static fn(mixed $value) => str_contains($value, $substr);
        return $this;
    }

    public function isValid(mixed $value): bool
    {
        return collect($this->checks)->every(fn (callable $fn) => $fn($value));
    }
}
