<?php

declare(strict_types=1);

namespace App\Tests\Converters;

use App\Converters\SuperConverter;
use PHPUnit\Framework\TestCase;

class SuperConverterTest extends TestCase
{
    private SuperConverter $converter;

    public function setUp(): void
    {
        $this->converter = new SuperConverter();
    }

    public function testConvert(): void
    {
        $this->assertEquals('1/1/20/5/26/20/0/1', $this->converter->convert('1Atezt0a'));
    }

    public function testToString(): void
    {
        $this->assertEquals('App\Converters\SuperConverter', $this->converter->__toString());
    }
}
