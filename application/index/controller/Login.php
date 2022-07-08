<?php
/**
 * @Copyright(C)2022
 * @Name  Login.php
 * @Author  阿泽
 * @DateTime:  2022/7/8 09:33:28
 * @Description
 * @Class List
 *      1.
 * @Function List
 *   1.
 * @History
 *
 *      阿泽       2022/7/8 09:33:28          1.0                     Create the file for the first time
 */

namespace app\index\controller;

use think\View;
use think\Controller;
use app\index\model\User;

class login extends Controller
{
    public function index()
    {
        $view = new View();
        return $view->fetch('login/index');
    }

    //没有跟表单连接
    public function login($user_name = '', $user_passwd = '')
    {
        //var_dump($user_name);die();
        $user = User::get([
            'user_name' => $user_name,
            'user_passwd' => $user_passwd
        ]);
        if ($user) {
            echo '登录成功';
        } else {
            return $this->error('登录失败');
        }
    }
}