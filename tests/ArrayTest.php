<?php

namespace Hexlet\Validator\Validator\Tests;

use Hexlet\Validator\Validator\Schema\ArraySchema;
use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator\Validator;

class ArrayTest extends TestCase
{
    private ArraySchema $schema;

    public function setUp(): void
    {
        $this->schema = (new Validator())->array();
    }

    public function testBase(): void
    {
        $this->assertTrue($this->schema->isValid([]));
        $this->assertTrue($this->schema->isValid([1]));
        $this->assertTrue($this->schema->isValid(['hexlet', 'php']));

        $this->assertFalse($this->schema->isValid(null));
        $this->assertFalse($this->schema->isValid(0));
        $this->assertFalse($this->schema->isValid(''));
        $this->assertFalse($this->schema->isValid(true));
    }

    public function testSizeof(): void
    {
        $this->assertTrue($this->schema->isValid([]));

        $this->schema->sizeof(2);
        $this->assertFalse($this->schema->isValid([]));
        $this->assertFalse($this->schema->isValid([1]));
        $this->assertTrue($this->schema->isValid([1, 2]));
        $this->assertTrue($this->schema->isValid([1, 2, 3]));
    }
}
