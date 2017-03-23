<?php
/**
 * @todo: View 基类
 * @author: He110
 */

/**
 * 视图基类
 */
class View
{
    protected $variables = array();
    protected $_controller;
    protected $_action;

    public function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action     = $action;
    }

    // 分配变量
    public function assign($name, $value)
    {
        $this->variables[$name] = $value;
    }

    // 渲染显示
    public function render()
    {
        extract($this->variables);
        $defaultHeader = APP_PATH . 'application/views/index/header.php';
        $defaultFooter = APP_PATH . 'application/views/index/footer.php';
        $defaultLayout = APP_PATH . 'application/views/index/layout.php';

        $controllerHeader = APP_PATH . 'application/views/' . $this->_controller . '/header.php';
        $controllerFooter = APP_PATH . 'application/views/' . $this->_controller . '/footer.php';
        $controllerLayout = APP_PATH . 'application/views/' . $this->_controller . '/' . $this->_action . '.php';

        // 页头文件
        // if (file_exists($controllerHeader)) {
        //     include $controllerHeader;
        // } else {
        //     include $defaultHeader;
        // }
        include file_exists($controllerHeader) ? $controllerHeader : $defaultHeader;

        // 页内容文件
        // if (file_exists($controllerLayout)) {
        //     include $controllerLayout;
        // } else {
        //     include $defaultLayout;
        // }
        include file_exists($controllerLayout) ? $controllerLayout : $defaultLayout;

        // 页脚文件
        // if (file_exists($controllerFooter)) {
        //     include $controllerFooter;
        // } else {
        //     include $defaultFooter;
        // }
        include file_exists($controllerFooter) ? $controllerFooter : $defaultFooter;
    }
}
