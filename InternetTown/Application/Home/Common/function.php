<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/24
 * Time: 9:30
 */

/**
 * http请求
 * @param  string $url 请求地址
 * @param  boolean|string|array $params 请求数据
 * @param  integer $ispost 0/1，是否post
 * @param  array $header
 * @param  $verify 是否验证ssl
 * return string|boolean          出错时返回false
 */
function http($url, $params = false, $ispost = 0, $header = array(), $verify = false)
{
    $httpInfo = array();
    $ch = curl_init();
    if (!empty($header)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    //忽略ssl证书
    if ($verify === true) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    } else {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    }
    if ($ispost) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_URL, $url);
    } else {
        if (is_array($params)) {
            $params = http_build_query($params);
        }
        if ($params) {
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
        }
    }
    $response = curl_exec($ch);
    if ($response === FALSE) {
        trace("cURL Error: " . curl_errno($ch) . ',' . curl_error($ch), 'error');
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        trace($httpInfo, 'error');
        return false;
    }
    curl_close($ch);
    return $response;
}

/**
 * 异步执行，也可以当做socket请求函数
 * @param  string $url 网址
 * @param  mixed $post post数据
 * @param  string $contentType
 * @param  boolean $return
 * return boolean|string  $return为false或者请求出错时返回false
 */
function async_exec($url, $post = '', $contentType = 'application/x-www-form-urlencoded', $return = false)
{
    $response = false;
    if (strpos($url, 'http://') !== false || strpos($url, 'https://') !== false) {
        $u = parse_url($url);
        $host = $u['host'];
        $port = isset($u['port']) ? $u['port'] : 80;
        $url = str_replace($u['scheme'] . '://' . $host . (isset($u['port']) ? ':' . $port : ''), '', $url);
    } else {
        $host = $_SERVER['HTTP_HOST'];
        $port = 80;
    }
    $fp = fsockopen("{$host}", $port, $errno, $errstr, 10);
    if (!$fp) {
        echo "{$errstr} {$errno} <br />\\n";
    } else {
        if (!empty($post)) {
            if (is_array($post)) {
                $post = http_build_query($post);
            }
            $header = array(
                'POST ' . $url . ' HTTP/1.1',
                'Host: ' . $host,
                'Content-Type: ' . $contentType,
                'Content-Length: ' . strlen($post) . "\r\n",
                $post,
            );
        } else {
            $header = array(
                'GET ' . $url . ' HTTP/1.1',
                'Host: ' . $host,
                'Content-Type: ' . $contentType,
            );
        }
        fputs($fp, join("\r\n", $header) . "\r\n\r\n");
        if ($return) {
            $response = '';
            while (!feof($fp)) {
                $response .= fgets($fp, 2048);
                //break;
            }
        }
        fclose($fp);
        if ($response !== false && !empty($response)) {
            $pos = strpos($response, "\r\n\r\n");
            $head = substr($response, 0, $pos);    //http head
            $status = substr($head, 0, strpos($head, "\r\n"));    //http status line
            $body = substr($response, $pos + 4, strlen($response) - ($pos + 4));//page body
            if (preg_match("/^HTTP\/\d\.\d\s([\d]+)\s.*$/", $status, $matches)) {
                if (intval($matches[1]) / 100 == 2) {
                    $response = $body;
                } else {
                    $response = false;
                }
            }
        }
    }
    return $response;
}