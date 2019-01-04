<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');
//Banner获取
Route::get(':v/getBanner','index/:v.Banner/getBanner');
//风景获取
Route::get(':v/getScenery','index/:v.Banner/getScenery');
//获取token
//Route::post('getToken','index/v1.Token/getToken');
//获取名人信息
Route::get(':v/getFamous','index/:v.Famous/getFamous');

//获取学校信息
return [

];
