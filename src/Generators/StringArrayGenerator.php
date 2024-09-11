<?php

declare(strict_types=1);

namespace App\Generators;

use App\Converters\ConverterInterface;

class StringArrayGenerator implements ArrayGeneratorInterface, GeneratorInterface
{
    private int $arrayLength = 2;
    private int $stringLength = 2;

    /**
     * @return array<string>
     */
    private array $strArray = [];

    public function __construct(
        private StringGeneratorInterface $generator,
    ) {
    }

    public function setArrayLength(int $length): void
    {
        $this->arrayLength = $length;
    }

    public function setStringLength(int $length): void
    {
        $this->stringLength = $length;
    }

    public function generate(): GeneratorInterface
    {
        $this->strArray = [];
        for ($i = 0; $i < $this->arrayLength; $i++) {
            $this->strArray[] = $this->generator
                ->setLength($this->stringLength)
                ->generate()
                ->get();
        }

        return $this;
    }

    /**
     * Violating SRP?.. eh.. lazy bastard..
     */
    public function applyConverter(ConverterInterface $converter): void
    {
        foreach ($this->strArray as $key => $str) {
            $this->strArray[$key] = $converter->convert($str);
        }
    }

    public function get(): array
    {
        return $this->strArray;
    }
}
