<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends BaseController{
    public function index() {
        $data = session('user');
        $conditon['user_id'] = $data['user_id'];
        $order = D('order')->where($conditon)->select();
        $this->assign('order',$order);
        $this->display();
    }
}