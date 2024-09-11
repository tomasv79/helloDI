<?php

declare(strict_types=1);

namespace App\Generators;

use App\Converters\ConverterInterface;

interface GeneratorInterface
{
    public function generate(): GeneratorInterface;
    public function applyConverter(ConverterInterface $converter): void;
    public function get(): mixed; //uh.. is it workaround? :)
}
