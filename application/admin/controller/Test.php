<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/14
 * Time: 14:24
 */

namespace app\admin\controller;


use app\common\validate\SchoolInfo;
use think\Controller;
use think\facade\Request;

class Test extends Controller
{
    public function index(){
        return $this->fetch();
    }
    public function fileUp(){
        $file=Request::file('file');
        halt($file);
    }
    public function schoolInfo(){
        $data = [
            'name'  => 'thinkphp',
            'jianxiaotime'=>'111',
        ];
     $v=new SchoolInfo;
     $v->Rules('school_info');
     $result=$v->check($data);
      halt($v->getError());
    }
}