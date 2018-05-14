<?php
use WmsApi\Lib\Constant\ServiceName;
use Phalcon\Logger\Adapter\File as FileLogger;

return [
    [
        ServiceName::LOGGER_WMS_API,
        function() {
            $logFile = include __DIR__ . "/wms_api_logger.php";
            return new FileLogger($logFile);
        }
    ]
];
            