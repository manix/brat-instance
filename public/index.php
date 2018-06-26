<?php

use Manix\Brat\Utility\HTTP\HTTPProgram;

define('PUBLIC_PATH', __DIR__);
define('PROJECT_PATH', realpath(__DIR__ . '/../project'));

require __DIR__ . '/../vendor/manix/brat/src/manix.php';

$manix->run(new HTTPProgram);
