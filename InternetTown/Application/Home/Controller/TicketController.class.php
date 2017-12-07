<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/23
 * Time: 8:40
 */

namespace Home\Controller;

use Think\Controller;
use Admin\Model\TicketModel;

/*
 * 门票数据
 */

class TicketController extends Controller
{
    public function index()
    {
        $ticket = new TicketModel();
        $tickets = $ticket->select();
        $this->ajaxReturn($tickets);
    }

    public function detail()
    {
        $id = I('get.id');
        if (!$id) {
            $this->ajaxReturn(array('status' => false, 'msg' => '未知的ID！'));
        }
        $ticket = new TicketModel();
        $this->ajaxReturn($ticket->where('id=' . $id)->find());
    }
}