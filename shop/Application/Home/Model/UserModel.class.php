<?php
namespace Home\Model;
use Think\Model;
//后台管理员模型
class UserModel extends Model {

    protected $_validate = array(
        array('user_name','require','用户名不得为空！',0,'regex',3),
        array('repassword','password','确认密码不正确',0,'confirm'),
    );
    //验证用户名和密码
    public function checkUser($username,$password){
        $condition['user_name'] = $username;
        $condition['password'] = $password;
        if ($user = $this->where($condition)->find()) {
            //成功，保存session标识，并跳转到首页
            session('user',$user);
            return true;
        } else {
            return false;
        }
    }

    function checkName($name){
        $info = $this -> getByUser_name($name);
        var_dump($name);
        if($info != null){
                    return false;
                }else{
                    return $info;
                }
         }
}