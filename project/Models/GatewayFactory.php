<?php

namespace Project\Models;

use Manix\Brat\Components\Filesystem\Directory;
use Manix\Brat\Components\Persistence\Gateway;
use const PROJECT_PATH;

class GatewayFactory {

  /**
   * Instantiate a new gateway from a FQCN.
   * @param string $gateway
   * @return Gateway
   */
  public function get($gateway): Gateway {
    switch ($gateway) {

      default:
        $dir = new Directory(PROJECT_PATH . '/files/data');

        return new $gateway($dir);
    }
  }

}
