<?php

declare(strict_types=1);

namespace Hexlet\Validator\Type;

use Hexlet\Validator\Constraint\ContainsConstraint;
use Hexlet\Validator\Constraint\MinLengthConstraint;
use Hexlet\Validator\Constraint\StringConstraint;
use Hexlet\Validator\Constraint\StringRequiredConstraint;

class StringType extends AbstractType
{
    public const NAME = 'string';

    protected bool $canBeNull = true;

    public function __construct()
    {
        $this->constraints = [
            StringConstraint::class => new StringConstraint()
        ];
    }

    public function required(): self
    {
        $this->canBeNull = false;
        $this->constraints[StringRequiredConstraint::class] = new StringRequiredConstraint();
        return $this;
    }

    public function minLength(int $length): self
    {
        $this->constraints[MinLengthConstraint::class] = new MinLengthConstraint($length);
        return $this;
    }

    public function contains(string $substr): self
    {
        $this->constraints[ContainsConstraint::class] = new ContainsConstraint($substr);
        return $this;
    }
}
