<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/23
 * Time: 20:06
 */

namespace Home\Controller;

use Think\Controller;

class ParkController extends Controller
{
    protected $free_url = 'http://112.35.28.247:8190/parkInfo/queryParkInfo';
    protected $app_id = 'rect8f53e3ca4y66ayc2f8e9d93671e4';
    protected $key = '24314527b13678c2a4af63fef52cfr3r';

    public function freeCount()
    {
        $headers = array(
            'Content-Type: text/raw'
        );
        $params = "{'salt':'jdsfhakjdfyDsdfkjsdlkfsdfns','sign':'F776A5B47B3FF9DF9B2133750EA52A2D','parkCode':'P320211004','app_id':'rect8f53e3ca4y66ayc2f8e9d93671e4','sign_type':'md5'}";

        $response = http($this->free_url, $params, true, $headers);
        header("Content-type:application/json; charset=utf-8;");
        $this->ajaxReturn(json_decode($response));
    }

    public function freeParkDetail()
    {
        $url = "http://112.35.28.247:8190/parkInfo/queryParkBerthStateInfo";
        $params = "{'app_id' : 'rect8f53e3ca4y66ayc2f8e9d93671e4','parkCode' : 'P320211004','pageNum' : '1','pageSize' : '0','salt' : 'jdsfhakjdfyDsdfkjsdlkfsdfns','sign' : '9C523BBC03207A33D69ED91BD348495E','sign_type' : 'md5'}";
        $headers = array(
            'Content-Type: text/raw'
        );
        $response = http($url, $params, true, $headers);
        header("Content-type:application/json; charset=utf-8;");
        $response = json_decode($response, true);
        $response = $response["data"];

        $temp = array();
        foreach ($response as $index => $item) {
            if ($response[$index]['isOccupy'] == "2") { // 空车位
                $berthNo = explode('_', $response[$index]['berthNo']);
                $temp[$berthNo[1][0]][] = array(
                    'berthNo' => $berthNo[1]
                );
            }
        }
        $this->ajaxReturn($temp);
    }

    public function voidPark()
    {
        $headers = array(
            'Content-Type: text/raw'
        );
        $params = "{'salt':'jdsfhakjdfyDsdfkjsdlkfsdfns','sign':'F776A5B47B3FF9DF9B2133750EA52A2D','parkCode':'P320211004','app_id':'rect8f53e3ca4y66ayc2f8e9d93671e4','sign_type':'md5'}";

        $res = http($this->free_url, $params, true, $headers);
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $url = "http://112.35.28.247:8190/parkInfo/queryParkBerthStateInfo";
        $params = "{'app_id' : 'rect8f53e3ca4y66ayc2f8e9d93671e4','parkCode' : 'P320211004','pageNum' : '1','pageSize' : '0','salt' : 'jdsfhakjdfyDsdfkjsdlkfsdfns','sign' : '9C523BBC03207A33D69ED91BD348495E','sign_type' : 'md5'}";
        $headers = array(
            'Content-Type: text/raw'
        );
        $response = http($url, $params, true, $headers);
        header("Content-type:application/json; charset=utf-8;");
        $response = json_decode($response, true);
        $response = $response["data"];

        $temp = array();
        foreach ($response as $index => $item) {
            if ($response[$index]['isOccupy'] == "2") { // 空车位
                $berthNo = explode('_', $response[$index]['berthNo']);
                $temp[$berthNo[1][0]][] = array(
                    'berthNo' => $berthNo[1]
                );
            }
        }

        $res = json_decode($res, true);
        $response['data']['freeParkingSpace'] = $res['data']['freeParkingSpace'];

        header("Content-type:application/json; charset=utf-8;");
        $this->assign('a_area', $temp['A']);
        $this->assign('b_area', $temp['B']);
        $this->assign('c_area', $temp['C']);
        $this->assign('d_area', $temp['D']);
        $this->assign('data', $response);
        $this->display('Park/voidpark');
    }

    public function wdpark()
    {
        $headers = array(
            'Content-Type: text/raw'
        );
        $params = "{'salt':'jdsfhakjdfyDsdfkjsdlkfsdfns','sign':'F776A5B47B3FF9DF9B2133750EA52A2D','parkCode':'P320211004','app_id':'rect8f53e3ca4y66ayc2f8e9d93671e4','sign_type':'md5'}";

        $response = http($this->free_url, $params, true, $headers);
        header("Content-type:application/json; charset=utf-8;");
        $this->assign('data', json_decode($response, true));
        $this->display('Park/wdpark');
    }

}