<?php

declare(strict_types=1);

namespace App\Generators;

interface StringGeneratorInterface
{
    public function setLength(int $length): StringGeneratorInterface;
}
