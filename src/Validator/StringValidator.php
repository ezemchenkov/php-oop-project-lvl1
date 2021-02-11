<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator\Validator;

use Hexlet\Validator\Validator\Constraint\ContainsConstraint;
use Hexlet\Validator\Validator\Constraint\MinLengthConstraint;
use Hexlet\Validator\Validator\Constraint\RequiredConstraint;
use Hexlet\Validator\Validator\Constraint\StringConstraint;

class StringValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->constraints[] = new StringConstraint();
    }

    public function required(): self
    {
        $this->constraints[] = new RequiredConstraint();
        return $this;
    }

    public function minLength(int $length): self
    {
        $this->constraints[] = new MinLengthConstraint($length);
        return $this;
    }

    public function contains(string $substr): self
    {
        $this->constraints[] = new ContainsConstraint($substr);
        return $this;
    }
}
