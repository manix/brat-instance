<?php

namespace Project\Models;

use Manix\Brat\Components\Persistence\SQL\SQLGateway;
use PDO;

class DefaultGateway extends SQLGateway {

  protected static $connections = [];

  public static function connect($name) {
    if (!isset(static::$connections[$name])) {
      $host = $_ENV[$name]['host'] ?? null;
      $dbname = $_ENV[$name]['dbname'] ?? null;
      $charset = $_ENV[$name]['charset'] ?? null;
      $user = $_ENV[$name]['user'] ?? null;
      $pass = $_ENV[$name]['pass'] ?? null;

      $pdo = new PDO("mysql:host={$host};dbname={$dbname};charset={$charset};", $user, $pass, [
          PDO::ATTR_EMULATE_PREPARES => false,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);

      static::$connections[$name] = $pdo;
    }

    return static::$connections[$name];
  }

  public function getPDO() {
    return $this->pdo;
  }

  function __construct($connection = 'db') {
    parent::__construct($connection instanceof PDO ? $connection : static::connect($connection));
  }

}
