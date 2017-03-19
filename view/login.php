<div style="position: fixed; top: 60%; left: 50%; width:50%; height: 50%; -webkit-transform: translateX(-50%) translateY(-50%); -moz-transform: translateX(-50%) translateY(-50%); -ms-transform: translateX(-50%) translateY(-50%); transform: translateX(-50%) translateY(-50%);">
    <div class="col-sm-8 col-sm-offset-2">
        <div style="padding: 50px; border: 1px blue solid;">
            <?php
            /**
             *                    _ooOoo_
             *                   o8888888o
             *                   88" . "88
             *                   (| -_- |)
             *                   O\  =  /O
             *                ____/`---'\____
             *              .'  \\|     |//  `.
             *             /  \\|||  :  |||//  \
             *            /  _||||| -:- |||||-  \
             *            |   | \\\  -  /// |   |
             *            | \_|  ''\---/''  |   |
             *            \  .-\__  `-`  ___/-. /
             *          ___`. .'  /--.--\  `. . __
             *       ."" '<  `.___\_<|>_/___.'  >'"".
             *      | | :  `- \`.;`\ _ /`;.`/ - ` : | |
             *      \  \ `-.   \_ __\ /__ _/   .-` /  /
             * ======`-.____`-.___\_____/___.-`____.-'======
             *                    `=---='
             * ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
             *         佛祖保佑       永无BUG        阿弥陀佛
             */
            if (isset($_COOKIE['sid'])) {
                header('location: /user');
            }
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // 获取数据库配置
                require 'config.php';
                // 连接数据库
                $conn = mysqli_connect($sql_host, $sql_user, $sql_pwd, $sql_db);
                if (!$conn) {
                    echo mysqli_connect_error();
                }
                // 获取记录
                $item = mysqli_query($conn, "select * from `sz_user` where `username` = '$username'");
                // 获取数据项
                $row = mysqli_fetch_assoc($item);
                if ($row['password'] == $password) {
                    // 验证通过
                    $sid = md5($row['Id'] . time());
                    mysqli_query($conn, "update sz_user set sid = '$sid' where  username = '$username'");
                    setcookie('sid', $sid, time() + 60 * 60 * 24 * 30);
                    setcookie('name', $row['name'], time() + 60 * 60 * 24 * 30);
                    header('Location: /user');
                } else {
                    // 验证失败
                    echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only"></span>&nbsp;&nbsp;账号或密码有误，请重新填写</div>';
                }
                mysqli_close($conn);
            }
            ?>
            <form class="form-horizontal" action="/login" method="post">
                <div class="form-group">
                    <label class="control-label col-md-3" for="username">用户名</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="username" placeholder="用户名">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="password">密码</label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" name="password" placeholder="密码">
                    </div>
                </div>
                <div class="col-sm-offset-3">
                    <button type="submit" class="btn btn-primary btn-lg">登录</button>
                    <button type="submit" class="btn btn-primary btn-lg">忘记密码</button>
                </div>
            </form>
        </div>
    </div>
</div>
