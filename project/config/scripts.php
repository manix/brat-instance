<?php

use Manix\Brat\Utility\Scripts\Help;
use Manix\Brat\Utility\Scripts\RunSQL;
use Manix\Brat\Utility\Scripts\RunPlugin;

return [
    'sql' => RunSQL::class,
    'help' => Help::class,
    'plugin' => RunPlugin::class
];
