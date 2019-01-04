<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/14
 * Time: 10:38
 */

namespace app\admin\controller;

use app\common\model\AdmissionInfo;
use app\common\model\AdmissionPic;
use think\facade\Request;

class Article extends Controller
{
    public function article_list(){
        $data=AdmissionInfo::order('create_time','desc')->paginate(10);
        $this->assign('data',$data);
        $page=$data->render();
        $this->assign('page',$page);
        return $this->fetch('article-list');
    }
    public function fileUp(){
        $file=Request::file('file');
        $info = $file->validate(['size' => 5000000000,
            'ext' => 'jpeg,jpg,png,gif'])->move('uploads/');
        $data['img']=$info->getSaveName();
        AdmissionPic::create($data);
    }
    public function article_add(){
        $id=Request::get('id');
        $data=AdmissionInfo::where('id',$id)->find();
        $this->assign('data',$data);
        return $this->fetch('article-add');
    }

    public function art_pic_add(){
        return $this->fetch('acticle-pic-add');
    }

    public function changeOrder(){
        $data=Request::param();

        AdmissionPic::where('id','=',$data['id'])->update(['order'=>$data['value']]);
    }
    public function changePid(){
        $data=Request::param();

        AdmissionPic::where('id','=',$data['id'])->update(['pid'=>$data['value']]);
    }
    public function art_pic(){
        $data=AdmissionPic::order('pid')->order('order')->paginate(10);
        $this->assign('data',$data);
        $page=$data->render();
        $this->assign('page',$page);
        return $this->fetch('article_pic');
    }
    public function picture_del(){
        $id=Request::param('id');
        $data=AdmissionPic::where('pid','=',$id)->select();
        $data2=AdmissionInfo::where('id','=',$id);
        $url=$data['img'];
        unFile($url);
        $data->delete();
        $data2->delete();
    }

    public function save(){
        $data=Request::param();

        if (isset($data['id'])) {
            if (AdmissionInfo::update($data)){
                return $this->success('更新成功');
            }else
                return $this->error('更新失败');
        }else{
            if (AdmissionInfo::create($data)){
                return $this->success('保存成功');
            }else
                return $this->error('保存失败');
        }

    }
    public function batchDelete(){
        $id=Request::param('id');
        $data=AdmissionPic::where('id','in',$id)->select();
        foreach ($data as $key=>$val){
            $url=$val['img'];
            unFile($url);
            $val->delete();
        }
        return ['code'=>1];
    }
    public function article_del(){
        $id=Request::param('id');
        $data=AdmissionPic::where('pid','in',$id)->select();
        foreach ($data as $key=>$val){
            $url=$val['img'];
            unFile($url);
            $val->delete();
        }
        AdmissionInfo::where('id','=',$id)->delete();
        return ['code'=>1];
    }
}