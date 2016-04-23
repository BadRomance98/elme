<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
    	//获取推荐商品
        $bestGoods = D('goods')->getBestGoods();
        $this->assign('bestGoods',$bestGoods);      
        $hotGoods = D('goods')->getHotGoods();
        $this->assign('hotGoods',$hotGoods);    	
        $newGoods = D('goods')->getNewGoods();
    	$this->assign('newGoods',$newGoods);
    	$this->assign('index',true);
    	$this->display();
    }
}