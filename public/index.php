<?php

declare(strict_types=1);

use App\Collections\GeneratorsCollection;
use App\Converters\ConverterInterface;
use App\Generators\GeneratorInterface;
use Doctrine\Common\Collections\ArrayCollection;

$container = require_once __DIR__ . '/../config/bootstrap.php';

/**
 * @var $converters array<ConverterInterface>
 */
$converters = [
    $container->get('super_converter'),
    $container->get('rot_13_converter'),
];

$convertersLen = count($converters);

/**
 * @var $generatorCollection ArrayCollection<GeneratorInterface>
 */
$generatorCollection = (new GeneratorsCollection([
    $container->get('random_string_generator'),
    $container->get('string_array_generator'),
]))->getAll();

foreach ($generatorCollection as $generator) {
    $converterIndex = rand(0, $convertersLen - 1);

    $generator
        ->generate()
        ->applyConverter($converters[$converterIndex]);

    dump($generator->get());
}
