<?php

declare(strict_types=1);

namespace App\Tests\Generators;

use App\Converters\Rot13Converter;
use App\Generators\RandomStringGenerator;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class RandomStringGeneratorTest extends TestCase
{
    use ProphecyTrait;

    private RandomStringGenerator $generator;

    public function setUp(): void
    {
        $this->generator = new RandomStringGenerator();
    }

    public function testGenerate(): void
    {
        $length = 7;
        $this->generator->setLength($length);

        $this->assertMatchesRegularExpression(
            '/^[0-9a-zA-Z]{'.$length.'}$/',
            $this->generator->generate()->get()
        );
    }

    public function testApplyConverter(): void
    {
        $converter = $this->prophesize(Rot13Converter::class);
        $converter->convert('')
            ->shouldBeCalled()
            ->willReturn('');

        $this->generator->applyConverter($converter->reveal());
    }
}
