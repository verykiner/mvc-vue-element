<?php
/**
 * 数据库调用类
 */
namespace mvc\Model;

include __DIR__ . '/../config.php';
include 'Query.php';

use mvc\Model\Query;
use mvc\Config;

class DB
{
    private static $db = [];
    public static $pdo = null;

    // 连接数据库
    public static function connection()
    {
        $db = self::$db;
        $dsn = "{$db['type']}:host={$db['host']};dbname={$db['dbname']};charset={$db['charset']}";
        self::$pdo = new \PDO($dsn, $db['username'], $db['password']);
    }

    // 静态重载
    public static function __callStatic($name, $args)
    {
        self::$db = Config::DB_CONFIG;
        self::connection();
        $query = new Query(self::$pdo);
        return call_user_func_array([$query, $name], $args);
    }
}
