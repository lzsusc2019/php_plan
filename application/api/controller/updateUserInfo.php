<?php
/**
 * @Copyright(C)2022
 * @Name  updateUserInfo.php
 * @Author  阿泽
 * @DateTime:  2022/7/8 09:47:19
 * @Description
 * @Class List
 *      1.
 * @Function List
 *   1.
 * @History
 *
 *      阿泽       2022/7/8 09:47:19          1.0                     Create the file for the first time
 */

namespace app\api\controller;


use app\api\logic\updateInfo;
use think\Controller;

class updateUserInfo extends Controller
{
    public function update($user_id) {
        $logic = new updateInfo();
        $params = $this->request->param();

        if (isset($params['user_phone']) && isset($params['user_email'])) {
            $logic->updateAll($user_id, $params['user_phone'], $params['user_email']);
            $code = 200;
            $msg = "更新成功";
        } else if ( isset($params['user_phone']) &&  (isset($params['user_email']) == false)) {
            $logic->updatePhone($user_id, $params['user_phone']);
            $code = 200;
            $msg = "更新成功";
        } else if ( (isset($params['user_phone']) == false) && isset($params['user_email'])) {
            $logic->updatePhone($user_id, $params['user_email']);
            $code = 200;
            $msg = "更新成功";
        } else {
            $code = 400;
            $msg = "更新失败";
        }
        $data = [
            'code' => $code,
            'msg' => $msg,
        ];
        return json($data);
    }

}