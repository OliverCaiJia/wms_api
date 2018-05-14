<?php
use OK\PhalconEnhance\Constant\BuiltinKey;
use OK\PhalconEnhance\Constant\ConfigValue;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Queue\Beanstalk;
use WmsApi\Lib\Constant\ServiceName;

return [
    [
        ServiceName::DB_WMS,
        function() {
            $config = include __DIR__ . "/db.php";
            $connection = new DbAdapter([
                BuiltinKey::DB_HOST     => $config[BuiltinKey::DB_HOST],
                BuiltinKey::DB_USERNAME => $config[BuiltinKey::DB_USERNAME],
                BuiltinKey::DB_PASSWORD => $config[BuiltinKey::DB_PASSWORD],
                BuiltinKey::DB_NAME     => $config[BuiltinKey::DB_NAME],
                BuiltinKey::DB_CHARSET  => ConfigValue::DB_CHARSET_UTF8
            ]);
            return $connection;
        }
    ],
    [
        ServiceName::MQ_WMS,
        function() {
            $config = include __DIR__ . "/mq.php";
            return new Beanstalk($config);
        }
    ]
];