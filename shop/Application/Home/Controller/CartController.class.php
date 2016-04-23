<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends BaseController{

    public function index() {
        $data = session('user');
        $conditon['user_id'] = $data['user_id'];
        $cart = D('cart')->where($conditon)->select();
        $this->assign('cart',$cart);
        $address = D('address')->select();
        $this->assign('address',$address);
        $this->display();
    }

    public function submitOrder() {
        if (IS_POST) {
            //入库
        $map['user'] = session('user');
        $data['user_id'] = $map['user']['user_id'];
        $data['user_name'] = $map['user']['user_name'];
        $data['goods_name'] = I('goods_name');
        $data['address_id'] = I('address_id');
        $data['order_amount'] = I('order_amount');
        $data['order_time'] = I('order_time');
        $order = D('order');
            if ($order->create($data)) {
                //通过验证,则插入
                if ($order->add()) {               
                    $now = '提交订单成功';
                    $this->ajaxReturn($now,'eval');
                } else {
                    $this->error('添加商品失败');
                }
            } else {
                //没有通过验证，则提示错误信息
                $this->error($order->getError());
            }

            return;
        } 
    }

    public function delete(){
        $cart_id = I('id',0,'int');
        if (M('cart')->delete($cart_id)) {
            $this->success('删除购物车商品成功',U('index'),1);
        } else {
            $this->error('删除购物车商品失败');
        }
    }
}