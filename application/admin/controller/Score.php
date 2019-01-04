<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2019/1/2
 * Time: 14:07
 */

namespace app\admin\controller;


use app\common\model\CjCity;
use app\common\model\CjPscore;
use app\common\model\CjScore;
use think\Controller;
use think\facade\Request;

class Score extends Controller
{
    public function schoolScore()
    {
        $pid=Request::param('pid');

        if (isset($pid)){
            $cjScore=CjCity::getSScoreById($pid);
            $cjScore=$cjScore['c_cj_score'];
            $this->assign('cjScore',$cjScore);
        }
        $this->assign('pid',$pid);
        $city=CjCity::paginate(10);
        $this->assign('city',$city);
        $page=$city->render();
        $this->assign('page',$page);
        return $this->fetch('schoolScore');
    }


    public function delete(){
        $id=Request::param('id');
        if(CjScore::destroy($id)){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    public function save(){
        $pid=Request::param('pid');
        $type=Request::param('type');
        $batch=Request::param('batch');
        $proviceScore=Request::param('provice_score');
        $min=Request::param('min');
        $year=Request::param('year');
        $remarks=Request::param('remarks');

        $data=[];
        foreach ($type as $key=>$val){
            $data['pid']=$pid;
            $data['type']=$val;
            $data['batch']=$batch[$key];
            $data['provice_score']=$proviceScore[$key];
            $data['min']=$min[$key];
            $data['year']=$year[$key];
            $data['remarks']=$remarks[$key];
            if ($key==0&&$data['provice_score']!=''){
                CjScore::create($data);
            }
            if($key>0){
                $up=CjScore::where('id','=',$key)->update($data);
            }
        }
    }

            /*proScore*/

    public function proScore()
    {
        $pid=Request::param('pid');

        if (isset($pid)){
            $cjScore=CjCity::getPScoreById($pid);
            $cjScore=$cjScore['c_c_p_score'];
            $this->assign('cjScore',$cjScore);
        }
        $this->assign('pid',$pid);
        $city=CjCity::paginate(10);
        $this->assign('city',$city);
        $page=$city->render();
        $this->assign('page',$page);
        return $this->fetch('proScore');
    }
    public function pSave(){
        $pid=Request::param('pid');
        $name=Request::param('name');
        $batch=Request::param('batch');
        $proviceScore=Request::param('provice_score');
        $min=Request::param('min');
        $max=Request::param('max');
        $year=Request::param('year');
        $avscore=Request::param('avscore');
        $data=[];
        foreach ($batch as $key=>$val){

            $data['pid']=$pid;
            $data['batch']=$val;
            $data['provice_score']=$proviceScore[$key];
            $data['min']=$min[$key];
            $data['year']=$year[$key];
            $data['name']=$name[$key];
            $data['avscore']=$avscore[$key];
            $data['max']=$max[$key];

            if ($key==0&&$data['provice_score']!=''){

                CjPscore::create($data);
            }
            if($key>0){
                $up=CjPscore::where('id','=',$key)->update($data);
            }
        }
    }
    public function pDelete(){
        $id=Request::param('id');
        if(CjPscore::destroy($id)){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

}