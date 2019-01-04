<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/24
 * Time: 17:30
 */

namespace app\index\controller\v1;


use think\Controller;
use app\common\model\Famous as FamousModel;

class Famous extends Controller
{
    public function getFamous(){
        $data=FamousModel::all();
        return json($data);
    }
}