<?php
/**
 * @Copyright(C)2022
 * @Name  User.php
 * @Author  阿泽
 * @DateTime:  2022/7/8 09:43:58
 * @Description
 * @Class List
 *      1.
 * @Function List
 *   1.
 * @History
 *
 *      阿泽       2022/7/8 09:43:58          1.0                     Create the file for the first time
 */

namespace app\api\model;

use think\Db;
use think\Model;

class User extends Model
{
    protected $pk = 'user_id';

    protected $table = 'php_task';

    protected $connection = [
        // 数据库类型
        'type' => 'mysql',
        // 服务器地址
        'hostname' => '127.0.0.1',
        // 数据库名
        'database' => 'test',
        // 用户名
        'username' => 'root',
        // 密码
        'password' => 'root',
    ];


    public function getAllInfo()
    {
        $result = Db::table('php_task')->select();
        return $result;
    }

    public function changePhone($user_id, $user_phone)
    {
        Db::table('php_task')->where('user_id', $user_id)->update(['user_phone' => $user_phone]);
    }

    public function changeEmail($user_id, $user_email)
    {
        Db::table('php_task')->where('user_id', $user_id)->update(['user_email' => $user_email]);
    }

}