<?php

namespace Project\Controllers;

use Manix\Brat\Components\Controller;
use Project\Views\Layouts\LayoutView;
use Project\Views\Pages\IndexView;

class Index extends Controller {

    public $page = IndexView::class;
    public $layout = LayoutView::class;

    public function get() {

        return [
            'who' => 'World'
        ];
    }

}
