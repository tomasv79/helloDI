<?php

declare(strict_types=1);

use App\Converters\Rot13Converter;
use App\Converters\SuperConverter;
use App\Generators\RandomStrArrayGenerator;
use App\Generators\RandomStrGenerator;

$container = require_once __DIR__ . '/../config/bootstrap.php';


/**
 * @var $rnd SuperConverter
 */
$rnd = $container->get('super_converter');
//$str = $rnd->convert('22aAcd');
$str = $rnd->convert('abcdx');

dump($str);


/**
 * @var $rnd Rot13Converter
 */
$rnd = $container->get('rot_13_converter');
$str = $rnd->convert('abcdx');
dump($str, $rnd->convert($str));


//echo $str;