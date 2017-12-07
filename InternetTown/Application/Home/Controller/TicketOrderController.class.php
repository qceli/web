<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/27
 * Time: 16:56
 */

namespace Home\Controller;

use Think\Controller;

class TicketOrderController extends Controller
{
    /*
     * 所有购买记录
     */
    public function all()
    {
        $openid = I('post.openid');
        if ($openid) {
            $ticketorder = D('TicketOrder');

            $ticketorders = $ticketorder->where("openid='" . $openid . "'")->order('buy_time desc')->select();
            if ($ticketorders) {
                foreach ($ticketorders as $index => $item) {
                    $ticketorders[$index]['use_time'] = date('Y-m-d', $item['use_time']);
                }
                $this->ajaxReturn($ticketorders);
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '暂无订单！'));
            }
        }
        $this->ajaxReturn(array('status' => false, 'msg' => '无效的Openid'));
    }

    /*
     * 未付款
     */
    public function unpay()
    {
        $openid = I('post.openid');
        if ($openid) {
            $ticketorder = D('TicketOrder');

            $ticketorders = $ticketorder->where("openid='" . $openid . "' AND status=0")->select();
            if ($ticketorders) {
                foreach ($ticketorders as $index => $item) {
                    $ticketorders[$index]['use_time'] = date('Y-m-d', $item['use_time']);
                }
                $this->ajaxReturn($ticketorders);
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '暂无订单！'));
            }
        }
        $this->ajaxReturn(array('status' => false, 'msg' => '无效的Openid'));
    }

    /*
     * 已付款 - 未使用
     */
    public function paied()
    {
        $openid = I('post.openid');
        if ($openid) {
            $ticketorder = D('TicketOrder');

            $ticketorders = $ticketorder->where("openid='" . $openid . "' AND status=1")->select();
            if ($ticketorders) {
                foreach ($ticketorders as $index => $item) {
                    $ticketorders[$index]['use_time'] = date('Y-m-d', $item['use_time']);
                }
                $this->ajaxReturn($ticketorders);
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '暂无订单！'));
            }
        }
        $this->ajaxReturn(array('status' => false, 'msg' => '无效的Openid'));
    }

    public function used()
    {
        $openid = I('post.openid');
        if ($openid) {
            $ticketorder = D('TicketOrder');

            $ticketorders = $ticketorder->where("openid='" . $openid . "' AND status=2")->select();
            if ($ticketorders) {
                foreach ($ticketorders as $index => $item) {
                    $ticketorders[$index]['use_time'] = date('Y-m-d', $item['use_time']);
                }
                $this->ajaxReturn($ticketorders);
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '暂无订单！'));
            }
        }
        $this->ajaxReturn(array('status' => false, 'msg' => '无效的Openid'));
    }

    /*
     * 退款中
     */
    public function rebacking()
    {
        $openid = I('post.openid');
        if ($openid) {
            $ticketorder = D('TicketOrder');

            $ticketorders = $ticketorder->where("openid='" . $openid . "' AND status=3")->select();
            if ($ticketorders) {
                foreach ($ticketorders as $index => $item) {
                    $ticketorders[$index]['use_time'] = date('Y-m-d', $item['use_time']);
                }
                $this->ajaxReturn($ticketorders);
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '暂无订单！'));
            }
        }
        $this->ajaxReturn(array('status' => false, 'msg' => '无效的Openid'));
    }

    /*
     * 退款
     */
    public function rebacked()
    {
        $openid = I('post.openid');
        if ($openid) {
            $ticketorder = D('TicketOrder');

            $ticketorders = $ticketorder->where("openid='" . $openid . "' AND status=3")->select();
            if ($ticketorders) {
                foreach ($ticketorders as $index => $item) {
                    $ticketorders[$index]['use_time'] = date('Y-m-d', $item['use_time']);
                }
                $this->ajaxReturn($ticketorders);
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '暂无订单！'));
            }
        }
        $this->ajaxReturn(array('status' => false, 'msg' => '无效的Openid'));
    }

    /*
     * 获取未支付订单详细信息
     */
    public function unpayInfo()
    {
        if (IS_POST) {
            $tid = I('post.tid');
            $openid = I('post.openid');
            if ($tid && $openid) {
                $ticketorder = D('TicketOrder');
                $ticketorders = $ticketorder->where("openid='" . $openid . "' AND id='" . $tid . "'")->find();
                if ($ticketorders) {
                    foreach ($ticketorders as $key => $value) {
                        $key == 'use_time' && $ticketorders[$key] = date('Y-m-d', $value);
                    }
                    $this->ajaxReturn($ticketorders);
                } else {
                    $this->ajaxReturn(array('status' => false, 'msg' => '暂无订单！'));
                }
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '参数错误！'));
            }
        }
    }

    /*
     * 获取当前票所有信息
     */
    public function ticketInfo()
    {
        if (IS_POST) {
            $tid = I('post.tid');
            $openid = I('post.openid');
            if ($tid && $openid) {
                $ticketorder = D('TicketOrder');
                $ticketorders = $ticketorder->where("openid='" . $openid . "' AND id='" . $tid . "' AND status=1")->find();
                if ($ticketorders) {
                    foreach ($ticketorders as $key => $value) {
                        $key == 'use_time' && $ticketorders[$key] = date('Y-m-d', $value);
                    }
                    $this->ajaxReturn($ticketorders);
                } else {
                    $this->ajaxReturn(array('status' => false, 'msg' => '暂无订单！'));
                }
            } else {
                $this->ajaxReturn(array('status' => false, 'msg' => '参数错误！'));
            }
        }
    }

}