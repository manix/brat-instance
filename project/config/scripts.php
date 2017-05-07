<?php

use Manix\Brat\Utility\Scripts\Help;
use Manix\Brat\Utility\Scripts\RunPlugin;
use Manix\Brat\Utility\Scripts\RunSetup;
use Manix\Brat\Utility\Scripts\RunSQL;

return [
    'help' => Help::class,
    'setup' => RunSetup::class,
    'sql' => RunSQL::class,
    'plugin' => RunPlugin::class
];
