<?php

declare(strict_types=1);

use App\Converters\Rot13Converter;
use App\Generators\StringArrayGenerator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use App\Generators\RandomStringGenerator;
use App\Converters\SuperConverter;

$container = new ContainerBuilder();
$container->register('random_string_generator', RandomStringGenerator::class)
    ->addMethodCall('setLength', [5]);

$container->register('string_array_generator', StringArrayGenerator::class)
    ->addArgument(new Reference('random_string_generator'))
    ->addMethodCall('setArrayLength', [4])
    ->addMethodCall('setStringLength', [10]);

$container->register('super_converter', SuperConverter::class);
$container->register('rot_13_converter', Rot13Converter::class);

return $container;
