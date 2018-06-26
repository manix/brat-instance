<?php

namespace Project\Middleware;

use Exception;
use Manix\Brat\Components\Controller;
use Manix\Brat\Components\Middleware;
use Manix\Brat\Components\Program;
use Manix\Brat\Utility\HTTP\HTTPController;
use Manix\Brat\Utility\HTTP\HTTPProgram;
use const MANIX;

class Session implements Middleware {

  public function execute(Controller $controller, $method, Program $program) {
    if ($program instanceof HTTPProgram && $controller instanceof HTTPController && $controller->session($method)) {
      $program->startSession();

      $fingerprint = md5($_SERVER['HTTP_USER_AGENT'] ?? null);

      if (empty($_SESSION[MANIX]['fp'])) {
        // Set fingerprint if it's not set yet
        $_SESSION[MANIX]['fp'] = $fingerprint;
      } else if ($fingerprint !== $_SESSION[MANIX]['fp']) {
        throw new Exception('Invalid session fingerprint.', 400);
      }
    }
  }

}
