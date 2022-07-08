<?php
/**
 * @Copyright(C)2022
 * @Name  Regist.php
 * @Author  阿泽
 * @DateTime:  2022/7/8 09:33:38
 * @Description
 * @Class List
 *      1.
 * @Function List
 *   1.
 * @History
 *
 *      阿泽       2022/7/8 09:33:38          1.0                     Create the file for the first time
 */

namespace app\index\controller;

use think\View;
use think\Controller;
use app\index\model\User;

class Regist extends Controller
{
    public function index()
    {
        $view = new View();
        return $view->fetch('regist/index');
    }


    public function regist()
    {
        echo "1";

        //实例化User
        $user = model('User');
        //接收前端表单提交的数据
        $user->user_name = input('post.UserName');
        $user->user_passwd = input('post.UserPasswd');
        $user->user_phone = input('post.UserPhone');
        $user->user_email = input('post.UserEmail');

//        $user->user_name = "xiaowang";
//        $user->user_passwd = "112233";
//        $user->user_phone = "123654987";
//        $user->user_email = "156464841@163.com";

        //进行规则验证
        $result = $this->validate(
            [
                'name' => $user->user_name,
                'password' => $user->user_passwd,
                'email' => $user->user_email,
                'phone' => $user->user_phone,
            ],
            [
                'name' => 'require|max:10',
                'password' => 'require',
                'email' => 'email',
                'phone' => 'require'
            ]);

        if (true !== $result) {
            $this->error($result);
        }

        //写入数据库
        if ($user->save()) {
            return $this->success('注册成功');
        } else {
            return $this->success('注册失败');
        }
    }
}