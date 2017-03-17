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
 *         佛祖保佑       永无BUG        阿弥陀佛
 */

namespace core;

/**
 * mysqli 数据库操作类
 */
class mysqli
{
    private static $conn     = null;
    private static $errorLog = "";

    /**
     * 释放 mysqli 连接
     */
    public static function closeDB()
    {
        mysqli_close($conn);
    }

    /**
     * 尝试连接数据库，失败返回错误信息，成功返回 true
     * @return string 错误信息或者 true
     */
    public static function connectDB()
    {
        require '../config.php';
        if (!self::$conn) {
            self::$conn = mysqli_connect($sql_host, $sql_user, $sql_pwd, $sql_db);
        }

        self::$errorLog = mysqli_connect_error();

        return self::$conn ? true : false;
    }

    public static function getData($table, $condition = "")
    {
        if ($conn) {
        $sql = $condition === "" ? 'select * from ' . $table : 'select * from ' . $table . ' where '.$condition;

        return mysqli_query($sql);
        } else {
            return '数据库未连接';
        }
    }
}
