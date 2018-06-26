<?php

namespace Project\Middleware;

use Manix\Brat\Components\Controller;
use Manix\Brat\Components\Middleware;
use Manix\Brat\Components\Program;
use const MANIX;
use function config;

class Lang implements Middleware {

  public function execute(Controller $controller, $method, Program $program) {

    if ($controller->lang($method)) {
      /*
       * Determine language and store in session.
       */
      if (!isset($_SESSION[MANIX]['lang'])) {
        $lc = config('lang');

        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
          $langs = $lc['languages'];

          $q = 0;
          foreach (explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']) as $part) {
            list($code, $priority) = explode(';q=', $part . ';q=');

            if (isset($langs[$code])) {
              if (!isset($priority)) {
                $priority = 1;
              }

              if ($priority >= $q) {
                $lang = $code;
                $q = $priority;
              }
            }
          }

          $_SESSION[MANIX]['lang'] = $lang ?? $lc['default'];
        } else {
          $_SESSION[MANIX]['lang'] = $lc['default'];
        }
      }

      if (!defined('LANG')) {
        define('LANG', $_SESSION[MANIX]['lang']);
      }
    }
  }

}
