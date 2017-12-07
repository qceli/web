<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/27
 * Time: 15:09
 */

namespace Home\Controller;

use Think\Controller;

class WxOptController extends Controller
{
    public function getOpenid()
    {
        $code = I('post.code');
        $get_openid_url = 'https://api.weixin.qq.com/sns/jscode2session';
        $params = array(
            'appid' => 'wx249efc3abe5c0462',
            'secret' => '088270832768c0b189681b4ed8101aa4',
            'js_code' => $code,
            'grant_type' => 'authorization_code'
        );
        // POST REQUEST
        $response = http($get_openid_url, $params, true);
        $this->ajaxReturn(json_decode($response));
    }
}