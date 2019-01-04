<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/20
 * Time: 11:12
 */

namespace app\common\service;


use app\common\exception\TokenException;
use app\common\exception\WeChatException;
use app\common\model\User as UserModel;
use think\Exception;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;
    public function __construct($code)
    {
        $this->code=$code;
       $this->wxAppID=config('wx.app_id');
        $this->wxLoginUrl=sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);
    }

    public function get(){
        $result=curl_get($this->wxLoginUrl);
        $wxResult=json_decode($result,true);
        if (empty($wxResult)){
            throw new Exception("获取session_key及openid时异常,微信内部错误");
        }else{
            $loginFail=array_key_exists('errcode',$wxResult);
            if ($loginFail){
                $this->processLoginError($wxResult);
            }else{
                $this->grantToken($wxResult);
            }
        }
    }

    private function grantToken($wxResult){
        //拿到openid
        $openid=$wxResult['openid'];
        //数据库里看一下，这个openid是不是已经存在
        $user=UserModel::getOpenId($openid);
        //如果存在，则不处理，如果不存在，那么新增一条user记录
        //生成令牌，准备缓存数据，写入缓存
        if ($user){
            $uid=$user->id;
        }else{
            $uid=$this->newUser($openid);
        }
        //把令牌返回客户端
        $cachedValue=$this->prepareCachedValue($wxResult,$uid);
        $token=$this->saveToCached($cachedValue);
        return $token;
    }
    private function saveToCached($cachedValue){
        $key=self::generateToken();
        $value=json_encode($cachedValue);
        $expire_in=config('setting.token_expire_in');
        $request=cache($key,$value,$expire_in);
        if (!$request){
            throw new TokenException();
        }
        return $key;
    }
    private function prepareCachedValue($wxResult,$uid){
        $cachedValue=$wxResult;
        $cachedValue['uid']=$uid;
        $cachedValue['scope']=16;
        return $cachedValue;
    }
    private function newUser($openid){
        $user=UserModel::create(['openid'=>$openid]);
        return $user->id;
    }
    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg'=>$wxResult['errmsg'],
            'errorCode'=>$wxResult['errorCode'],
        ]);
    }
}