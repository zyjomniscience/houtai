<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/13
 * Time: 9:17
 */

namespace app\admin\controller;


use think\Controller;

class Welcome extends Controller
{
    public function welcome(){
        return $this->fetch('welcome');
    }
}