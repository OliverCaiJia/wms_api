<?php

use OK\PhalconEnhance\Util\DiUtil;

include __DIR__ . "/../../../vendor/guzzlehttp/guzzle/src/functions_include.php";
include __DIR__ . "/../../../vendor/guzzlehttp/promises/src/functions_include.php";
include __DIR__ . "/../../../vendor/guzzlehttp/psr7/src/functions_include.php";
include __DIR__ . "/../../../vendor/react/promise/src/functions_include.php";


DiUtil::initServices(include __DIR__ . "/../../config/shared/services.php");
DiUtil::initServices(include __DIR__ . "/../../config/api/services.php");