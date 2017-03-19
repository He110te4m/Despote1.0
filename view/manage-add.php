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
// echo isset($_POST['item'])?'':'item';
// echo '<br>';
// echo isset($_POST['io'])?'':'io';
// echo '<br>';
// echo isset($_POST['itemname'])?'':'itemname';
// echo '<br>';
// echo isset($_POST['add_date'])?'':'add_date';
if (isset($_POST['item']) && isset($_POST['io']) && isset($_POST['itemname']) && isset($_POST['add_date'])) {
    require './config.php';
    $conn = mysqli_connect($sql_host, $sql_user, $sql_pwd, $sql_db);
    if (!$conn) {
        echo mysqli_connect_error();
    }
    $item = $_POST['item'];
    $io   = $_POST['io'];
    $name = $_POST['itemname'];
    $date = $_POST['add_date'];
    $sql  = "insert into `sz_manage`(item, io, itemname, add_date)values('$item', '$io', '$name', '$date')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
?>
<div class="col-md-10" style="padding-top: 80px;">
    <iframe name="form_hidden" style="display: none;"></iframe>
    <form action="/manage-add" class="form-horizontal" method="POST" target="form_hidden">
        <div class="form-group">
            <label for="item" class="control-label col-md-3">项目名称：</label>
            <div class="col-md-9">
                <input type="text" name="item" class="form-control" placeholder="支出/收入状况">
            </div>
        </div>
        <div class="form-group">
            <label for="io" class="control-label col-md-3">收支情况：</label>
            <div class="col-md-9">
                <input type="text" name="io" class="form-control" placeholder="支出200">
            </div>
        </div>
        <div class="form-group">
            <label for="itemname" class="control-label col-md-3">经手人：</label>
            <div class="col-md-9">
                <input type="text" name="itemname" class="form-control" placeholder="请输入经手人">
            </div>
        </div>
        <div class="form-group">
            <label for="add_date" class="control-label col-md-3">日期：</label>
            <div class="col-md-9">
                <input type="text" name="add_date" class="form-control" placeholder="2017-03-18">
            </div>
        </div>
        <div class="col-md-6 col-md-offset-6">
            <button class="btn btn-info btn-lg" type="submit" onclick="alert('添加成功');">添加</button>
        </div>
    </form>
</div>
