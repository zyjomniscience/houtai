<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/29
 * Time: 10:22
 */

namespace app\common\exception;


class TokenException extends BaseException
{
    public $code=401;
    public $msg='Token已过期或无效Token';
    public $errorCode=10001;
}