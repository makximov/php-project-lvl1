#!/usr/bin/env php

<?php

use Brain\Games\Engine\Engine;
use Brain\Games\Games\Gcd;
use Brain\Games\Cli;

require_once __DIR__ .'/../vendor/autoload.php';

$engine = new Engine(new Gcd(), new Cli);

$engine->run();



