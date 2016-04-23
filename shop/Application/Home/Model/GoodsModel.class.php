<?php
namespace Home\Model;
use Think\Model;

class GoodsModel extends Model{

	//获取推荐商品
	public function getBestGoods(){
		$condition['is_best'] = 1;
		$condition['is_onsale'] = 1;
		return $this->where($condition)->order('goods_id desc')->limit(4)->select();
	}

    public function getHotGoods() {
        $condition['is_hot'] = 1;
        $condition['is_onsale'] = 1;
        return $this->where($condition)->order('goods_id desc')->limit(4)->select();        
    } 

    public function getNewGoods() {
        $condition['is_new'] = 1;
        $condition['is_onsale'] = 1;
        return $this->where($condition)->order('goods_id desc')->limit(4)->select();        
    }
}