<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/21
 * Time: 13:45
 */

namespace app\common\exception;


use think\Exception;

class WeChatException extends Exception
{
    public $code=400;
    public $msg="微信服务器调用接口失败";
    public $errorCode=999;
}