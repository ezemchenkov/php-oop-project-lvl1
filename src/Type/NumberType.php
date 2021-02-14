<?php

declare(strict_types=1);

namespace Hexlet\Validator\Type;

use Hexlet\Validator\Constraint\NumberConstraint;
use Hexlet\Validator\Constraint\PositiveConstraint;
use Hexlet\Validator\Constraint\RangeConstraint;

class NumberType extends AbstractType
{
    public const NAME = 'number';

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
