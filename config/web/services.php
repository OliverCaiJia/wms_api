<?php

use OK\PhalconEnhance\Constant\BuiltinKey;
use OK\PhalconEnhance\Constant\BuiltinServiceName;
use OK\PhalconEnhance\Constant\ConfigValue;
use Phalcon\Cache\Backend\Redis as RedisCacheBackend;
use Phalcon\Cache\Frontend\Data as CacheFrontend;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Events\Manager;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Text;
use WmsApi\Lib\Constant\ServiceName;

/** @noinspection SenselessCommaInArrayDefinitionInspection */
return [
    [
        BuiltinServiceName::ROUTER,
        function() {
            $router = new Router();
            $router->removeExtraSlashes(true);
            $router->setUriSource(Router::URI_SOURCE_SERVER_REQUEST_URI);
            return $router;
        }
    ],
    [
        BuiltinServiceName::DISPATCHER,
        function() {
            $eventsManager = new Manager();
            /** @noinspection PhpUnusedParameterInspection */
            $eventsManager->attach("dispatch:beforeDispatchLoop", function($event, Dispatcher $dispatcher) {
                $dispatcher->setActionName(Text::camelize($dispatcher->getActionName()));
            });
            $dispatcher = new Dispatcher();
            $dispatcher->setEventsManager($eventsManager);
            $dispatcher->setDefaultNamespace("WmsApi\\App\\Web\\Controller");
            return $dispatcher;
        }
    ],
    [
        BuiltinServiceName::DEFAULT_MODELS_CACHE,
        function() {
            $config = include __DIR__ . "/redis.php";
            $frontCache = new CacheFrontend([
                BuiltinKey::CACHE_LIFETIME => 86400
            ]);
            return new RedisCacheBackend($frontCache, [
                BuiltinKey::CACHE_HOST          => $config[BuiltinKey::CACHE_HOST],
                BuiltinKey::CACHE_PORT          => $config[BuiltinKey::CACHE_PORT],
                BuiltinKey::CACHE_AUTH          => $config[BuiltinKey::CACHE_AUTH],
                BuiltinKey::CACHE_KEY_PREFIX    => "models_cache_",
                BuiltinKey::CACHE_PERSISTENT    => false,
                BuiltinKey::CACHE_INDEX         => 0,
                BuiltinKey::CACHE_STATS_KEY     => null
            ]);
        }
    ],
    [
        ServiceName::DB_WMS,
        function() {
            $config = include __DIR__ . "/db.php";
            return new DbAdapter([
                BuiltinKey::DB_HOST     => $config[BuiltinKey::DB_HOST],
                BuiltinKey::DB_USERNAME => $config[BuiltinKey::DB_USERNAME],
                BuiltinKey::DB_PASSWORD => $config[BuiltinKey::DB_PASSWORD],
                BuiltinKey::DB_NAME     => $config[BuiltinKey::DB_NAME],
                BuiltinKey::DB_CHARSET  => ConfigValue::DB_CHARSET_UTF8
            ]);
        }
    ]
];