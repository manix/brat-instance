<?php

define('PUBLIC_PATH', __DIR__ . '/public');
define('PROJECT_PATH', realpath(__DIR__ . '/project'));

$_ENV = array_merge($_ENV, require(PROJECT_PATH . '/.env.php'));

require ($_ENV['bratpath'] ?? 'vendor/manix/brat/src/') . 'manix.php';
