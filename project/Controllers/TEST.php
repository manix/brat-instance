<?php

namespace Project\Controllers;

use Manix\Brat\Components\Forms\Form;
use Manix\Brat\Components\Validation\Ruleset;
use Manix\Brat\Helpers\FormEndpoint;
use Manix\Brat\Utility\HTTP\HTTPController;

class TEST extends HTTPController {

  use FormEndpoint;

  protected function constructForm(Form $form): Form {
    $form->add('egode', 'text');
    $form->add('send', 'submit', 'Send');
    return $form;
  }

  protected function constructRules(Ruleset $rules): Ruleset {
    return $rules;
  }

}
