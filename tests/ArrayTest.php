<?php

namespace Hexlet\Validator\Validator\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator\Validator;

class ArrayTest extends TestCase
{
    private Validator $validator;

    public function setUp(): void
    {
        $this->validator = new Validator();
    }

    public function testBase(): void
    {
        $schema = $this->validator->array();
        $this->assertTrue($schema->isValid([]));
        $this->assertTrue($schema->isValid([1]));
        $this->assertTrue($schema->isValid(['hexlet', 'php']));

        $this->assertFalse($schema->isValid(null));
        $this->assertFalse($schema->isValid(0));
        $this->assertFalse($schema->isValid(''));
        $this->assertFalse($schema->isValid(true));
    }

    public function testSizeof(): void
    {
        $schema = $this->validator->array();
        $this->assertTrue($schema->isValid([]));

        $schema->sizeof(2);
        $this->assertFalse($schema->isValid([]));
        $this->assertFalse($schema->isValid([1]));
        $this->assertTrue($schema->isValid([1, 2]));
        $this->assertTrue($schema->isValid([1, 2, 3]));
    }

    public function testShape(): void
    {
        $schema = $this->validator->array();
        $schema->shape([
            'name' => $this->validator->string()->required(),
            'age' => $this->validator->number()->positive(),
        ]);

        $this->assertTrue($schema->isValid(['name' => 'kolya', 'age' => 100]));
        $this->assertTrue($schema->isValid(['name' => 'maya', 'age' => null]));
        $this->assertFalse($schema->isValid(['name' => '', 'age' => null]));
        $this->assertFalse($schema->isValid(['name' => 'ada', 'age' => -5]));
    }
}
