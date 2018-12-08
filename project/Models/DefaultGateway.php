<?php

namespace Project\Models;

use Manix\Brat\Components\Persistence\SQL\SQLGateway;
use PDO;

abstract class DefaultGateway extends SQLGateway {

  protected static $connections = [];

  public static function connect($name) {
    if (!isset(static::$connections[$name])) {
      $pdo = new PDO(...($_ENV['data-sources'][$name]));

      static::$connections[$name] = $pdo;
    }

    return static::$connections[$name];
  }

  public function getPDO() {
    return $this->pdo;
  }

  function __construct($connection = 0) {
    parent::__construct($connection instanceof PDO ? $connection : static::connect($connection));
  }

}
