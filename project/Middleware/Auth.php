<?php

namespace Project\Middleware;

use Manix\Brat\Components\Controller;
use Manix\Brat\Components\Errors\Exception;
use Manix\Brat\Components\Middleware;
use Manix\Brat\Components\Program;
use Manix\Brat\Utility\Users\Models\Auth as AuthFacade;
use Project\Controllers\Users\Login;

class Auth implements Middleware {

  public function execute(Controller $controller, $method, Program $program) {
    AuthFacade::required();
  }

}
