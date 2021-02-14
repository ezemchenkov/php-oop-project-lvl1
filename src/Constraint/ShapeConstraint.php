<?php

declare(strict_types=1);

namespace Hexlet\Validator\Constraint;

use Hexlet\Validator\Type\AbstractType;

class ShapeConstraint implements ConstraintInterface
{
    public function __construct(private array $constraints = [])
    {
    }

    public function isValid(mixed $value): bool
    {
        return collect($this->constraints)->every(function (AbstractType $validator, $key) use ($value) {
            $v = $value[$key] ?? null;
            return $validator->isValid($v);
        });
    }
}
