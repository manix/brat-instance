<?php

namespace Project\Views\Pages;

use Project\Views\Layouts\DefaultLayout;

class IndexView extends DefaultLayout {

  public $title = 'Hello from index.';

  public function body() {
    ?>
    <style>
      .vertical-center {
        min-height: 66%;
        min-height: 66vh;

        display: flex;
        align-items: center;
        text-align: center;
      }
    </style>
    <div class="jumbotron vertical-center mb-0" style="background-color: #fff">
      <div class="container">
        <h1><?= $this->data['heading'] ?></h1>
        <p><?= $this->data['paragraph'] ?></p>
      </div>
    </div>
    <?php
  }

}
