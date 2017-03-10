<?php

namespace Project\Views\Pages;

use Project\Views\Layouts\LayoutView;

class IndexView extends LayoutView {

    public $title = 'Hello from index.';

    public function body() {
        ?>
        <style>
            .vertical-center {
                min-height: 100%;
                min-height: 100vh;

                display: flex;
                align-items: center;
                text-align: center;
            }
        </style>
        <div class="jumbotron vertical-center">
            <div class="container">
                <h1><?= $this->data['heading'] ?></h1>
                <p><?= $this->data['paragraph'] ?></p>
            </div>
        </div>
        <?php
    }

}
