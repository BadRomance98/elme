<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{

	//构造方法
	public function __construct(){
		parent::__construct(); //一定要调用
		//获取分类，并分配到模板
        $user = session('user');
        $this->assign('user',$user);
        if($user) {
           $this->assign('hide',true); 
        }else{
            $this->assign('block',true);
        }
		$cats = D('category')->frontCats();
    	$this->assign('cats',$cats);
    	$this->assign('index',false);
	}
}