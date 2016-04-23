<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends BaseController {
	public function index(){
        $hotGoods = D('goods')->getHotGoods();
        $this->assign('hotGoods',$hotGoods); 
        $cat_id = I('id',0,'int');
        $isAsc = I('asc');
        $parentCats = D('category')->getParents($cat_id);
        $this->assign('parentCats',$parentCats);
        $condition['cat_id']= D('category')->getCurrentCateId($parentCats);
        $firstId = (int)$condition['cat_id'];
        $goods = D('goods')->where($condition)->select();
        //获取当前分类下(包括后代所有)所有的商品
        if(count($goods)<1) {
            $now = D('category')->field('cat_id')->select();
            foreach ($now as $key) {
                if($key['cat_id']>$condition['cat_id']) {
                   $goods[] = D('goods')->where($key)->select();
                }
            }
            $allGoods= D('category')->array_get_by_key($goods,'cat_id');
            foreach ($allGoods as $key) {
                $condition['cat_id'] = (int)json_decode($key);
            }
            if($isAsc == '1'){
                $goods = D('goods')->where($condition)->order('click_count asc')->select();
            } else if($isAsc == '2'){
                $goods = D('goods')->where($condition)->order('click_count desc')->select();
            } else if($isAsc == '3') {
                $goods = D('goods')->where($condition)->order('shop_price desc')->select();

            } else if($isAsc == '4') {
                $goods = D('goods')->where($condition)->order('shop_price asc')->select();
            } else {
                $goods = D('goods')->where($condition)->select();
            }
            $this->assign('goods',$goods);
            $this->display();
        }else{
            $this->assign('goods',$goods);
            $this->display();            
        }
}
}