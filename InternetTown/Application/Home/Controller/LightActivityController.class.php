<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/9/4
 * Time: 14:37
 */

namespace Home\Controller;

use Think\Controller;

/*
 * 打开这个页面之前判断用户是否存于数据库中。
 * 步骤如下：
 *  1. 获取code
 *  2. 获取access_token
 *  3. 获取user_info
 *  4. 进入数据库查询是否有此数据
 *  5. 有=》显示点亮完界面
 *  6. 无=》显示未点亮界面
 *
 *  返回数据均为json格式
 */

class LightActivityController extends Controller
{
    private $appid = 'wx1b2ef36d81c25552';
    private $secret = 'b26f156d5de2a5dccddf830ec33ffe29';

    public function index()
    {
        $user = D('User');
        $code = I('get.code');
        if ($code) { // code 存在， 用code获取access_token
            $accessUrl = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->appid}&secret={$this->secret}&code={$code}&grant_type=authorization_code";
            $response = http($accessUrl);
            $response = json_decode($response, true);

            if (array_key_exists('access_token', $response)) {
                $userUrl = "https://api.weixin.qq.com/sns/userinfo?access_token={$response[access_token]}&openid={$response[openid]}&lang=zh_CN";// 请求用户信息
                $response = http($userUrl);
                $response = json_decode($response, true);

                if (array_key_exists('openid', $response)) {
                    if ($user->where("openid='$response[openid]'")->find()) { // 已存在，说明已扫过，显示已扫界面。
                        $this->display('LightActivity/showed');
                    } else {
                        cookie('la_openid', $response['openid']);
                        $user->add($response);
                        $this->display('LightActivity/showed');
                    }
                }
            }
        } else { // code不存在，获取code
            $redirect_uri = "https://api.smalltown.wshoto.com" . U('LightActivity/index');
            $baseUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->appid}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
            header("Location:" . $baseUrl);
            exit;
        }
    }

    public function showPage()
    {
        if (cookie('la_openid')) {
            $this->display('LightActivity/showed');
        } else {
            $this->display('LightActivity/show');
        }
    }

    public function headImg()
    {
        $user = D('User');
        $users = $user->select();
        $headImg = array();
        foreach ($users as $index => $item) {
            $headImg['headimgurl'][] = $item['headimgurl'];
        }
        $this->ajaxReturn($headImg);
    }

    public function mainScreen()
    {
        $this->display('LightActivity/index');
    }
}