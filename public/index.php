<?php

declare(strict_types=1);

use App\Generators\RandomStrArrayGenerator;
use App\Generators\RandomStrGenerator;

$container = require_once __DIR__ . '/../config/bootstrap.php';


/**
 * @var $rnd RandomStrArrayGenerator
 */
//$rnd = $container->get('random_str_generator');
$rnd = $container->get('random_str_array_generator');
$str = $rnd->generateArray();

dump($str);


//echo $str;