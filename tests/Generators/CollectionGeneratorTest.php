<?php

declare(strict_types=1);

namespace App\Tests\Generators;

use App\Generators\GeneratorInterface;
use App\Generators\RandomStrGenerator;
use PHPUnit\Framework\TestCase;
use App\Generators\CollectionGenerator;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class CollectionGeneratorTest extends TestCase
{
    use ProphecyTrait;

    private ObjectProphecy $generator;

    private CollectionGenerator $collectionGenerator;

    protected function setUp(): void
    {
        $this->generator = $this->prophesize(GeneratorInterface::class);

        $this->collectionGenerator = new CollectionGenerator($this->generator->reveal());
    }

    public function testGenerateCollection(): void
    {
        $this->collectionGenerator->setCollectionLength(3);
        $this->collectionGenerator->setStringLength(3);

        $this->generator->generate(3)
            ->shouldBeCalled()
            ->willReturn('1a3');

        $this->assertEquals([
            '1a3',
            '1a3',
            '1a3',
        ], $this->collectionGenerator->generateCollection());
    }
}
