<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Validator;

use Hexlet\Validator\Validator\Constraint\NumericConstraint;
use Hexlet\Validator\Validator\Constraint\PositiveConstraint;
use Hexlet\Validator\Validator\Constraint\RangeConstraint;
use Hexlet\Validator\Validator\Constraint\RequiredConstraint;

class NumberValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->constraints[] = new NumericConstraint();
    }

    public function required(): self
    {
        $this->constraints[] = new RequiredConstraint();
        return $this;
    }

    public function positive(): self
    {
        $this->constraints[] = new PositiveConstraint();
        return $this;
    }

    public function range(int | float $min, int | float $max): self
    {
        $this->constraints[] = new RangeConstraint($min, $max);
        return $this;
    }
}
