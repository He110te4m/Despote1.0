<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <td>#</td>
            <td>项目名称</td>
            <td>收支情况</td>
            <td>经手人</td>
            <td>时间</td>
        </tr>
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
        require './config.php';
        $conn = mysqli_connect($sql_host, $sql_user, $sql_pwd, $sql_db);
        if (!$conn) {
            echo mysqli_connect_error();
        }
        // 获取记录
        $item = mysqli_query($conn, "select * from `sz_manage`");
        // 获取数据项
        while ($row = mysqli_fetch_array($item)) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['io'] . "</td>";
            echo "<td>" . $row['handle'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
