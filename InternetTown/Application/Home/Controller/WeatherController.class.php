<?php
/**
 * Created by PhpStorm.
 * User: user、
 * Date: 2017/7/31
 * Time: 14:50
 */

namespace Home\Controller;

use Think\Controller;


/*
 * 天气查询接口
 */

class WeatherController extends Controller
{
    public $query_url = 'http://www.weather.com.cn/data/sk/';
    public $ext = '.html';

    public function search()
    {
        $city_name = I('post.city_name');

        $city_contents = file_get_contents(MODULE_PATH . '/Data/city_info.txt');
        $city_row = explode("\n", $city_contents);
        $city_list = array();
        foreach ($city_row as $index => $item) {
            $city_list[] = explode("=", $item);
        }
        foreach ($city_list as $index => $item) {
            $item[1] == $city_name && $city_code = $item[0];
        }

        $city_code = $city_code ? $city_code : '101190201'; //  默认无锡

        $query_url = $this->query_url . $city_code . '.html';
        $response = http($query_url);

        $this->ajaxReturn(json_decode($response));
    }

    public function save($data)
    {
        //
    }
}