<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/17
 * Time: 9:03
 */

namespace app\admin\controller;


use app\common\model\SchoolInfo;
use app\common\validate\SchoolInfo as SchoolInfoValidate;
use app\common\model\SchoolInfo as SchoolInfoModel;
use think\Controller;
use think\facade\Request;

class System extends Controller
{
    public function system_base()
    {
        $data=SchoolInfoModel::find();
        $this->assign('data',$data);
        return $this->fetch('system-base');
    }

    public function saveInfo()
    {
        $data = Request::param();
        unset($data['/admin/system/saveinfo_html']);
        $file = Request::file('logo');
        $info = $file->validate(['size' => 5000000000,
            'ext' => 'jpeg,jpg,png,gif'])->move('uploads/');
        $data['logo'] = $info->getsaveName();
        $validate = new SchoolInfoValidate();
        $data['id']=1;
        if ($validate->check($data) == false) {
            return ['code' => 0, 'message' => $validate->getError()];
        } else {
            if (SchoolInfoModel::count()==0){
                if (SchoolInfo::create($data)){
                    return ['code'=>1,'message'=>'保存成功'];
                }else{
                    return ['code'=>0,'message'=>'保存失败'];
                }
            }else{
                if (SchoolInfoModel::update($data)){
                    return ['code'=>1,'message'=>'更新成功'];
                }else{
                    return ['code'=>0,'message'=>'更新失败'];
                }
            }
        }

    }
}