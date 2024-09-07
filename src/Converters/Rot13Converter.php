<?php

declare(strict_types=1);

namespace App\Converters;

class Rot13Converter extends AbstractConverter implements ConverterInterface
{
    public function convert(string $input): string
    {
        return str_rot13($input);
    }
}
