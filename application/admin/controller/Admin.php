<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/13
 * Time: 15:14
 */

namespace app\admin\controller;

use app\common\model\Admin as AdminModel;
use think\facade\Request;
use think\Controller;

class Admin extends Controller
{
    //角色管理界面
    public function admin_role(){
        $data=AdminModel::all();
        $this->assign('data',$data);
        return $this->fetch('admin-role');
    }

    public function admin_role_add(){
        return $this->fetch('admin-role-add');
    }
    //插入管理员
    public function insertAdmin(){
        $data=Request::param();
        $admin=AdminModel::create($data);
        $this->success('添加管理员成功');
    }
    //删除管理员
    public function delete(){
        $userId=Request::param('userId');
        AdminModel::get($userId)->delete();
    }
}