<?php

declare(strict_types=1);

namespace App\Tests\Converters;

use App\Converters\Rot13Converter;
use PHPUnit\Framework\TestCase;

class Rot13ConverterTest extends TestCase
{
    private Rot13Converter $converter;

    public function setUp(): void
    {
        $this->converter = new Rot13Converter();
    }

    public function testConvert(): void
    {
        $this->assertEquals('nop', $this->converter->convert('abc'));
    }
}
