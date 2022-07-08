<?php
/**
 * @Copyright(C)2022
 * @Name  userContact.php
 * @Author  阿泽
 * @DateTime:  2022/7/8 09:43:16
 * @Description
 * @Class List
 *      1.
 * @Function List
 *   1.
 * @History
 *
 *      阿泽       2022/7/8 09:43:16          1.0                     Create the file for the first time
 */


namespace app\api\controller;

use think\Controller;
use app\api\model\User;

class userContact extends Controller
{
    public function getInfo()
    {
        $model = new User;
        $data = $model->getAllInfo();
        if ($data) {
            $code = 200;
        } else {
            $code = 400;
        }
        $data = [
            'code' => $code,
            'data' => $data,
        ];

        return json($data);
    }
}