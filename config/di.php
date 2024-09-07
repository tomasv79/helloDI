<?php

declare(strict_types=1);

use App\Converters\Rot13Converter;
use App\Generators\CollectionGenerator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use App\Generators\RandomStrGenerator;
use App\Converters\SuperConverter;

$container = new ContainerBuilder();
$container->register('random_str_generator', RandomStrGenerator::class)
    ->addMethodCall('setLength', [5]);

$container->register('collection_generator', CollectionGenerator::class)
    ->addArgument(new Reference('random_str_generator'))
    ->addMethodCall('setCollectionLength', [4])
    ->addMethodCall('setStringLength', [7]);

$container->register('super_converter', SuperConverter::class);
$container->register('rot_13_converter', Rot13Converter::class);

return $container;
