<?php

declare(strict_types=1);

namespace App\Converters;

abstract class AbstractConverter
{
    public function __toString(): string
    {
        return get_class($this);
    }
}
