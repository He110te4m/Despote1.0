<?php
/**
 * 路由转发
 * @author: He110
 */
// 定义根目录
defined('PATH_ROOT') or define('PATH_ROOT', __DIR__);
defined('PATH_LIB') or define('PATH_LIB', 'lib');

// 获得请求地址
$root    = $_SERVER['SCRIPT_NAME'];
$request = $_SERVER['REQUEST_URI'];

$uri = array();

// 获得 index.php 后面的地址
$url = trim(str_replace($root, '', $request), '/');

// 如果为空，则是访问根地址
if (empty($url)) {
    // 默认控制器和默认方法
    $class = 'index';
    $func  = 'welcome';
} else {
    $uri = explode('/', $url);

    // 如果 function 为空 则默认访问 index
    if (count($uri) < 2) {
        $class = $uri[0];
        $func  = 'index';
    } else {
        $class = $uri[0];
        $func  = $uri[1];
    }
}

// 把class加载进来
include PATH_ROOT . '/' . 'controllers/' . $class . '.php';

// 实例化
$obj = new $class;

call_user_func_array(
    // 调用内部function
    array($obj, $func),
    // 传递参数
    array_slice($uri, 2)
);
