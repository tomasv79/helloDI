<?php

declare(strict_types=1);

use App\Generators\RandomStrArrayGenerator;
use Symfony\Component\DependencyInjection;
use App\Generators\RandomStrGenerator;

$container = new DependencyInjection\ContainerBuilder();
$container
    ->register('random_str_generator', RandomStrGenerator::class)
    ->addMethodCall('setLength', [5])
    ->setAutowired(true);

$container
    ->register('random_str_array_generator', RandomStrArrayGenerator::class)
    ->addArgument(new DependencyInjection\Reference('random_str_generator'))
    ->addMethodCall('setArrayLength', [4])
    ->setAutowired(true);

return $container;
