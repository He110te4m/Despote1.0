<div class="rol">
    <div class="col-md-2" style="padding-right: 0">
        <!-- 用户中心导航 -->
        <div class="panel-group" id="menu">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <a href="#usermenu" class="panel-title" data-parent="#menu" data-toggle="collapse">用户中心</a>
                </div>
                <div class="panel-collapse collapse in" id="usermenu">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="\user-info">个人资料</a></li>
                            <?php
                            /**
                             *                    _ooOoo_
                             *                   o8888888o
                             *                   88" . "88
                             *                   (| -_- |)
                             *                   O\  =  /O
                             *                ____/`---'\____
                             *              .'  \|     |//  `.
                             *             /  \|||  :  |||//  \
                             *            /  _||||| -:- |||||-  \
                             *            |   | \\  -  /// |   |
                             *            | \_|  ''\---/''  |   |
                             *            \  .-\__  `-`  ___/-. /
                             *          ___`. .'  /--.--\  `. . __
                             *       ."" '<  `.___\_<|>_/___.'  >'"".
                             *      | | :  `- \`.;`\ _ /`;.`/ - ` : | |
                             *      \  \ `-.   \_ __\ /__ _/   .-` /  /
                             * ======`-.____`-.___\_____/___.-`____.-'======
                             *                    `=---='
                             * ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                             *     佛祖保佑       永无BUG        阿弥陀佛
                             */
                            if (!isset($_COOKIE['sid'])) {
                                header('location: /login');
                            }
                            if (isset($_COOKIE['sid'])) {
                                require 'config.php';
                                $conn = mysqli_connect($sql_host, $sql_user, $sql_pwd, $sql_db);
                                $item = mysqli_query($conn, "select * from `sz_user` where `sid` = '" . $_COOKIE['sid'] . "'");
                                $row  = mysqli_fetch_assoc($item);

                                if ($row['is_admin']) {
                                    echo '<li><a href="/user-add">用户添加</a></li>';
                                    echo '<li><a href="/user-del">用户删除</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 物资管理 -->
            <?php
                if($row['is_admin']) {
                    echo '<div class="panel panel-info">';
                    echo '<div class="panel-heading">';
                    echo '<a href="#managemenu" class="panel-title" data-parent="#menu" data-toggle="collapse">物资管理</a>';
                    echo '</div>';
                    echo '<div class="panel-collapse collapse" id="managemenu">';
                    echo '<div class="panel-body">';
                    echo '<ul class="nav nav-pills nav-stacked">';
                    echo '<li><a href="javascript:getContent(\'/manage-add\')">增加记录</a></li>';
                    echo '<li><a href="javascript:getContent(\'/manage-admin\')">记录管理</a></li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
            <!-- 文章导航 -->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <a href="#articlemenu" class="panel-title" data-parent="#menu" data-toggle="collapse">文章管理</a>
                </div>
                <div class="panel-collapse collapse" id="articlemenu">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="/article-add">编写文章</a></li>
                            <li><a href="/article-admin">文章管理</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 项目导航 -->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <a href="#projectmenu" class="panel-title" data-parent="#menu" data-toggle="collapse">项目管理</a>
                </div>
                <div class="panel-collapse collapse" id="projectmenu">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="/project-add">发起项目</a></li>
                            <li><a href="/project-mine">我的项目</a></li>
                            <li><a href="/project-all">所有项目</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content"></div>
</div>
<script type="text/javascript">
    function getContent(url) {
        var xhr = new XMLHttpRequest();
        xhr.open('get', url);
        xhr.send(null);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                document.getElementById('content').innerHTML = xhr.responseText;
            }
        }
    }
</script>
<?php
    mysqli_close($conn);
?>
