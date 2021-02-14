<?php

declare(strict_types=1);

namespace Hexlet\Validator\Type;

class StringType extends AbstractType
{
    public const NAME = 'string';

    public function __construct()
    {
        $this->validators = collect([
            static fn (mixed $value) => is_string($value)
        ]);
    }

    public function required(): self
    {
        $this->allowsNull = false;
        $this->validators->add(static fn (string $value) => $value !== '');
        return $this;
    }

    public function minLength(int $length): self
    {
        $this->validators->add(static fn (string $value) => mb_strlen($value) >= $length);
        return $this;
    }

    public function contains(string $substr): self
    {
        $this->validators->add(static fn (string $value) => str_contains($value, $substr));
        return $this;
    }
}
