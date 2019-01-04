<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/12
 * Time: 16:53
 */

namespace app\admin\controller;

use  app\common\model\Admin as AdminModel;
use think\Controller;
use think\facade\Request;
use think\facade\Session;
class Login extends Controller
{
    public function login(){
        return $this->fetch('login');
    }
    public function loginCheck(){
        $data=Request::param();
        if ($data['nickname']==''){
            return ['message'=>'请填写账户名','code'=>1];
        }
        if ($data['password']==''){
            return ['message'=>'请填写密码','code'=>1];
        }
        $result=AdminModel::get(function ($query) use ($data){
            $query->where('nickname',$data['nickname'])
                ->where('password',md5($data['password']));
        }
        );
        if ($result==null){
            return ['message'=>'密码错误','code'=>1];
        }else{
            Session::set('id',$result->id);
            Session::set('nickname',$result->nickname);
            return ['message'=>'正在登陆','code'=>0];
        }


    }
}