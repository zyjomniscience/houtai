<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/13
 * Time: 16:48
 */

namespace app\admin\controller;


use  app\common\model\Banner;
use think\Controller;
use think\Exception;
use think\facade\Request;


class Picture extends Controller
{
    public function picture_list(){
        $data=Banner::where('type',0)->order('order')->paginate(10);
        $this->assign('data',$data);
        $page = $data->render();
        $this->assign('page', $page);
        return $this->fetch('picture-list');
    }

    public function picture_scenery(){
        $data=Banner::where('type',1)->order('order')->paginate(10);
        $this->assign('data',$data);
        $page = $data->render();
        $this->assign('page', $page);
        return $this->fetch('picture-scenery');
    }

    public function picture_add(){
        $type=Request::get('type');
        $this->assign('type',$type);
        return $this->fetch('picture-add');
    }
    public function picture_show(){
        return $this->fetch('picture-show');
    }
    public function fileUp(){
        $type=Request::get('type');
        $file=Request::file('file');
        $info = $file->validate(['size' => 5000000000,
            'ext' => 'jpeg,jpg,png,gif'])->move('uploads/');
        $data['type']=$type;
        $data['img']=$info->getSaveName();
        Banner::create($data);
    }
    public function picture_del(){
        $id=Request::param('id');
        $data=Banner::where('id','=',$id)->find();
        $url=$data['img'];
        unFile($url);
        $data->delete();
    }
    public function changeOrder(){
        $data=Request::param();
        Banner::where('id','=',$data['id'])->update(['order'=>$data['value']]);
    }

    public function batchDelete(){
        $id=Request::param('id');
        $data=Banner::where('id','in',$id)->select();
        foreach ($data as $key=>$val){
            $url=$val['img'];
            unFile($url);
            $val->delete();
        }
        return ['code'=>1];
    }
}