<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/17
 * Time: 10:12
 */

namespace app\common\validate;


use think\Validate;

class SchoolInfo extends Base
{
public function __construct(array $rules = [], array $message = [], array $field = [],string $table='school_info')
{
    parent::__construct($rules, $message, $field,$table);
}

}