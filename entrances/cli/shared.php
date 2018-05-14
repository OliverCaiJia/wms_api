<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/24
 * Time: 上午10:10
 */

use OK\PhalconEnhance\Constant\BuiltinKey;
use OK\PhalconEnhance\Util\DiUtil;
use OK\Util\ColourTermUtil;
use Phalcon\Di;
use Phalcon\Cli\Console;
use Phalcon\Di\FactoryDefault\Cli;
use Phalcon\Loader;

/**
 * @param string $namespace
 */
function main($namespace) {
    $loader = new Loader();
    $loader->registerNamespaces(
        include __DIR__ . "/../../config/shared/namespace.php"
    )->register();


    // Create a console application
    $console = new Console();
    $di = new Cli();
    Di::setDefault($di);
    $console->setDI($di);

    //wms
    DiUtil::initServices(include __DIR__ . "/../../config/shared/services.php");
    DiUtil::initServices(include __DIR__ . "/../../config/cli/services.php");

    /**
     * Process the console arguments
     */
    $arguments = [];
    $arguments[BuiltinKey::CLI_TASK] = "WmsApi\\App\\Cli\\Task\\" . $namespace . "\\" . ucfirst($_SERVER["argv"][1]);
    if (count($_SERVER["argv"]) >= 3) {
        $arguments[BuiltinKey::CLI_ACTION] = $_SERVER["argv"][2];
    }
    if (count($_SERVER["argv"]) >= 4) {
        unset($_SERVER["argv"][0], $_SERVER["argv"][1], $_SERVER["argv"][2]);
        foreach ($_SERVER["argv"] as $k => $v) {
            $arguments[BuiltinKey::CLI_PARAMS][] = $v;
        }
    }

    try {
        // Handle incoming arguments
        $console->handle($arguments);
    } catch (\Exception $e) {
        echo "\n", ColourTermUtil::error($e->getMessage());
        echo "\n", "File: ", $e->getFile(), "\n", "Line: ", $e->getLine(), "\n";
        foreach ($e->getTrace() as $trace) {
            unset($trace["args"]);
            /** @noinspection ForgottenDebugOutputInspection */
            print_r($trace);
        }
        exit(255);
    }
}