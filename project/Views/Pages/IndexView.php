<?php

namespace Project\Views\Pages;

use Manix\Brat\Components\Views\HTML\View;

class IndexView extends View {

    public $title = 'Hello from index.';

    public function html() {
        ?>
        <h1>Hello <?= $this->data['who'] ?>!</h1>
        <?php
    }

}
