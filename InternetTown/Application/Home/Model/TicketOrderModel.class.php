<?php

namespace Home\Model;

use Think\Model;

/*
 * 购买记录表
 * id: id
 * trade_no: 订单号
 * openid: 购买粉丝ID
 * t_name: 所购买的票名
 * single_price: 票的单价
 * use_time：使用日期
 * count: 购买数量
 * customer：出行人名称
 * phone: 出行人手机号码
 * price: 总价
 * ticket_sn: 取票号
 * buy_time: 下单日期
 * status: 交易状态
 */

class TicketOrderModel extends Model
{
    protected $tablePrefix = 'wb_';
    protected $tableName = 'buy_ticket_log';
}