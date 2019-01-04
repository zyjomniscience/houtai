<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/17
 * Time: 12:47
 */

namespace app\common\validate;


use think\Validate;
use think\Db;
class Base extends Validate
{
    public function __construct(array $rules = [], array $message = [], array $field = [],string $table='')
    {
        $require=['require'];
        $rulesBefore=array_flip(array_keys($this->Rules($table)));
        $rules=$this->newArray($rulesBefore);
        $field=$this->Rules($table);
        parent::__construct($rules, $message, $field,$table);

    }


    public function Rules($table){
        $str=sprintf("SELECT COLUMN_NAME,column_comment FROM INFORMATION_SCHEMA.Columns WHERE table_name='%s' AND table_schema='guanwang'",$table);
        $data=Db::query($str);
        $rule=[];
        $field=[];
        foreach ($data as $key=>$value){
            $field[$key]=$value['COLUMN_NAME'];
            $comment[$key]=$value['column_comment'];
        }
        unset($field[0]);
        unset($comment[0]);
        $res=array_combine($field,$comment);
        return $res;
    }
    public function newArray(array $arr){
            foreach ($arr as $key=>$v){
                $arr[$key]='require';
            }
            return $arr;
    }

    protected function isNotEmpty($value, $rule='', $data='', $field='')
    {
        if (empty($value)) {
            return $field . '不允许为空';
        } else {
            return true;
        }
    }
}