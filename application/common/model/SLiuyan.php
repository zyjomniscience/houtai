<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/25
 * Time: 9:31
 */

namespace app\common\model;


use think\Model;

class SLiuyan extends Model
{
    protected $autoWriteTimestamp = true;
    public function getTypeAttr($value){
        switch ($value){
            case 0:return "文科";
            case 1:return "理科";
            case 2:return "艺术";
        }
    }
}