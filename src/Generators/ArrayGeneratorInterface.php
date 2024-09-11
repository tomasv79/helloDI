<?php

declare(strict_types=1);

namespace App\Generators;

interface ArrayGeneratorInterface
{
    public function setArrayLength(int $length): void;
    public function setStringLength(int $length): void;
}
