<?php
/**
 * 默认首页
 * @author: He110
 */
class index
{
    public function welcome()
    {
        include PATH_ROOT . '/view/head.php';
        include PATH_ROOT . '/view/home.php';
        include PATH_ROOT . '/view/foot.php';
    }
}
