<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/10
 * Time: 10:46
 */

namespace app\common\model;


use think\Model;


class Base extends Model
{
    public function getImgAttr($value){
        return config('setting.img_prefix').$value;
    }

}