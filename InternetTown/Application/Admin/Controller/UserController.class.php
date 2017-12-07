<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/9
 * Time: 9:33
 */

namespace Admin\Controller;

class UserController extends AuthLoginController
{
    public function index()
    {
        D('User');
        $this->assign('title', C('title'));
        $this->assign('block_name', '用户管理');
        $this->display('User/list');
    }
}