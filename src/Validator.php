<?php

declare(strict_types=1);

namespace Hexlet\Validator;

use Hexlet\Validator\Type\AbstractType;
use Hexlet\Validator\Type\StringType;
use Hexlet\Validator\Type\NumberType;
use Hexlet\Validator\Type\ArrayType;

class Validator
{
    private array $types;

    public function __construct()
    {
        $this->types = [
            StringType::NAME => new StringType(),
            NumberType::NAME => new NumberType(),
            ArrayType::NAME => new ArrayType()
        ];
    }

    public function __call(string $type, array $arguments): AbstractType
    {
        return $this->types[$type];
    }

    public function addValidator(string $type, string $name, callable $fn): void
    {
        $this->types[$type]->addValidator($name, $fn);
    }
}
