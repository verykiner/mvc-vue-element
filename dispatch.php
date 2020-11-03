<?php
/*
 * 分配器
 * */

namespace mvc;
include 'config.php';
use mvc\Config;

// 自动加载类
// 先暂时不用，后面优化再用
// spl_autoload_register(function ($className) {
//     $path = str_replace('\\', DIRECTORY_SEPARATOR, $className);
//     $path = ltrim($path, 'mvc\\');
//     $path = __DIR__ . '/' . $path . '.php';
//     if (file_exists($path)) include $path;
// });

$method = $_GET['m'] ? $_GET['m'] : 'director';

Config::auto_load_tpl($method );
