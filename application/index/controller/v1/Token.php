<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/20
 * Time: 10:33
 */

namespace app\index\controller\v1;


use app\common\service\UserToken;
use app\common\validate\TokenGet;
use think\Controller;

class Token extends Controller
{
    public function getToken($code){
        $tokenGet=new TokenGet();
        $tokenGet->check($code);
        $ut=new UserToken($code);
        $token=$ut->get();
        return [
            'token'=>$token
        ];
    }
}