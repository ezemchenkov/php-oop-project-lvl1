<?php

declare(strict_types=1);

namespace Hexlet\Validator\Type;

use Hexlet\Validator\Constraint\ArrayConstraint;
use Hexlet\Validator\Constraint\ShapeConstraint;
use Hexlet\Validator\Constraint\SizeofConstraint;

class ArrayType extends AbstractType
{
    public const NAME = 'array';

    public function __construct()
    {
        $this->constraints[] = new ArrayConstraint();
    }

    public function required(): self
    {
        return $this;
    }

    public function sizeof(int $len): self
    {
        $this->constraints[] = new SizeofConstraint($len);
        return $this;
    }

    public function shape(array $rules): self
    {
        $this->constraints[] = new ShapeConstraint($rules);
        return $this;
    }
}
