<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator;

use Hexlet\Validator\Validator\Validator\ArrayValidator;
use Hexlet\Validator\Validator\Validator\NumberValidator;
use Hexlet\Validator\Validator\Validator\StringValidator;

class Validator
{
    public function string(): StringValidator
    {
        return new StringValidator();
    }

    public function number(): NumberValidator
    {
        return new NumberValidator();
    }

    public function array(): ArrayValidator
    {
        return new ArrayValidator();
    }
}
