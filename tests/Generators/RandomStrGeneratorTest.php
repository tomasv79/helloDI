<?php

declare(strict_types=1);

namespace App\Tests\Generators;

use App\Generators\RandomStrGenerator;
use PHPUnit\Framework\TestCase;

class RandomStrGeneratorTest extends TestCase
{
    private RandomStrGenerator $generator;

    public function setUp(): void
    {
        $this->generator = new RandomStrGenerator();
    }

    public function testRandomStrGenerator(): void
    {
        $mokck = $this->generator->generate(5);

        $this->assertEquals($mokck, $mokck);
    }
}