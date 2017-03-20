<?php

class IndexController extends Controller
{
    public function index()
    {
        $this->assign('title', '这是首页');
        $this->assign('content', '欢迎开发He110PHP!');
        $this->render();
    }
}
