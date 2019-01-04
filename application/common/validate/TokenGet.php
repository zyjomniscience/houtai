<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/20
 * Time: 10:34
 */

namespace app\common\validate;


use think\Validate;

class TokenGet extends Validate
{
    protected $rule=['code'=>'require|isNotEmpty'];
    protected $message=['code'=>'需要传输code,才能获取token'];
}