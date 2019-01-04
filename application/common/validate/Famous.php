<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/20
 * Time: 17:40
 */

namespace app\common\validate;


class Famous extends Base
{
    public function __construct(array $rules = [], array $message = [], array $field = [],string $table='famous')
    {
        parent::__construct($rules, $message, $field,$table);
    }
}