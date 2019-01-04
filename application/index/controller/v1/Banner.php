<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/19
 * Time: 10:37
 */

namespace app\index\controller\v1;


use think\Controller;
use app\common\model\Banner as BannerModel;
class Banner extends Controller
{
    public static function getBanner(){
        $banner=BannerModel::where('type','=',0)->select();
        return json_encode($banner);
    }

    public static function getScenery(){
        $banner=BannerModel::where('type','=',1)->select();
        return json_encode($banner);
    }
}