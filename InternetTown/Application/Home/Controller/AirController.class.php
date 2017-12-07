<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/26
 * Time: 16:29
 */

namespace Home\Controller;

use Think\Controller;

class AirController extends Controller
{
    public function index()
    {
        $contents = file_get_contents('./AirData.txt');
        $receive = explode(';', $contents);

        $convert = array(
            "101" => "EYHL",
            "106" => "YYHT",
            "116" => "YYHD",
            "141" => "EYHD",
            "102" => "DYHW",
            "108" => "CY",
            "107" => "KLW10",
            "121" => "KLW25",
            "129" => "FS",
            "130" => "ZDFX",
            "126" => "WD",
            "128" => "SD",
            "127" => "YL"
        );
        $data = array();
        foreach ($receive as $item) {
            $tmp = explode('=', $item);
            $key = explode('-', $tmp[0]);
            $val = explode(',', $tmp[1]);
            if (is_numeric($key[0])) {
                $key = $convert[$key[0]];
                $data[$key] = round($val[0], 2);
            } else {
                $key = $tmp[0];
                $data[$key] = $val[0];
            }
        }
        $this->ajaxReturn($data);
    }

    public function Airtmp()
    {
        $contents = file_get_contents('./AirData.txt');
        $receive = explode(';', $contents);

        $convert = array(
            "101" => "EYHL",
            "106" => "YYHT",
            "116" => "YYHD",
            "141" => "EYHD",
            "102" => "DYHW",
            "108" => "CY",
            "107" => "KLW10",
            "121" => "KLW25",
            "129" => "FS",
            "130" => "ZDFX",
            "126" => "WD",
            "128" => "SD",
            "127" => "YL"
        );
        $data = array();
        foreach ($receive as $item) {
            $tmp = explode('=', $item);
            $key = explode('-', $tmp[0]);
            $val = explode(',', $tmp[1]);
            if (is_numeric($key[0])) {
                $key = $convert[$key[0]];
                $data[$key] = round($val[0], 2);
            } else {
                $key = $tmp[0];
                $data[$key] = $val[0];
            }
        }
        $this->assign('data', $data);
        $this->display('Air/airmonitor');
    }
}