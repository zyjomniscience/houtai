<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/13
 * Time: 10:35
 */

namespace app\admin\controller;


use think\Controller;

class Member extends Controller
{
    public function member_list(){
        return $this->fetch('member-list');
    }
    public function member_del(){
        return $this->fetch('member-del');
    }
}