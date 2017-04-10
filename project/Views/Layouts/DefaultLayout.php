<?php

namespace Project\Views\Layouts;

use Manix\Brat\Components\Views\HTML\HTMLDocument;
use Manix\Brat\Utility\Users\Controllers\Login;
use Manix\Brat\Utility\Users\Controllers\Logout;
use Manix\Brat\Utility\Users\Controllers\Register;
use Manix\Brat\Utility\Users\Controllers\Settings\Index as SettingsIndex;
use Manix\Brat\Utility\Users\Models\Auth;
use const SITE_URL;
use function config;
use function html;
use function route;
use function url;

abstract class DefaultLayout extends HTMLDocument {

  public function html() {
    ?>

    <!DOCTYPE html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <?= $this->head() ?>
      </head>
      <body style="padding-top: 56px">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded fixed-top">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="<?= SITE_URL ?>"><?= config('project')['name'] ?></a>

          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
              <!--              <li class="nav-item active">
                              <a class="nav-link" href="#">Home</a>
                            </li>-->
            </ul>
            <ul class="navbar-nav">
              <?php if (Auth::user()): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= route(SettingsIndex::class) ?>">
                    <?= html(Auth::name()) ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= route(Logout::class, ['b' => url()]) ?>">
                    <?= $this->t8('manix/util/users/common', 'logout') ?>
                  </a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= route(Register::class) ?>">
                    <?= $this->t8('manix/util/users/common', 'register') ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= route(Login::class) ?>">
                    <?= $this->t8('manix/util/users/common', 'login') ?>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </nav>

        <?= $this->body() ?>

        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
      </body>
    </html>

    <?php
  }

}
