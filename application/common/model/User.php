<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/20
 * Time: 11:04
 */

namespace app\common\model;


class User extends Base {
    public static function getOpenId($openid){
        $user=self::where('openid','=',$openid)->find();
        return $user;
    }
}