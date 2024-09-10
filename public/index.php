<?php

declare(strict_types=1);

use App\Converters\ConverterInterface;
use App\Generators\CollectionGenerator;

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
 * @var $collectionGenerator CollectionGenerator
 */
$collectionGenerator = $container->get('collection_generator');
$collection = $collectionGenerator->generateCollection();

$convertedGenerators = [];
foreach ($collection as $randomStr) {
    $converterIndex = rand(0, $convertersLen - 1);

    $convertedGenerators[] = [
        'origin' => $randomStr,
        'converted' => $converters[$converterIndex]->convert($randomStr),
        'algo' => (string)$converters[$converterIndex],
    ];
}

dump($convertedGenerators);

