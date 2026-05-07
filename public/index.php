<?php

// ini_set('memory_limit', '255M');
// echo ini_get('memory_limit');
// phpinfo();

include_once __DIR__ . '/../src/App/functions.php';

$app = require_once __DIR__ . '/../src/App/bootstrap.php';

$app->run();
