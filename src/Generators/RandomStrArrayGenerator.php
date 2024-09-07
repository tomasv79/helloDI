<?php

declare(strict_types=1);

namespace App\Generators;

class RandomStrArrayGenerator
{
    private int $arrayLength = 2;

    public function __construct(
        private RandomStrGenerator $randomStrGenerator,
    ) {
    }

    public function setArrayLength(int $arrayLength): void
    {
        $this->arrayLength = $arrayLength;
    }

    public function generateArray(): array
    {
        $array = [];
        for ($i = 0; $i < $this->arrayLength; $i++) {
            $array[] = $this->randomStrGenerator->get();
        }
        return $array;
    }
}
