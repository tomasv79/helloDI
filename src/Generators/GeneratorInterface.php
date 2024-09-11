<?php

declare(strict_types=1);

namespace App\Generators;

interface GeneratorInterface
{
    public function generate(?int $length = null): string;
}
