<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/25
 * Time: 9:39
 */

namespace app\common\validate;


class TLiuyan extends Base
{
    public function __construct(array $rules = [], array $message = [], array $field = [],string $table='t_liuyan')
    {
        parent::__construct($rules, $message, $field,$table);
    }
}