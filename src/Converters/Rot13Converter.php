<?php

declare(strict_types=1);

namespace App\Converters;

class Rot13Converter implements ConverterInterface
{
    function convert(string $input): string
    {
        return str_rot13($input);
    }
}