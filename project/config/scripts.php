<?php

use Manix\Brat\Utility\Scripts\Help;
use Manix\Brat\Utility\Scripts\RunPlugin;
use Manix\Brat\Utility\Scripts\RunSetup;
use Manix\Brat\Utility\Scripts\RunSQL;
use Manix\Brat\Utility\Scripts\Socialize;

return [
    'help' => Help::class,
    'setup' => RunSetup::class,
    'sql' => RunSQL::class,
    'plugin' => RunPlugin::class,
    'socialize' => Socialize::class
];
