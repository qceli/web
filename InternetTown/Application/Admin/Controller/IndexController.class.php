<?php

namespace Admin\Controller;

use Home\Model\TicketOrderModel;

class IndexController extends AuthLoginController
{
    public function welcome()
    {
        $ticket = new TicketOrderModel();
        $ticket_order_info = $ticket->where("status=1")->select();

        $status = array(
            0 => '未付款',
            1 => '已付款',
            2 => '已使用',
            3 => '已退款',
            4 => '已退款'
        );
        foreach ($ticket_order_info as $index => $item) {
            $ticket_order_info[$index]['status'] = $status[$item['status']];
            $ticket_order_info[$index]['phone'] = substr_replace($item['phone'], '****', 3, 4);
        }

        $counts = count($ticket_order_info);
        $this->assign('counts', $counts);
        $this->assign('ticket_order_info', $ticket_order_info);
        $this->display('Index/welcome');
    }

    public function index()
    {
        $this->assign('title', C('title'));
        $this->assign('username', $_SESSION['user']['username']);
        $this->assign('block_name', '首页');
        $this->display();
    }


    public function ticket_info()
    {
        $tid = I('get.tid');
        $ticket = new TicketOrderModel();
        $ticket = $ticket->where("id='$tid' AND status=1")->find();
        $ticket = $ticket ? $ticket['ticket_sn'] : '查无此票';
        $this->assign('ticket', $ticket);
        $this->display('Index/ticket_info');
    }

    /*
 * 核销票的状态
 */
    public function changeStatus()
    {
        if (IS_AJAX && IS_POST) {
            $tid = I('post.tid');
            $ticket_orders = new TicketOrderModel();
            $ticket = $ticket_orders->where("id='$tid' AND status=1")->find();
            if ($ticket) {
                $ticket['status'] = 2;  // 设置为已使用状态
                $ticket_orders->save($ticket);
                $this->ajaxReturn(array('status' => true, 'msg' => '取票成功'));
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '无此票信息'));
            }
        }
    }

    /*
     * 搜索特定用户购票信息
     */
    public function search()
    {
        $phone = I('post.phone');
        $tickets = new TicketOrderModel();
        $ticket_order_info = $tickets->where("phone='$phone' AND status=1")->select();

        if (!$phone || !$ticket_order_info)
            $this->ajaxReturn(array('status' => false, 'msg' => '查无此记录！')); // ajax返回错误信息

        $status = array(
            0 => '未付款',
            1 => '已付款',
            2 => '已使用',
            3 => '已退款',
            4 => '已退款'
        );

        foreach ($ticket_order_info as $index => $item) {
            $ticket_order_info[$index]['status'] = $status[$item['status']];
            $ticket_order_info[$index]['buy_time'] = date('Y-m-d H:i:s', $ticket_order_info[$index]['buy_time']);
            $ticket_order_info[$index]['use_time'] = date('Y-m-d H:i:s', $ticket_order_info[$index]['use_time']);
            $ticket_order_info[$index]['phone'] = substr_replace($item['phone'], '****', 3, 4);

        }
        $this->ajaxReturn(array('status' => true, 'msg' => '成功！', 'tickets' => $ticket_order_info));
    }


}