<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
    //显示品牌
    public function index(){
        $userName = I('id');
        if( $userName ) {
            $condition['user_name'] = array('like',"%$userName%");
        }
        $user = D('user')->select();
        $count   = D('user')->count();// 查询满足要求的总记录数
        $Page    = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next',"下一页");
        $show    = $Page->show();// 分页显示输出
        $user = D('user')->limit($Page->firstRow.','.$Page->listRows)->where($condition)->select();
        $this->assign('page',$show);
        $this->assign('user',$user);
        $this->display();
    }

    //添加品牌
    public function add(){
        if (IS_POST) {
            $data['user_id'] = I('user_id');
            $data['user_name'] = I('user_name');
            $data['password'] = I('password');
            //调用模型完成入库
            $user = D('user');
            if ($user->create($data)) {
                //通过验证，创建数据成功
                if ($user->add()){ 
                    $this->success('添加用户成功',U('index'),1);
                } else {
                    //失败
                    $this->success('添加用户失败');
                }
            } else {
                $this->error($user->getError());
            }
            return;
        }
        // 载入添加界面
        $this->display();
    }

    //编辑
    public function edit(){
        $id = I('id',0,'int');
        if (IS_POST) {
            $data['user_id'] = I('user_id');
            $data['user_name'] = I('user_name');
            $data['password'] = I('password');
            $user = D('user');
            if ($user->create($data)) {
                if ($user->save()) {
                    $this->success('编辑用户成功',U('index'),1);
                } else {
                    $this->error('编辑用户失败');
                } 
            }else {
                $this->error($user->getError());
            }    

            return;
        }
        $user = M('user')->find($id);
        $this->assign('user',$user);
        $this->display();
    }
    //移除
    public function delete(){
        $id = I('id',0,'int');
        $user = M('user')->find($id);
        if (M('user')->delete($id)) {
            $this->success('删除用户成功');
        } else {
            $this->error('删除用户失败');
        }
    }
}