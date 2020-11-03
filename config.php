<?php
/*
 * 配置项
 * */

namespace mvc;

header("Content-type: text/html; charset=utf-8");
// 时区设置
date_default_timezone_set('PRC'); // 中国时区

class Config
{
    /* 模板统一自动加载函数
     * 返回值是要加载的模板文件
     *  @param $tplName 模板名称
     */
    static function auto_load_tpl($name)
    {
        //自动加载模板
        include 'view/' . $name . '.php';
    }

    // 数据库
    const DB_CONFIG = [
        'charset' => 'utf8',
        'type' => 'mysql',
        'host' => '127.0.0.1',
        'dbname' => 'mvc1',
        'username' => 'root',
        'password' => '123456',
        'pagenum' => '10', // 每页记录数
    ];

    const PARAM = [
        'controller' => '',
    ];
}



