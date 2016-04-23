<?php
namespace Home\Controller;
use Think\Controller;
class AddressController extends BaseController{

    public function index() {
        $address = D('address')->select();
        $this->assign('address',$address);
        $this->display();
    }

    public function add() {

        if (IS_POST) {
            //入库
            $data['user_id'] = session('user_id');
            $map['user'] = session('user');
            $data['user_id'] = $map['user']['user_id'];
            $now = file_get_contents('php://input');
            $value = json_decode($now,TRUE);
            $data['consignee'] = $value['consignee'];
            $data['province'] = $value['province'];
            $data['city'] = $value['city'];
            $data['district'] = $value['district'];
            $data['street'] = $value['street'];
            $data['zipcode'] = $value['zipcode'];
            $data['mobile'] = $value['mobile'];
            $address = D('address');
            if ($address->create($data)) {
                //通过验证,则插入
                if ($address->add()) {
                    $now = 'ok';
                    $this->ajaxReturn($now);
                } else {
                    $this->error('添加属性失败');
                }
            } else {
                //没有通过验证，则提示错误信息
                $this->error($address->getError());
            }
            return;
        } 
    }

    public function delete(){
        $address_id = I('id',0,'int');
        var_dump($address_id);
        if (M('address')->delete($address_id)) {
            $this->success('删除地址成功',U('index'),1);
        } else {
            $this->error('删除地址失败');
        }
    }
}