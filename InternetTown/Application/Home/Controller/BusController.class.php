<?php
/**
 * Created by PhpStorm.
 * User: user、
 * Date: 2017/7/31
 * Time: 16:43
 */

namespace Home\Controller;

use Think\Controller;

/*
 * 公交查询接口
 */

class BusController extends Controller
{
    protected $url = "http://openapi.aibang.com/bus/lines";

    public function search()
    {
        $q = I('post.q');
        $params = array(
            'app_key' => 'f41c8afccc586de03a99c86097e98ccb',
            'city' => '无锡',
            'q' => $q
        );
        $response = http($this->url, $params);

        header("Content-type:text/html; charset=utf-8");

        //读取XmlToArray
        $xml = simplexml_load_string($response);
        $xml = json_decode(json_encode($xml), true);

        if (count($xml['lines']) == 0) {
            $this->ajaxReturn(array('status' => true, 'msg' => '查无此班车！'));
            exit();
        }

        $result = array();
        foreach ($xml['lines'] as $index => $item) {
            foreach ($item as $i => $v) {
                $tmp = array(
                    'name' => $v['name'],
                    'info' => $v['info'],
                    'stats' => explode(";", $v['stats'])
                );
                $result[] = $tmp;
            }
        }
        $this->ajaxReturn($result);
    }
}