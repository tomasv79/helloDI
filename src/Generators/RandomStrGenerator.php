<?php

declare(strict_types=1);

namespace App\Generators;

class RandomStrGenerator implements GeneratorInterface
{
    private int $length = 5;

    private string $allowedSharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    public function generate(?int $length = null): string
    {
        $strlen = $length ?? $this->length;

        $randomStr = '';
        for ($i = 0; $i < $strlen; $i++) {
            $randomStr .= $this->allowedSharacters[rand(0, strlen($this->allowedSharacters) - 1)];
        }

        return $randomStr;
    }
}
