<?php

use Phalcon\Mvc\Dispatcher\Exception as DispatcherException;

include __DIR__ . "/shared.php";

main();

function main() {
    $dispatcher = initDispatcher();

    try {
        $dispatcher->dispatch();
    } catch (DispatcherException $e) {
        header("HTTP/1.0 404 Not Found");
        echo $e->getMessage();
    } catch (\Exception $e) {
        header("HTTP/1.0 500 Internal Server Error");
        echo $e->getMessage();
    }
}