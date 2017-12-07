<?php
/**
 * Created by PhpStorm.
 * User: user、
 * Date: 2017/7/31
 * Time: 17:55
 */

namespace Admin\Controller;

use Admin\Controller\AuthLoginController;

use Think\Model;

class MeetController extends AuthLoginController
{

    protected $meet;

    public function __construct()
    {
        parent::__construct();
        $this->meet = D('Meet');
    }

    public function index()
    {
        $data = array();
        $this->ajaxReturn($data);
    }

    public function add()
    {
        $data = array(
            'subject' => $_POST['subject'],
        );
        $this->meet->create($data, Model::MODEL_INSERT);
    }

    public function edit()
    {
        $this->meet->create($_POST, Model::MODEL_UPDATE);

    }

}