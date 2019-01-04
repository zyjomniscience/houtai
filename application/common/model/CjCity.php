<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/25
 * Time: 11:44
 */

namespace app\common\model;


class CjCity extends Base
{
    protected $hidden=['pinyin','status'];
    public function CCjScore()
    {
        return $this->hasMany('CjScore','pid','id');
    }
    public function CCPScore()
    {
        return $this->hasMany('CjPscore','pid','id');
    }

    public static function getSScoreById($id)
    {
        $data = self::with(['CCjScore'])
            ->find($id);
        return $data;
    }
    public static function getPScoreById($id)
    {
        $data = self::with(['CCPScore'])
            ->find($id);
        return $data;
    }
}