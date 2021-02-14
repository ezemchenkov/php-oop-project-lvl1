<?php

declare(strict_types=1);

namespace Hexlet\Validator\Type;

class NumberType extends AbstractType
{
    public const NAME = 'number';

    public function __construct()
    {
        $this->validators = collect([
            static fn (mixed $value) => is_numeric($value)
        ]);
    }

    public function positive(): self
    {
        $this->validators->add(static fn (int | float $value) => $value > 0);
        return $this;
    }

    public function range(int | float $min, int | float $max): self
    {
        $this->validators->add(static fn (int | float $value) => $value >= $min && $value <= $max);
        return $this;
    }
}
