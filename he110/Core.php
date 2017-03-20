<?php
/**
 * 核心框架
 * @author: He110
 */

/**
 * 核心框架类
 */
class Core
{
    /**
     * 程序运行主入口
     */
    public function run()
    {
        spl_autoload_register(array($this, 'loadClass'));
        $this->setReporting();
        $this->removeMagicQuotes();
        $this->unregisterGlobals();
        $this->route();
    }

    /**
     * 路由处理
     * URL 样式：abc.com/controllerName/actionName/paramString
     */
    public function route()
    {
        // 初始化变量默认值
        $controllerName = 'index';
        $action         = 'index';
        $param          = array();

        // 获取 PATHINFO
        $url = isset($_GET['url']) ? $_GET['url'] : false;
        if ($url) {
            // 使用 '/' 对 PATHINFO 进行分割处理，保存在数组中
            $urlArray = explode('/', $url);
            // 删除空元素
            $urlArray = array_filter($urlArray);

            // 获取控制器名称
            $controllerName = ucfirst($urlArray[0]);
            // 获取动作
            // 将控制器出队
            array_shift($urlArray);
            // 避免数组为空出现找不到动作错误
            $action = $urlArray ? $urlArray[0] : 'index';

            // 获取 URL 参数
            // 将动作出队
            array_shift($urlArray);
            // 避免参数为空
            $param = $urlArray ? $urlArray : array();
        }

        // 实例化控制器
        $controller = $controllerName . 'Controller';
        $dispath    = new $controller($controllerName, $action);

        // 如果控制器存在，就调用并传参
        if ((int) method_exists($controller, $action)) {
            // 调用 $dispatch 类中的 $action 方法
            call_user_func_array(array($dispath, $action), $param);
        } else {
            exit($controller . '控制器不存在');
        }
    }

    /**
     * 检测开发环境，设置错误处理方式
     */
    public function setReporting()
    {
        error_reporting(E_ALL);
        if (APP_DEBUG === true) {
            ini_set('display_errors', 'On');
        } else {
            ini_set('display_errors', 'On');
            ini_set('log_error', 'On');
            ini_set('error_log', PATH_RUNTIME . 'logs/error.log');
        }
    }

    /**
     * 处理转义字符
     * @param  string $value 待处理的字符串
     * @return string        处理后的字符串
     */
    public function stripSlashesDeep($value)
    {
        // 如果是数组就对数组中每个元素应用本方法
        $value = is_array($value) ? array_map(array($this, 'stripSlashesDeep'), $value) : stripcslashes($value);

        return $value;
    }

    /**
     * 处理 $_GET、$_POST、$_COOKIE、$_SESSION 中的转义，适配高版本 PHP
     * @return array 处理后的数组
     */
    public function removeMagicQuotes()
    {
        if (get_magic_quotes_gpc()) {
            $_GET     = isset($_GET) ? $this->stripSlashesDeep($_GET) : '';
            $_POST    = isset($_POST) ? $this->stripSlashesDeep($_POST) : '';
            $_COOKIE  = isset($_COOKIE) ? $this->stripSlashesDeep($_COOKIE) : '';
            $_SESSION = isset($_SESSION) ? $this->stripSlashesDeep($_SESSION) : '';
        }
    }

    /**
     * 检测自定义全局变量并移除
     */
    public function unregisterGlobals()
    {
        if (ini_get('regeister_globals')) {
            $array = array('_SEESION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
            foreach ($array as $value) {
                foreach ($GLOBALS[$value] as $key => $var) {
                    if ($var === $GLOBALS[$key]) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }

    public static function loadClass($class)
    {
        $frameworks  = PATH_FRAME . $class . '.class.php';
        $controllers = PATH_APP . 'application/controllers/' . $class . '.class.php';
        $models      = PATH_APP . 'application/models/' . $class . '.class.php';

        if (file_exists($frameworks)) {
            // 加载核心类
            include $frameworks;
        } elseif (file_exists($controllers)) {
            // 加载控制器
            include $controllers;
        } elseif (file_exists($model)) {
            // 加载模型
            include $models;
        } else {
            // 错误页面，加载 404
            include PATH_APP . '404.html';
        }
    }
}
