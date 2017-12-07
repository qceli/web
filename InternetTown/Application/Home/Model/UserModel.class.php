<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/22
 * Time: 15:16
 */

namespace Home\Model;

use Think\Model;

/*
 * 买票用户表
 * id : id号
 * openid : 微信粉丝唯一标识
 * nickname : 微信用户名
 * headimgurl : 微信用户头像
 * sex : 性别
 * language : 语言
 * city : 城市信息
 * province : 省份信息
 * country : 国家信息
 */

class UserModel extends Model
{
    protected $tablePrefix = 'wb_';
    protected $tableName = 'user';
}