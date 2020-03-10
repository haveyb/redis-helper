# PHP 使用 redis 辅助包

####1、说明

很多人对 redis 里的很多方法不是很熟悉，可能就会导致使用不恰当的方法去完成一个功能。

鉴于此，写了这个composer包，拿来即用。其中，对redis的所有方法进行了分类、封装和注释，使能够非常清晰的看到每个方法的作用。

使用方法很简单，只要正确的composer 自动加载，即可使用。

　　

####2、配置：

在 src / RedisInstance.php  中配置好下面几个参数即可。

```
define('REDIS_HOST', '127.0.0.1'); 
define('REDIS_PASSWORD', '');
define('REDIS_PORT', 6379);
```

　　

###3、使用示例：

```php
RedisHelper::set('age', 18)
```

```php
RedisHelper::del(['city', 'username', 'sex'])
```

```php
RedisHelper::rename('city', 'area')
```

　　

####4、部分源代码

可以很清晰的看到每个方法的作用

```
/**
     * 获取key所储存的字符串值的长度（当key储存的不是字符串值时，返回false）
     *
     * @param $key
     * @return int
     * RedisHelper::strLen('age')
     */
    public static function strLen($key)
    {
        return RedisInstance::get()->strLen($key);
    }

    /**
     * 返回存储在指定key中字符串的子字符串。字符串的截取范围由start和end两个偏移量决定(包括start和end在内)
     *
     * @param string $key
     * @param int $start
     * @param int $end
     * @return string
     * RedisHelper::set('website', 'https://www.haveyb.com');
     * RedisHelper::getRange('website', 1, 5) // ttps:
     */
    public static function getRange($key, $start, $end)
    {
        return RedisInstance::get()->getRange($key, $start, $end);
    }
```

　　

https://www.haveyb.com