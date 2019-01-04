<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/10
 * Time: 10:45
 */

namespace app\admin\controller;


use  app\common\model\Admin as AdminModel;
use think\Controller;
use think\facade\Request;
use think\facade\Session;

class Index extends Controller
{
    public function index(){
        if (!Session::has('nickname')){
            $this->redirect('login/login');
        }
        $id=Session::get('id');
        $data=AdminModel::get($id);
        $this->assign('data',$data);
        return $this->fetch('index');
    }

}