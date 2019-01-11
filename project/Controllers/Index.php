<?php

namespace Project\Controllers;

use Manix\Brat\Utility\HTTP\HTTPController;
use Project\Views\Pages\IndexView;

class Index extends HTTPController {

  public $page = IndexView::class;

  public function get() {

    return [
        'heading' => $this->t8('common', 'indexh'),
        'paragraph' => $this->t8('common', 'indexp')
    ];
  }

}
