<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Validator;

use Hexlet\Validator\Validator\Constraint\ArrayConstraint;
use Hexlet\Validator\Validator\Constraint\SizeofConstraint;

class ArrayValidator extends AbstractValidator
{
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
}
