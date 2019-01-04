<?php
/**
 * Created by PhpStorm.
 * User: 74985
 * Date: 2018/12/14
 * Time: 11:19
 */

namespace app\admin\controller;


use app\common\model\Famous as FamousModel;
use app\common\validate\Famous as FamousValidate;
use think\Controller;
use think\Db;
use think\Exception;
use think\facade\Request;
use think\facade\Validate;

//明人
class Product extends Controller
{
    public function product_brand()
    {
        $data = FamousModel::all();
        $this->assign('data', $data);
        return $this->fetch('product-brand');
    }

    public function product_add()
    {
        return $this->fetch('product_add');
    }

    public function product_edit()
    {
        $id = Request::get('id');
        $data = FamousModel::find();
        $this->assign('data', $data);
        return $this->fetch('product_add');
    }

    public function save()
    {
        $data = Request::param();
        if (isset($data['id'])) {
            unset($data['/admin/product/save_html']);
            $validate = Validate::make([
                'name'  => 'require',
                'describe'=>'require'
            ]);
            if (!$validate->check($data)){
                return ['code' => 0, 'message' => $validate->getError()];
            }
            Db::startTrans();
            try {
                Db::name('famous')->update($data);
            } catch (\Exception $e) {
                Db::rollback();
            }
            return ['code' => 1, 'message' => '更新成功'];

        } else {
            $file = Request::file('img');
            $info = $file->validate(['size' => 5000000000,
                'ext' => 'jpeg,jpg,png,gif'])->move('uploads/');
            $validate = new FamousValidate();
            $data['img'] = $info->getsaveName();
            if ($validate->check($data) == false) {
                return ['code' => 0, 'message' => $validate->getError()];
            }
            unset($data['/admin/product/save_html']);
            Db::startTrans();
            try {
                Db::name('famous')->insert($data);
            } catch (\Exception $e) {
                Db::rollback();
            }
            return ['code' => 1, 'message' => '保存成功'];

        }

    }

    public function delete(){
        $id=Request::param('id');
        $data=FamousModel::where('id','=',$id)->find();
        $url=$data['img'];
        unFile($url);
        $data->delete();
    }
}