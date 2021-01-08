#!/usr/bin/env php

<?php

use Brain\Games\Engine\Engine;
use Brain\Games\Games\Even;
use Brain\Games\Cli;

require_once __DIR__ .'/../vendor/autoload.php';

$engine = new Engine(new Even, new Cli);

$engine->run();



