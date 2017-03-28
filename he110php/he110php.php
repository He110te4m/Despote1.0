<?php
/**
 * @todo: 实例化核心类、定义常量、包含文件
 * @author: He110
 */

// 初始化常量
// 框架目录
defined('FRAME_PATH') or define('FRAME_PATH', __DIR__ . '/');
// 应用目录
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . '/');
// 是否为 Debug 模式
defined('APP_DEBUG') or define('APP_DEBUG', false);
// 配置目录
defined('CONFIG_PATH') or define('CONFIG_PATH', APP_PATH . 'config/');
// 运行目录
defined('RUNTIME_PATH') or define('RUNTIME_PATH', APP_PATH . 'runtime/');
// 第三方库
defined('LIB_PATH') or define('LIB_PATH', APP_URL . 'application/lib/');

// 包含配置文件
require APP_PATH . 'config/config.php';

//包含核心框架类
require FRAME_PATH . 'Core.php';

// 实例化核心类
$fast = new Core;
$fast->run();
