<?php

namespace Project\Middleware;

use Exception;
use Manix\Brat\Components\Controller;
use Manix\Brat\Components\Middleware;
use Manix\Brat\Components\Program;
use Manix\Brat\Components\Validation\Ruleset;
use Manix\Brat\Components\Validation\Validator;
use Manix\Brat\Utility\HTTP\HTTPController;

class Query implements Middleware {

  public function execute(Controller $controller, $method, Program $program) {
    if ($controller instanceof HTTPController) {
      $v = new Validator();

      if (!$v->validate($_GET, $controller->query(new Ruleset()))) {
        throw new Exception('Invalid query parameters', 400);
      }
    }
  }

}
