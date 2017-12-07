<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/26
 * Time: 16:48
 */


define('MN', '2017082616592162');

use Workerman\Worker;

require_once __DIR__ . '/Autoloader.php';

// 创建一个Worker监听2347端口，不使用任何应用层协议
$tcp_worker = new Worker("tcp://0.0.0.0:27777");

// 启动1个进程对外提供服务
$tcp_worker->count = 1;

// 当客户端发来数据时
$tcp_worker->onMessage = function ($connection, $data) {
    // 向客户端发送 hello $data
    $f_handle = fopen('../AirData.txt', 'w+');
    fwrite($f_handle, $data);
    fclose($f_handle);
//    $connection->send('hello' . $data);
};

//  运行worker
Worker::runAll();