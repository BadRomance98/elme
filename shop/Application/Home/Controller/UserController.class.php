<?php
namespace Home\Controller;
use Think\Controller;

//登录控制器
class UserController extends Controller {
    //显示登录页面并验证
    public function login(){
        if (IS_POST) {
            //获取验证码、用户名和密码
            $username = I('username');
            $password = I('password');
            $captcha = I('captcha');
            //验证,注意顺序
            //先检查验证码
            $verify = new \Think\Verify();
            if (!$verify->check($captcha)){
                $this->error('验证码错误');
            }
            
            //再来检查用户名和密码,调用模型来完成
            if (D('user')->checkUser($username,$password)) {
                $this->success('登录成功',U('Index/index'),1);
            } else {
                $this->error('用户名或密码错误');
            }
            return;
        } 
        // 载入登录页面
        $this->display();
    }

    //生成验证码
    public function code(){
        // 使用tp自带的验证码类
        $Verify = new \Think\Verify();
        $Verify->entry();
    }

    //注销
    public function logout(){
        session('[destroy]'); // 销毁session
        $this->success('注销成功',U('Index/index'),1);
    }
    
    public function reg(){
        if(IS_POST){
            $data['user_name'] = I('user_name');
            $user=D('user');
             $rst = $user-> checkName(I('user_name'));
            if($rst === false){
                 $this -> error('用户名已经注册');
            }
            $data['password'] = I('password');
            $map['repassword'] = I('repassword');
            if($data['password']!== $map['repassword']){
                $this->error('两次输入密码不同');
            }
            $captcha = I('captcha');
            $verify = new \Think\Verify();
            if (!$verify->check($captcha)){
                $this->error('验证码错误');
            }
            if($user->data($data)){
                $user->add();
                $this->success("注册成功",U('Index/index'),2);
                exit;
            }else{
                $this->error($user->getError());
            }
        }
        $this->display();
    }
}