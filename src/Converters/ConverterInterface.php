<?php

declare(strict_types=1);

namespace App\Converters;

interface ConverterInterface
{
    public function convert(string $input): string;
}
