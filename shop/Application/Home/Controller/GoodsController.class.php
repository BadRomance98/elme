<?php
namespace Home\Controller;
use Think\Controller\RestController;
class GoodsController extends BaseController{
	//获取商品详情
	public function index(){
        $hotGoods = D('goods')->getHotGoods();
        $this->assign('hotGoods',$hotGoods); 
        if($user) {
           $this->assign('index',true); 
        }
		$goods_id = I('id',0,'int');
		$data['goods_id'] = $goods_id;
		$type_id = D('goods')->where($data)->getField('type_id');
		$attr['type_id'] = $type_id;
		$attr_name = D('attribute')->where($attr)->select();
		$this->assign('attr',$attr_name);
		$cat_id = I('cate_id',0,'int');
		$parentCats = D('category')->getParents($cat_id);
		$this->assign('parentCats',$parentCats);
		$condition['goods_id'] = $goods_id;
		//获取商品基本信息
		$goods = M('goods')->find($goods_id);
		//获取商品的扩展信息
		$attrs = M('goods_attr')->where($condition)->select();
		$this->assign('attrs',$attrs);
		$this->assign('goods',$goods);
		$this->display();
	}

	public function shopCar() {
		if (IS_POST) {
			//入库
			$data['user_id'] = session('user_id');
			$map['user'] = session('user');
			$data['user_id'] = $map['user']['user_id'];
			$data['goods_id'] = I('goods_id');
			$data['goods_name'] = I('goods_name');
			$data['sell_number'] = I('sell_number');
			$data['shop_price'] = I('shop_price');
			$data['goods_img'] = I('goods_img');
			$data['subtotal'] = $data['sell_number']*$data['shop_price'];
			$cart = D('cart');
			if ($cart->create($data)) {
				//通过验证,则插入
				if ($cart->add()) {
					$now = '添加成功';
					$this->ajaxReturn($now);
				} else {
					$now = '添加失败';
					$this->ajaxReturn($now);
				}
			} else {
				//没有通过验证，则提示错误信息
				$this->error($cart->getError());
			}
			return;
			}
	}

	public function edit(){
		if (IS_POST) {
			$map['goods_id'] = I('goods_id');
			$data['sell_number'] = I('sell_number');
			$click_count = D('goods')->where($map)->getField('click_count');
			$goods_number = D('goods')->where($map)->getField('goods_number');
			$click_count = $click_count + $data['sell_number'];
			$goods_number = $goods_number - $data['sell_number'];
			$goods = M('goods');
			$condition = array('click_count'=>$click_count,'goods_number'=>$goods_number);
			$result = $goods-> where($map)->setField($condition);
			    if($result !== false){
					$now = '更改成功';
					$this->ajaxReturn($now);
			    }else{
					$now = '更改失敗';
					$this->ajaxReturn($now);
			    }

		}
	}
}
