<?php

namespace Hexlet\Validator\Validator\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator\Validator;

class ValidatorTest extends TestCase
{
    public function testGetName(): void
    {
        $validator = new Validator();
        $this->assertTrue($validator->isValid());
    }
}
