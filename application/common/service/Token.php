<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/29
 * Time: 9:04
 */

namespace app\common\service;


class Token
{
    public static function generateToken()
    {
        //32个字符串组成一组随机字符串
        $randChars=getRandChar(32);
        //用3组字符串进行md5加密
        $timestamp=$_SERVER['REQUEST_TIME_FLOAT'];
        //salt
        $salt=config('secure.token_salt');

        return md5($randChars.$timestamp.$salt);
    }
}