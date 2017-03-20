<?php
/**
 * 预定义常量、包含配置文件、包含核心框架类、实例化内核
 * @author: He110
 */

// 初始化常量
defined('PATH_FRAME') or define('PATH_FRAME', __DIR__ . '/');
defined('PATH_APP') or define('PATH_APP', dirname($_SERVER['SCRIPT_FILENAME']) . '/');
defined('APP_DEBUG') or define('CONFIG_PATH', ture);
defined('PATH_CONFIG') or define('PATH_CONFIG', PATH_APP . 'config/');
defined('PATH_RUNTIME') or define('PATH_RUNTIME', PATH_APP . 'runtime/');

// 包含配置文件
require PATH_CONFIG . 'config.php';

// 包含核心框架类
require PATH_FRAME.'Core.php';

// 实例化核心类
$he110 = new Core;
$he110->run();
