<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/4
 * Time: 14:29
 */

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;


class LoginController extends Controller
{

    public function index()
    {
        $this->assign("title", "登录 - 物联网小镇管理系统");
        $this->display('Login/login');
    }

    public function loginValidate()
    {
        if (IS_POST && IS_AJAX) {
            $username = I('post.username');
            $password = I('post.password');
            $verifyCode = I('post.verifyCode');
            $remember = I('post.remember');
            if (!empty($username)
                && !empty($password)
                && !empty($verifyCode)) {
                if (!$this->check_verify($verifyCode)) {
                    $msg = '验证码错误！';
                    $this->ajaxReturn($msg);
                }
                $codition = array(
                    'username' => $username,
                    'password' => md5($password)
                );
                $UserObj = D('AdminUser');
                $user_data = $UserObj->where($codition)->find();
                if ($user_data) {
                    unset($user_data['password']);

                    $user_data['login_count'] += 1;

                    $_SESSION['user'] = $user_data;
                    if ($remember) {
                        $_SESSION['expire'] = 24 * 60 * 60 * 30;
                    } else {
                        $_SESSION['expire'] = 0;
                    }

                    $user_data['last_login'] = time();
                    $UserObj->save($user_data);

                    $this->ajaxReturn('OK');
                } else {
                    $msg = '用户不存在';
                    $this->ajaxReturn($msg);
                }
            } else {
                $msg = '无效的输入';
                $this->ajaxReturn($msg);
            }
        }
    }

    public function verifyCodeServlet()
    {
        $config = array(
            'length' => 4,
            'fontSize' => 40,
            'useCurve' => true,
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function check_verify($code, $id = '')
    {
        $verify = new Verify();
        return $verify->check($code, $id = '');
    }

    public function logout()
    {
        session_destroy();
        $this->success('欢迎使用!', U('Login/index'), 3);
    }


}