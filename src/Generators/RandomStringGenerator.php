<?php

declare(strict_types=1);

namespace App\Generators;

use App\Converters\ConverterInterface;

class RandomStringGenerator implements StringGeneratorInterface, GeneratorInterface
{
    private string $randomString = '';
    private int $length = 3;
    private string $allowedSharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function setLength(int $length): StringGeneratorInterface
    {
        $this->length = $length;

        return $this;
    }

    public function generate(): GeneratorInterface
    {
        $this->randomString = '';
        for ($i = 0; $i < $this->length; $i++) {
            $this->randomString .= $this->allowedSharacters[rand(0, strlen($this->allowedSharacters) - 1)];
        }

        return $this;
    }

    /**
     * Violating SRP?.. eh.. lazy bastard..
     */
    public function applyConverter(ConverterInterface $converter): void
    {
        $this->randomString = $converter->convert($this->randomString);
    }

    public function get(): string
    {
        return $this->randomString;
    }
}
