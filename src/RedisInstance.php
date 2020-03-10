<?php
declare(strict_types = 1);

namespace haveyb\RedisHelper;

define('REDIS_HOST', '127.0.0.1');
define('REDIS_PASSWORD', '');
define('REDIS_PORT', 6379);

class RedisInstance
{
    private static $instance = null;

    private function __construct(){}

    private function __clone(){}

    public static function get()
    {
        if (is_null(self::$instance)) {
            $redis = new \Redis();
            $redis->connect(REDIS_HOST, REDIS_PORT);
            // $redis->auth(REDIS_PASSWORD);
            self::$instance = $redis;
        }
        return self::$instance;
    }
}