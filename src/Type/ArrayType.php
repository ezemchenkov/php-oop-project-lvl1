<?php

declare(strict_types=1);

namespace Hexlet\Validator\Type;

class ArrayType extends AbstractType
{
    public const NAME = 'array';

    public function __construct()
    {
        $this->validators = collect([
            static fn (mixed $value) => is_array($value)
        ]);
    }

    public function sizeof(int $len): self
    {
        $this->validators->add(static fn (array $items) => count($items) >= $len);
        return $this;
    }

    public function shape(array $validators): self
    {
        $shapeValidators = collect($validators);
        $this->validators->add(static fn (array $items) => $shapeValidators->every(
            static fn (AbstractType $validator, $key) => $validator->isValid($items[$key] ?? null)
        ));

        return $this;
    }
}
