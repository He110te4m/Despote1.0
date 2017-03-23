<?php
/**
 * @todo: 默认 Controller
 * @author: He110
 */

// 默认控制器
class IndexController extends Controller
{
    public function index()
    {
        $this->assign('title', '数字科技 - 首页');
        $this->assign('content', '欢迎开发He110PHP!');
        $this->render();
    }
}
