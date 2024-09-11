<?php

declare(strict_types=1);

namespace App\Tests\Generators;

use App\Generators\RandomStringGenerator;
use App\Generators\StringArrayGenerator;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class StringArrayGeneratorTest extends TestCase
{
    use ProphecyTrait;

    private ObjectProphecy $stringGenerator;

    private StringArrayGenerator $stringArrayGenerator;

    protected function setUp(): void
    {
        $this->stringGenerator = $this->prophesize(RandomStringGenerator::class);

        $this->stringArrayGenerator = new StringArrayGenerator($this->stringGenerator->reveal());
    }

    public function testGenerate(): void
    {
        $stringLen = 3;
        $this->stringArrayGenerator->setArrayLength(2);
        $this->stringArrayGenerator->setStringLength($stringLen);

        $this->stringGenerator->setLength($stringLen)
            ->shouldBeCalled()
            ->willReturn($this->stringGenerator);

        $this->stringGenerator->generate()
            ->shouldBeCalled()
            ->willReturn($this->stringGenerator);

        $randStr = '1a3';
        $this->stringGenerator->get()
            ->shouldBeCalled()
            ->willReturn($randStr);

        $result = [
            $randStr,
            $randStr,
        ];
        $this->assertEquals($result, $this->stringArrayGenerator->generate()->get());
    }
}
