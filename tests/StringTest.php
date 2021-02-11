<?php

namespace Hexlet\Validator\Validator\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator\Validator;
use Hexlet\Validator\Validator\Validator\StringValidator;

class StringTest extends TestCase
{
    private StringValidator $schema;

    public function setUp(): void
    {
        $this->schema = (new Validator())->string();
    }

    public function testBase(): void
    {
        $this->assertTrue($this->schema->isValid(''));
        $this->assertTrue($this->schema->isValid('what does the fox say'));
        $this->assertTrue($this->schema->isValid('hexlet'));
    }

    public function testRequired(): void
    {
        $this->assertTrue($this->schema->isValid(null));
        $this->assertTrue($this->schema->isValid(''));

        $this->schema->required();

        $this->assertFalse($this->schema->isValid(null));
        $this->assertFalse($this->schema->isValid(''));
    }

    public function testContains(): void
    {
        $this->schema->contains('what');
        $this->assertTrue($this->schema->isValid('what does the fox say'));

        $this->schema->contains('whatthe');
        $this->assertFalse($this->schema->isValid('what does the fox say'));
    }

    public function testMinLength(): void
    {
        $this->assertTrue($this->schema->isValid('test'));

        $this->schema->minLength(10);
        $this->assertFalse($this->schema->isValid('test'));
    }
}
