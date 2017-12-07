<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/21
 * Time: 20:25
 */

namespace Home\Controller;

use Think\Controller;

/*
 * 微信支付接口
 */

class PayController extends Controller
{
    protected $jsApiParameters;

    public function pay()
    {   // 下单
        // 商户基本信息，可以写死在WxPay.Config.php里面， 其他详细参考WxPayConfig.php
        vendor('Wxpay.WxPayJsApiPay');
        $tools = new \JsApiPay();

        $ticket_log = D('TicketOrder');

        if (!I('post.customer')) {
            $this->ajaxReturn(array('status' => false, 'msg' => '出行人不可为空!'));
        };
        if (!I('post.phone')) {
            $this->ajaxReturn(array('status' => false, 'msg' => '手机号不可为空!'));
        };

        // 接收参数
        $openid = I('post.openid');
        //  传送订单号说明是未支付订单再支付
        //  否则无订单号则生成新订单
        $out_trade_no = I('post.trade_no') ? I('post.trade_no') : 'MP' . date('YmdHis') . rand(100, 1000);
        $total_fee = intval(floatval(I('post.price')) * 100); // 价格

        $input = new \WxPayUnifiedOrder();
        $input->SetAppid('wx249efc3abe5c0462');
        $input->SetBody('鸿山物联网小镇门票购买');
        $input->SetOut_trade_no($out_trade_no);
        $input->SetTotal_fee($total_fee); // 价格
        $input->SetNotify_url($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . U('Pay/notify'));
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openid);
        $order = \WxPayApi::unifiedOrder($input);
        $this->jsApiParameters = $tools->GetJsApiParameters($order);

        // 记录订单 交易状态 0.未付款，1.已付款（交易成功) - 未使用，2. 已使用 3.退款中，4.已退款

        // 查询订单是否已经存在, 直接返回唤起参数
        if ($ticket_log->where("trade_no='" . $out_trade_no . "' AND status=0")->find()) {
            echo $this->jsApiParameters;
        } else { // 不存在则新建订单, 新建订单，再返回唤起参数
            $buy_ticket_info = array(
                'trade_no' => $out_trade_no, // 订单号
                'openid' => I('post.openid'), // 用户openid
                't_name' => I('post.t_name'), // 所购买的票名
                'single_price' => I('post.single_price'), // 单价
                'use_time' => strtotime(I('post.use_time')), // 使用出行时间
                'count' => I('post.count'), // 购买数量
                'customer' => I('post.customer'), // 出行人
                'phone' => I('post.phone'), // 手机号
                'price' => I('post.price'), // 总价格
                'ticket_sn' => '', // 取票号
                'buy_time' => time(), // 购买时间
                'status' => 0 // 订单默认状态
            );
            $ticket_log->add($buy_ticket_info);
            echo $this->jsApiParameters;

        }
    }

    /*
     * 申请退款
     */

    public function refund()
    {
        vendor('Wxpay.WxPayData');
        vendor('Wxpay.WxPayApi');

        /*
         *  退款单号
         */
        $out_trade_no = I('post.trade_no'); //////////////////

        // 生成退款单号
        $out_refund_no = 'RE' . date('YmdHis', time()) . (microtime() * 1000000) . rand(1000000, 100000000);

        $ticket_order_obj = D('TicketOrder');
        $ticket_order = $ticket_order_obj
            ->where("trade_no='$out_trade_no' AND status=1")
            ->find();
        /*
         * 查找已支付未使用的票单，否则不予退票
         */
        if ($ticket_order) {
            /*
             *  退款价格
             */
            $refund_fee = intval(floatval(I('post.price')) * 100); // 退款价//////////////////

            $inputObj = new \WxPayRefund();

            $inputObj->SetAppid('wx249efc3abe5c0462'); // 小程序应用APPID
            $inputObj->SetOp_user_id(\WxPayConfig::MCHID); // 操作员号
            $inputObj->SetOut_refund_no($out_refund_no);  // 设置退款单号
            $inputObj->SetOut_trade_no($out_trade_no); // 商户内部订单号

            if (intval($ticket_order['price'] * 100) < $refund_fee) {
                $this->ajaxReturn(array('status' => false, 'msg' => '退款金额不可大于总金额！'));
                exit();
            }

            $inputObj->SetRefund_fee($refund_fee); // 退款金额
            $inputObj->SetTotal_fee(intval($ticket_order['price'] * 100)); // 总金额

            $result = \WxPayApi::refund($inputObj); // 成功

            if ($result['return_code'] == 'SUCCESS' && $result['result_code'] == 'SUCCESS') {
                // 修改订单状态为3
                $status_upd = array(
                    'out_refund_no' => $out_refund_no,
                    'status' => 3
                );
                $ticket_order_obj->where("trade_no='" . $out_trade_no . "' AND status=1")->save($status_upd);
                $this->ajaxReturn(array('status' => true, 'msg' => '退款成功！'));
            } else {
//                $this->ajaxReturn(array('status' => false, 'msg' => $result['err_code_des']));
                $this->ajaxReturn(array('status' => false, 'msg' => "退款失败，请联系商家！"));
            }
        } else {
            $this->ajaxReturn(array('status' => false, 'msg' => '订单不存在，退款失败！'));
        }
    }

    /*
     * 退款查询
     */
    public function refundQuery()
    {
        $out_trade_no = I('post.trade_no');
        $out_refund_no = I('post.out_refund_no');

        $ticket_order_obj = D('TicketOrder');
        $ticket_order = $ticket_order_obj
            ->where("trade_no='" . $out_trade_no . "' AND out_refund_no='" . $out_refund_no . "' AND status=3")
            ->find();
        if (!$ticket_order) {
            $this->ajaxReturn(array('status' => true, 'msg' => '无此订单!'));
            exit();
        }
        vendor('Wxpay.WxPayApi');

        $inputObj = new \WxPayRefundQuery();
        $inputObj->SetAppid('wx249efc3abe5c0462');
        $inputObj->SetNonce_str(\WxPayApi::getNonceStr());
        $inputObj->SetOut_trade_no($out_trade_no);
        $result = \WxPayApi::refundQuery($inputObj);
        if ($result['return_code'] == 'SUCCESS' && $result['result_code'] == 'SUCCESS' && $result['refund_status_0']) {
            // 更新订单状态为4
            $status_upd = array(
                'status' => 4
            );

            $ticket_order_obj
                ->where("trade_no='" . $out_trade_no . "' AND out_refund_no='" . $out_refund_no . "' AND status=3")
                ->save($status_upd);
            $this->ajaxReturn($result);
        } else {
            $this->ajaxReturn(array('status' => false, 'msg' => '退款失败！'));
        }
    }

    /*
     * 支付回调
     */
    public function notify()
    {
        // 接收微信支付结果
        $xml = file_get_contents('php://input');
        $arr = json_decode(
            json_encode(simplexml_load_string($xml,
                'SimpleXMLElement',
                LIBXML_NOCDATA)),
            true);

        $f = fopen('./notify.txt', 'w+');
        fwrite($f, $xml);
        fclose($f);

        // 验证签名。默认支付MD5
        if ($arr['result_code'] == 'SUCCESS' && $arr['return_code'] == 'SUCCESS') {
            $ticket = D('TicketOrder');
            // 查询订单是否存在
            // 验证成功 修改数据库的订单状态等
            // $result['out_trade_no']为订单id
            // 生成取票号
            $status_upd = array(
                'status' => 1,
                'ticket_sn' => rand(100000, 1000000)
            );
            $ticket->where("trade_no='" . $arr['out_trade_no'] . "'")->save($status_upd);
        }
        // 回应服务器
        $return = array('return_code' => 'SUCCESS', 'return_msg' => 'OK');
        $xml = '<xml>';
        foreach ($return as $key => $value) {
            $xml .= '<' . $key . '><![CDATA[' . $value . ']]></' . $key . '>';
        }
        $xml .= '</xml>';
        echo $xml;
    }
}