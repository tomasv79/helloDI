<?php

declare(strict_types=1);

namespace App\Generators;

class CollectionGenerator
{
    private int $arrayLength = 2;
    private int $stringLength = 2;

    public function __construct(
        private GeneratorInterface $generator,
    ) {
    }

    public function setCollectionLength(int $length): void
    {
        $this->arrayLength = $length;
    }

    public function setStringLength(int $length): void
    {
        $this->stringLength = $length;
    }

    /**
     * @return array<string>
     */
    public function generateCollection(): array
    {
        $array = [];
        for ($i = 0; $i < $this->arrayLength; $i++) {
            $array[] = $this->generator->generate($this->stringLength);
        }

        return $array;
    }
}
