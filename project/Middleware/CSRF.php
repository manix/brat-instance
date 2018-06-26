<?php

namespace Project\Middleware;

use Exception;
use Manix\Brat\Components\Controller;
use Manix\Brat\Components\Middleware;
use Manix\Brat\Components\Program;
use Manix\Brat\Utility\HTTP\HTTPController;
use const MANIX;

class CSRF implements Middleware {

  /**
   * Generates a random token.
   * @param int $length Length of the generated token.
   * @return string The token.
   */
  protected function generateCSRFToken($length) {
    $token = '';

    for ($i = 0; $i < $length; $i++) {
      $token .= mt_rand(0, 9);
    }

    return $token;
  }

  public function execute(Controller $controller, $method, Program $program) {

    if ($controller instanceof HTTPController) {
      /*
       * Generate a CSRF token
       */
      if (!isset($_SESSION[MANIX]['csrf'])) {
        $_SESSION[MANIX]['csrf'] = $this->generateCSRFToken(32);
      }

      if (!defined('CSRF_TOKEN')) {
        define('CSRF_TOKEN', $_SESSION[MANIX]['csrf']);
      }

      if ($controller->csrf($method)) {
        $token = $_POST['manix-csrf'] ?? $_SERVER['HTTP_CSRF_TOKEN'] ?? null;

        if ($_SESSION[MANIX]['csrf'] !== $token) {
          throw new Exception('CSRF token mismatch.', 400);
        }
      }
    }
  }

}
