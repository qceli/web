<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/11
 * Time: 14:09
 */

function mkdirs($path)
{
    if (!is_dir($path)) {
        mkdirs(dirname($path));
        mkdir($path);
    }
    return is_dir($path);
}