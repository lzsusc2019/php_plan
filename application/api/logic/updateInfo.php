<?php
/**
 * @Copyright(C)2022
 * @Name  updateInfo.php
 * @Author  阿泽
 * @DateTime:  2022/7/8 09:46:54
 * @Description
 * @Class List
 *      1.
 * @Function List
 *   1.
 * @History
 *
 *      阿泽       2022/7/8 09:46:54          1.0                     Create the file for the first time
 */

namespace app\api\logic;

use app\api\model\User;
use think\db\Where;


class updateInfo
{
    public function __constuct()
    {
    }

    public function updatePhone($user_id, $user_Phone)
    {
        $user = new User();
        if ($user->where('user_id', $user_id)->find()) {
            $user->changePhone($user_id, $user_Phone);
            return true;
        } else {
            return false;
        }
    }

    public function updateEmail($user_id, $user_email)
    {
        $user = new User();
        if ($user->where('user_id', $user_id)->find()) {
            $user->changeEmail($user_id, $user_email);
            return true;
        } else {
            return false;
        }
    }

    public function updateAll($user_id, $user_phone, $user_email)
    {
        $user = new User();
        if ($user->where('user_id', $user_id)->find()) {
            $user->changePhone($user_id, $user_phone);
            $user->changeEmail($user_id, $user_email);

            return true;
        } else {
            return false;
        }
    }

}