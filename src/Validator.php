<?php

declare(strict_types=1);

namespace Hexlet\Validator\Validator;

use Hexlet\Validator\Validator\Schema\NumberSchema;
use Hexlet\Validator\Validator\Schema\StringSchema;

class Validator
{
    public function string(): StringSchema
    {
        return new StringSchema();
    }

    public function number(): NumberSchema
    {
        return new NumberSchema();
    }
}
