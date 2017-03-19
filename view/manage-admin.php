<div class="col-md-10">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <tr style='text-align: center;'>
                <td>#</td>
                <td>项目名称</td>
                <td>收支情况</td>
                <td>经手人</td>
                <td>日期</td>
                <td>操作</td>
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
                echo "<tr style='text-align: center;'>";
                echo "<td>" . $row['Id'] . "</td>";
                echo "<td>" . $row['item'] . "</td>";
                echo "<td>" . $row['io'] . "</td>";
                echo "<td>" . $row['itemname'] . "</td>";
                echo "<td>" . $row['add_date'] . "</td>";
                echo '<td><button class="btn btn-info btn-xs" name="handle">删除</button></td>';
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <div id="test"></div>
</div>
<script type="text/javascript">
    var btns =$('button');
    console.log(btns);
    $.each(btns, function(index){
        $(this).click(function(){
            var s = index + 1;
            document.getElementById('test').innerHTML=document.getElementById('test').innerHTML+"我是按钮"+s+"\t";
        })
   });
</script>
