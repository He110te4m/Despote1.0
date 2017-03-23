<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="../application/lib/bootstrap/css/bootstrap.min.css">
    <script src="../application/lib/bootstrap/js/jquery.min.js"></script>
    <script src="../application/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../application/lib/layer/layer.js"></script>
</head>

<body style="padding-top: 70px;">
    <!-- 页面导航栏开始 -->
    <div class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 10px; border-right: 1px solid #ccc; box-shadow: 1px 0 2px rgba(0, 0, 0, .3)">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <small class="glyphicon glyphicon-fire"></small>&nbsp;数智科技
                </div>
            </div>

            <!-- 导航条内容：首页|物资查询|财务公示|心得笔记|资源分享 -->
            <ul class="nav navbar-nav nav-stacked">
                <!-- 第一个导航按钮样式有 BUG，使用虚列避开 BUG -->
                <li><a href="#"></a></li>
                <li><a href="/"><small class="glyphicon glyphicon-home"></small>&nbsp;&nbsp;首页</a></li>
                <!-- <li><a href="#">心得笔记</a></li> -->
                <li><a href="/resource/index"><small class="glyphicon glyphicon-duplicate"></small>&nbsp;&nbsp;资源分享</a></li>
                <?php
                    if (isset($_COOKIE['sid'])) {
                        echo '<li><a href="/finance/index"><small class="glyphicon glyphicon-list-alt"></small>&nbsp;&nbsp;财务管理</a></li>';
                    }
                ?>
                <li><a href="/call/index"><small class="glyphicon glyphicon-envelope"></small>&nbsp;&nbsp;联系我们</a></li>
            </ul>

            <ul class="nav navbar-nav nav-stacked navbar-right">
                <li>
                    <?php
                        if (isset($_COOKIE['sid'])) {
                            echo '<a data-toggle="dropdown" href="#"><small>Welcome</small>&nbsp;&nbsp;' . $_COOKIE['name'] . '</a>';
                            echo '<ul class="dropdown-menu">';
                            echo '<li><a href="/user/index"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;个人中心</a></li>';
                            echo '<li><a href="/user/setting"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;设置</a></li>';
                            echo '<li class="divider"></li>';
                            echo '<li><a href="/user/layout"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;登出</a></li>';
                            echo '</ul>';
                        } else {
                            echo '<a href="/login">登陆</a>';
                        }
                    ?>
                </li>
            </ul>
        </div>
    </div>
    <!-- 页面导航栏结束 -->
    <div class="container">
