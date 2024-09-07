<?php

declare(strict_types=1);

namespace App\Generators;

class CollectionGenerator
{
    private int $arrayLength = 2;
    private int $stringLength = 2;

    public function __construct(
        private GeneratorInterface $randomStrGenerator,
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

    public function generateCollection(): array
    {
        $array = [];
        for ($i = 0; $i < $this->arrayLength; $i++) {
            $array[] = $this->randomStrGenerator->generate($this->stringLength);
        }
        return $array;
    }
}
