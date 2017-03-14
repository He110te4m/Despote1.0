<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>数智科技</title>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
    <script src="lib/bootstrap/js/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/layer/layer.js"></script>
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
                <li><a href="/home"><small class="glyphicon glyphicon-home"></small>&nbsp;&nbsp;首页</a></li>
                <!-- <li><a href="#">心得笔记</a></li> -->
                <li><a href="/resource"><small class="glyphicon glyphicon-duplicate"></small>&nbsp;&nbsp;资源分享</a></li>
                <?php
                    if (true) {
                        echo '<li><a href="/management"><small class="glyphicon glyphicon-list-alt"></small>&nbsp;&nbsp;物资管理</a></li>';
                    }
                ?>
                <li><a href="/call"><small class="glyphicon glyphicon-envelope"></small>&nbsp;&nbsp;联系我们</a></li>
            </ul>

            <ul class="nav navbar-nav nav-stacked navbar-right">
                <li>
                    <a data-toggle="dropdown" href="#"><small></small>个人中心</a>
                    <ul class="dropdown-menu">
                        <li class="active">
                            <a href="/login"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;登陆</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- 页面导航栏结束 -->
    <div class="container">
        <?php
            require '\core\rotate.class.php';
            $url = \rotate\Rotate::getAddr();
            include "view/$url.php";
            // isset($_GET['request']) ? $avg = $_GET['request'] : $avg = 'home';
            // include "view/$avg.php";
        ?>
    </div>
</body>
</html>
