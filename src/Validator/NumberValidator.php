<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Validator;

use Hexlet\Validator\Validator\Constraint\NumberConstraint;
use Hexlet\Validator\Validator\Constraint\PositiveConstraint;
use Hexlet\Validator\Validator\Constraint\RangeConstraint;

class NumberValidator extends AbstractValidator
{
    protected bool $canBeNull = true;

    public function __construct()
    {
        $this->constraints = [
            NumberConstraint::class => new NumberConstraint(),
        ];
    }

    public function required(): self
    {
        $this->canBeNull = false;
        return $this;
    }

    public function positive(): self
    {
        $this->constraints[PositiveConstraint::NAME] = new PositiveConstraint();
        return $this;
    }

    public function range(int | float $min, int | float $max): self
    {
        $this->constraints[RangeConstraint::NAME] = new RangeConstraint($min, $max);
        return $this;
    }
}
