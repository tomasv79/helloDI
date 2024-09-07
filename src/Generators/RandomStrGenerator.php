<?php

declare(strict_types=1);

namespace App\Generators;

class RandomStrGenerator implements GeneratorInterface
{
    private int $length = 5;

    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    public function generate(?int $length = null): string
    {
        $strlen = $length ?? $this->length;

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomStr = '';
        for ($i = 0; $i < $strlen; $i++) {
            $randomStr .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomStr;
    }
}
