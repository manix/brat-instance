<?php

return [
    'bratpath' => null,
    'env' => 'debug',
    'data-sources' => [
      [
        'mysql:host=localhost;port=3306;dbname=;charset=utf8mb4',
        'root',
        '',
        [
          PDO::ATTR_EMULATE_PREPARES => false,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      ]
    ],
    'mail' => [
        'host' => '',
        'port' => 465,
        'encryption' => 'ssl',
        'user' => '',
        'pass' => '',
    ],
];
