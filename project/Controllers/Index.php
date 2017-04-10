<?php

namespace Project\Controllers;

use Manix\Brat\Components\Controller;
use Project\Views\Pages\IndexView;

class Index extends Controller {

  public $page = IndexView::class;

  public function get() {
    \Manix\Brat\Utility\Users\Models\Auth::required();
    return [
        'heading' => $this->t8('common', 'indexh'),
        'paragraph' => $this->t8('common', 'indexp')
    ];
  }

}
