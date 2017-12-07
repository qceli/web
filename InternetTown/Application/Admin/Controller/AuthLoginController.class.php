<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/4
 * Time: 14:33
 */

namespace Admin\Controller;

use Think\Controller;

class AuthLoginController extends Controller
{
    public function _initialize()
    {
        $this->check_login(U(MODULE_NAME / CONTROLLER_NAME));
    }

    public function check_login($return)
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('Login/index');
        }
    }
}