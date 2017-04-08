<?php
namespace Home\Model;
use Think\Model\RelationModel;

class UsersModel extends RelationModel{

    //自动完成
    protected $_auto = array(
        array('create_time','time',1,'function'),
        array('login_time','time',1,'function'),
        array('login_ip','IP',1,'callback'),
        array('state',1,1,'string'),
        array('password','mymd5',1,'callback'),
    );
    //密码加密
    public function mymd5($str){
        return md5($str);
    }
    //获取IP
    public function IP(){
        return $_SERVER['REMOTE_ADDR'];
    }

    //自动验证
    protected $_validate = array(
        array('username','require','用户名不能为空'),
        array('password','6,16','密码应在6-16位之间',1,'length'),
        array('type','require','请选择您公司或者个人'),

    );


}




?>