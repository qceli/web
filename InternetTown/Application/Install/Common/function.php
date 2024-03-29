<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/4
 * Time: 8:47
 */

// 检测环境是否支持可写
define('IS_WRITE', APP_MODE !== 'sae');

/*
 * 系统环境检测
 * @return array 系统环境数据
 */
function check_env()
{
    $items = array(
        'os' => array('操作系统', '不限制', '类Unix', PHP_OS, 'success'),
        'php' => array('PHP版本', '5.3', '5.3+', PHP_VERSION, 'success'),
        'upload' => array('附件上传', '不限制', '2M+', '未知', 'success'),
        'gd' => array('GD库', '2.0', '2.0+', '未知', 'success'),
        'disk' => array('磁盘空间', '5M', '不限制', '未知', 'success'),
    );

    // PHP环境检测
    if ($items['php'][3] < $items['php'][1]) {
        $items['php'][4] = 'error';
        session('error', true);
    }

    // 附件上传检测
    if (@ini_get('file_uploads'))
        $items['upload'][3] = ini_get('upload_max_filesize');

    // GD库检测
    $tmp = function_exists('gd_info') ? gd_info() : array();
    if (empty($tmp['GD Version'])) {
        $items['gd'][3] = '未安装';
        $item['gd'][4] = 'error';
        session('error', true);
    } else {
        $items['gd'][3] = $tmp['GD Version'];
    }
    unset($tmp);

    // 磁盘空间检测
    if (function_exists('disk_free_sapce')) {
        $items['disk'][3] = floor(disk_free_space(INSTALL_APP_PATH / (1024 * 1024)) . 'M');
    }

    return $items;
}

/*
 * 目录，文件读写检测
 * @return array 检测数据
 */
function check_dirfile()
{
    $items = array(
        array('dir', '可写', 'success', './Public'),
        array('dir', '可写', 'success', './Application/Runtime'),
        array('file', '可写', 'success', './Application/Common/Conf/config.php'),
    );
    foreach ($items as &$val) {
        if ('dir' == $val[0]) {
            if (!is_writable(INSTALL_APP_PATH . $val[3])) {
                if (is_dir($items[1])) {
                    $val[1] = '可读';
                    $val[2] = 'error';
                    session('error', true);
                } else {
                    $val[1] = '不存在';
                    $val[2] = 'error';
                    session('error', true);
                }
            }
        } else {
            if (file_exists(INSTALL_APP_PATH . $val[3])) {
                if (!is_writable(INSTALL_APP_PATH . $val[3])) {
                    $val[1] = '不可写';
                    $val[2] = 'error';
                    session('error', true);
                }
            } else {
                if (!is_writable(dirname(INSTALL_APP_PATH . $val[3]))) {
                    $val[1] = '不存在';
                    $val[2] = 'error';
                    session('error', true);
                }
            }
        }
    }
    return $items;
}

/*
 *  函数检测
 *  @return array 检测数据
 */

function check_func()
{
    $items = array(
        array('mysql_connect', '支持', 'success'),
        array('file_get_contents', '支持', 'success'),
        array('mb_strlen', '支持', 'success'),
    );

    foreach ($items as &$val) {
        if (!function_exists($val[0])) {
            $val[1] = '不支持';
            $val[2] = 'error';
            $val[3] = '开启';
            session('error', true);
        }
    }
    return $items;
}

/*
 *  写入配置文件
 *  @param array $config 配置信息
 */
function write_config($config)
{
    if (is_array($config)) {
        //读取配置内容
        $conf = file_get_contents(MODULE_PATH . 'Data/conf.tpl');
        // 替换配置项
        foreach ($config as $name => $value) {
            $conf = str_replace("[{$name}]", $value, $conf);
        }

        // 写入应用配置文件
        if (!IS_WRITE) {
            return '由于您的环境不可写， 请开启系统可写权限，以方便安装！';
        } else {
            if (file_put_contents(APP_PATH . 'Common/Conf/config.php', $conf)) {
                show_msg('配置文件写入成功');
            } else {
                show_msg('配置文件写入失败', 'error');
            }
            return '';
        }
    }
}

/*
 * 创建数据表
 * @param resource $db 数据库连接资源
 */

function create_tables($db, $prefix = '')
{
    // 读取SQL文件
    $sql = file_get_contents(MODULE_PATH . 'Data/install.sql');
    $sql = str_replace("\r", "\n", $sql);
    $sql = explode(";\n", $sql);

    // 替换表前缀
//    $orginal = C('ORIGINAL_TABLE_PREFIX');
//    $sql = str_replace("`{$orginal}", "`{$prefix}", $sql); // 此处写法有误

    // 开始安装
    show_msg('开始安装数据库...');
    foreach ($sql as $value) {
        $value = trim($value);
        if (empty($value))
            continue;
        if (substr($value, 0, 12) == 'CREATE TABLE') {
            $name = preg_replace("/^CREATE TABLE `(\w+)` .*/s", "\\1", $value);
            $msg = "创建数据表{$name}";
            if (false !== $db->execute($value)) {
                show_msg($msg . '...成功');
            } else {
                show_msg($msg . '...失败！', 'error');
                session('error', true);
            }
        } else {
            $db->execute($value);
        }
    }
}

function register_administrator($db, $prefix, $admin)
{
    show_msg('开始注册初始管理员帐号...');
    $password = md5($admin['password']);
//(1, 1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1400000000', '1400000000', 0);
    $sql = "INSERT INTO `{$prefix}wb_admin_user` (`gid`, `username`, `password`,`last_login`, `created_time`,`login_count`) VALUES
(1, '{$admin['name']}', '{$password}'," . time() . "," . time() . ",0)";
    //执行sql
    $db->execute($sql);
    show_msg('初始管理员帐号注册完成！');
}

/*
 * 及时显示提示信息
 * @param string $msg 提示信息
 */
function show_msg($msg, $class = '')
{
    echo "<script type=\"text/javascript\">showmsg(\"{$msg}\", \"{$class}\")</script>";
    flush();
    ob_flush();
}