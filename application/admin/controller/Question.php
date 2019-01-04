<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/28
 * Time: 14:34
 */

namespace app\admin\controller;


use think\Controller;
use app\common\model\Question as QuestionModel;
use think\facade\Request;

class Question extends Controller
{
    public function question_list(){
        $data=QuestionModel::order('create_time','desc')->paginate(10);
        $this->assign('data',$data);
        $page=$data->render();
        $this->assign('page',$page);
        return $this->fetch('question-list');
    }

    public function question_add(){
        $id=Request::get('id');
        $data=QuestionModel::where('id',$id)->find();
        $this->assign('data',$data);
        return $this->fetch('question-add');
    }

    public function changeOrder(){
        $data=Request::param();

        QuestionModel::where('id','=',$data['id'])->update(['order'=>$data['value']]);
    }

    public function save(){
        $data=Request::param();

        if (isset($data['id'])) {
            if (QuestionModel::update($data)){
                return $this->success('更新成功');
            }else
                return $this->error('更新失败');
        }else{
            if (QuestionModel::create($data)){
                return $this->success('保存成功');
            }else
                return $this->error('保存失败');
        }

    }

    public function question_del(){
        $id=Request::param('id');
        QuestionModel::where('id','=',$id)->delete();
        return ['code'=>1];
    }
}