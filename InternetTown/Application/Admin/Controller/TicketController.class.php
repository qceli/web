<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/7
 * Time: 9:10
 */

namespace Admin\Controller;

use Home\Model\TicketOrderModel;

class TicketController extends AuthLoginController
{
    public function index()
    {
        $ticket = D('Ticket');
        $tickets = $ticket->select();
        foreach ($tickets as $index => $item) {
            $tickets[$index]['warning'] = json_encode($item['warning']);
            $tickets[$index]['sight_info'] = json_encode($item['sight_info']);
        }
        $this->assign('tickets', $tickets);
        $this->display('Ticket/list');
    }

    public function add()
    {
        if (IS_POST && IS_AJAX) {
            $filePath = 'Uploads/ticket_images/' . date('Ymd') . '/';

            $filename = date('YmdHis') . time() . ".jpg";///要生成的图片名
            $httpFile = host_abs_url() . $filePath . $filename;

            $filePath = realpath("./") . '/' . $filePath;
            $realPath = $filePath . $filename;

            if (!is_dir($filePath)) {
                mkdirs($filePath);
            }

            $ticket_pic = I('post.ticket_pic');
            if (!empty($ticket_pic)) {
                $httpFile = $ticket_pic ? $httpFile : "";
                $ticket_pic = str_replace('data:image/jpeg;base64,', '', $ticket_pic);
                $ticket_pic = base64_decode($ticket_pic);
                file_put_contents($realPath, $ticket_pic);

                $ticket_data = array(
                    'billcode' => I('post.billcode'),
                    'ticket_name' => I('post.ticket_name'),
                    'ticket_pic' => $httpFile,
                    'ticket_price' => I('post.ticket_price'),
                    'add_time' => time(),
                    'sight_info' => I('post.sight_info'),
                    'warning' => I('post.warning')
                );

                $ticket = D('Ticket');
                $ticket->add($ticket_data);
                $this->ajaxReturn(array('status' => True, 'msg' => '添加成功！'));
            }
        }
        $this->display('Ticket/addticket');
    }

    public function edit()
    {
        if (IS_POST && IS_AJAX) {
            $filePath = 'Uploads/ticket_images/' . date('Ymd') . '/';

            $filename = date('YmdHis') . time() . ".jpg";///要生成的图片名
            $httpFile = host_abs_url() . $filePath . $filename;

            $filePath = realpath("./") . '/' . $filePath;
            $realPath = $filePath . $filename;

            if (!is_dir($filePath)) {
                mkdirs($filePath);
            }

            $ticket_pic = I('post.ticket_pic');
            if (empty($ticket_pic)) {
                $httpFile = $ticket_pic ? $httpFile : "";
                $ticket_pic = str_replace('data:image/jpeg;base64,', '', $ticket_pic);
                $ticket_pic = base64_decode($ticket_pic);
                file_put_contents($realPath, $ticket_pic);

                $ticket_data = array(
                    'id' => I('post.id'),
                    'billcode' => I('post.billcode'),
                    'ticket_name' => I('post.ticket_name'),
                    'ticket_pic' => $httpFile,
                    'ticket_price' => I('post.ticket_price'),
                    'add_time' => time(),
                    'sight_info' => I('post.sight_info'),
                    'warning' => I('post.warning')
                );

                $ticket = D('Ticket');
                $ticket->save($ticket_data);
                $this->ajaxReturn(array('status' => True, 'msg' => '修改成功！'));
            }
        }
        $id = I('get.id');
        $ticket = D('Ticket');
        $t = $ticket->where('id=' . $id)->find();
        if (!$t || !$id) {
            $this->ajaxReturn(array('status' => false, 'msg' => '未知的ID！'));
        }
        $this->assign('ticket', $t);
        $this->display('Ticket/editticket');
    }

    public function del()
    {
        if (IS_POST && IS_AJAX) {
            $id = I('post.id');
            if (!$id) {
                $this->ajaxReturn(array('status' => false, 'msg' => '未知的ID！'));
            }
            $ticket = D('Ticket');
            if ($ticket->where('id=' . $id)->delete()) {
                $this->ajaxReturn(array('status' => true, 'msg' => '删除成功！'));
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '删除失败！'));
            }
        }
    }

    public function statistics()
    {
        if (IS_POST && IS_AJAX) {
            $btl = new TicketOrderModel();
            // 前七天每天售出总额
            $sql = "SELECT
                        date_format(from_unixtime(buy_time),'%Y-%m-%d') DAY,
                        sum(CASE
                            WHEN STATUS = 1 THEN price ELSE 0 END
                        ) AS priceSum,
                        sum(CASE
                            WHEN STATUS = 1 THEN 1 ELSE 0 END
                        ) AS saleCount,
                        sum(CASE
                            WHEN STATUS = 2 THEN 1 ELSE 0 END
                        ) AS useCount,
                        sum(CASE
                            WHEN STATUS = 3 THEN 1 ELSE 0 END
                        ) AS backCount
                    FROM
                        wb_buy_ticket_log
                    WHERE
                        date_sub(now(),
                        INTERVAL 7 DAY
                    ) <= date_format(
                        from_unixtime(buy_time),
                        '%Y-%m-%d'
                    )
                    GROUP BY DAY";
            $statistics_data = $btl->query($sql);
            $this->ajaxReturn($statistics_data);
        }
        $this->display();
    }
}