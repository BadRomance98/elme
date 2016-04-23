<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends BaseController {
    //显示品牌
    public function index(){
        $orderName = I('id');
        if( $orderName ) {
            $condition['user_name'] = array('like',"%$orderName%");
        }
        $order = D('order')->select();
        $count   = D('order')->count();// 查询满足要求的总记录数
        $Page    = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->setConfig('prev',"上一页");
        $Page->setConfig('next',"下一页");
        $show    = $Page->show();// 分页显示输出
        $order = D('order')->limit($Page->firstRow.','.$Page->listRows)->where($condition)->select();
        $this->assign('page',$show);
        $this->assign('order',$order);
        $this->display();
    }

    //添加品牌
    public function add(){
        if (IS_POST) {
            $data['user_id'] = I('user_id');
            $data['user_name'] = I('user_name');
            $data['address_id'] = I('address_id');
            $data['order_amount'] = I('order_amount');
            $data['order_time'] = I('order_time');
            
            //调用模型完成入库
            $order = D('order');
            if ($order->create($data)) {
                //通过验证，创建数据成功
                if ($order->add()){ 
                    $this->success('添加订单成功',U('index'),1);
                } else {
                    //失败
                    $this->success('添加订单失败');
                }
            } else {
                $this->error($order->getError());
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
            $data['order_id'] = I('order_id');
            $data['user_id'] = I('user_id');
            $data['user_name'] = I('user_name');
            $data['address_id'] = I('address_id');
            $data['order_amount'] = I('order_amount');
            $data['order_time'] = I('order_time');
            $order = D('order');
            if ($order->create($data)) {
                if ($order->save()) {
                    $this->success('编辑订单成功',U('index'),1);
                } else {
                    $this->error('编辑订单失败');
                } 
            }else {
                $this->error($order->getError());
            }    

            return;
        }
        $order = M('order')->find($id);
        $this->assign('order',$order);
        $this->display();
    }
    //移除
    public function delete(){
        $id = I('id',0,'int');
        $order = M('order')->find($id);
        if (M('order')->delete($id)) {
            $this->success('删除订单订单成功');
        } else {
            $this->error('删除订单失败');
        }
    }
}