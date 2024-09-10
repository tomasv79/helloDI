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
        $length = 7;
        $this->generator->setLength($length);

        $this->assertMatchesRegularExpression(
            '/^[0-9a-zA-Z]{'.$length.'}$/',
            $this->generator->generate()
        );
    }
}
