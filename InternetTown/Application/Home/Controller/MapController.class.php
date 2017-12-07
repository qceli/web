<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/9/22
 * Time: 10:52
 */

namespace Home\Controller;

use Think\Controller;


class MapController extends Controller
{
    public function index()
    {
        $this->display('Map/map');
    }

    public function map2()
    {
        $this->display('Map/map2');
    }
}