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
/**
* 分页类
*/
class Page
{
    // 数据库中总记录数
    private $sum;
    // 每页显示数目
    private $listRows;
    private $limit;
    private $uri;
    // 页数
    private $pageNum;
    function __construct($sum, $listRows = 10, $pa = "")
    {
        # code...
    }
}
?>