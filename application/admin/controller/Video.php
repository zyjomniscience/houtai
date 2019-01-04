<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/26
 * Time: 9:31
 */

namespace app\admin\controller;

use app\common\model\Video as VideoModel;
use think\Controller;
use think\facade\Request;

class Video extends Controller
{
    public function video_list(){
        $data=VideoModel::all();
        $this->assign('data',$data);
        return $this->fetch('video-list');
    }
    public function video_add(){
        return $this->fetch('video-add');
    }
    public function video_del(){
        $id=Request::param('id');
        $data=VideoModel::where('id','=',$id)->find();
        $url=$data['img'];
        unFile($url);
        $data->delete();
    }
    public function changeOrder(){
        $data=Request::param();
        VideoModel::where('id','=',$data['id'])->update(['order'=>$data['value']]);
    }

    public function save(){
        $data=Request::param();
        $file=Request::file('file');

        $info = $file->validate(['size' => 50000000000,
            'ext' => 'jpeg,jpg,png,gif'])->move('uploads/');
        $data['img']=$info->getSaveName();
        if(VideoModel::create($data)){
            $this->success('保存成功');
        }else{
            $this->success('保存失败');
        }
    }
}