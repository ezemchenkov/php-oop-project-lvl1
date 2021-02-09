<?php

namespace Hexlet\Validator\Validator\Tests;

use Hexlet\Validator\Validator\Schema\NumberSchema;
use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator\Validator;

class NumberTest extends TestCase
{
    private NumberSchema $schema;

    public function setUp(): void
    {
        $this->schema = (new Validator())->number();
    }

    public function testBase(): void
    {
        $this->assertTrue($this->schema->isValid(null));
        $this->assertTrue($this->schema->isValid(0));
        $this->assertTrue($this->schema->isValid(PHP_INT_MAX));
        $this->assertTrue($this->schema->isValid(PHP_INT_MIN));
        $this->assertTrue($this->schema->isValid(INF));
        $this->assertTrue($this->schema->isValid(-INF));
        $this->assertFalse($this->schema->isValid('hexlet'));
    }

    public function testRequired(): void
    {
        $this->assertTrue($this->schema->isValid(null));

        $this->schema->required();

        $this->assertFalse($this->schema->isValid(null));
    }

    public function testPositive(): void
    {
        $this->assertTrue($this->schema->isValid(-999));

        $this->schema->positive();
        $this->assertFalse($this->schema->isValid(0));
        $this->assertFalse($this->schema->isValid(-999));
    }

    public function testRange(): void
    {
        $this->assertTrue($this->schema->isValid(-10));
        $this->assertTrue($this->schema->isValid(10));

        $this->schema->range(-5, 5);

        $this->assertFalse($this->schema->isValid(-10));
        $this->assertFalse($this->schema->isValid(10));

        $this->assertTrue($this->schema->isValid(-5));
        $this->assertTrue($this->schema->isValid(5));

        $this->assertTrue($this->schema->isValid(-4));
        $this->assertTrue($this->schema->isValid(4));
    }
}
