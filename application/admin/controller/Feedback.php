<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/14
 * Time: 11:02
 */

namespace app\admin\controller;


use app\common\model\SLiuyan as SLiuyanModel;
use app\common\model\TLiuyan as TLiuyanModel;
use app\common\validate\TLiuyan as TLiuyanValidate;
use think\Controller;
use think\facade\Request;

class Feedback extends Controller
{
    public function feedback_list(){
        $data=SLiuyanModel::order('create_time','desc')->paginate(10);
        $this->assign('data',$data);
        $page=$data->render();
        $this->assign('page',$page);
        return $this->fetch('feedback-list');
    }
    public function feedback_info(){
        $data=TLiuyanModel::find();
        $this->assign('data',$data);
        return $this->fetch('feedback-info');
    }

    public function content_show(){
        $id=Request::param('id');
        $content=SLiuyanModel::field('content')->find($id);
        $content=($content['content']);
        $this->assign('content',$content);
        return $this->fetch('content-show');
    }

    public function feedback_save()
    {
        $data = Request::param();
        $validate = new TLiuyanValidate();
        $data['id']=1;
        if ($validate->check($data) == false) {
            return ['code' => 0, 'message' => $validate->getError()];
        } else {
            if (TLiuyanModel::count()==0){
                if (TLiuyanModel::create($data)){
                    return ['code'=>1,'message'=>'保存成功'];
                }else{
                    return ['code'=>0,'message'=>'保存失败'];
                }
            }else{
                if (TLiuyanModel::update($data)){
                    return ['code'=>1,'message'=>'更新成功'];
                }else{
                    return ['code'=>0,'message'=>'更新失败'];
                }
            }
        }

    }
}