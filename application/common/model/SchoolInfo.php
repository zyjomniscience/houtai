<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/17
 * Time: 9:06
 */

namespace app\common\model;


class SchoolInfo extends Base
{
    protected $pk='id';
    protected $table='school_info';

    public function getLogoAttr($value){
        return config('setting.img_prefix').$value;
    }
}