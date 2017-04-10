<?php

namespace Project\Models;

use Manix\Brat\Components\Persistence\SQL\SQLGateway;
use PDO;

class DefaultGateway extends SQLGateway {

  function __construct() {
    $host = $_ENV['db']['host'] ?? null;
    $dbname = $_ENV['db']['dbname'] ?? null;
    $charset = $_ENV['db']['charset'] ?? null;
    $user = $_ENV['db']['user'] ?? null;
    $pass = $_ENV['db']['pass'] ?? null;
    
    $pdo = new PDO("mysql:host={$host};dbname={$dbname};charset={$charset};", $user, $pass);

    parent::__construct($pdo);
  }

}