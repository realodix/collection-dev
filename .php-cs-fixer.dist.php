<?php

use Realodix\Relax\Config;

$localRules = [
    // ...
];

return Config::create('relax')
    ->setRules($localRules)
    ->setCacheFile(__DIR__.'/.tmp/.php-cs-fixer.cache');
