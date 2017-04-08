<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
    //登录
    public function  login(){
        if(IS_POST){
            //登录时判断用户名和密码
            $user = M('Users');
            $username = I('post.email');
            //dump($username);
            $password = I('post.password');//密码
            $autoLogin = I('post.autoLogin');//是否记住密码
//            dump($autoLogin);die;
            //设置cookie用来记住用户名
            if($autoLogin == 1){
               cookie('name',$username,30);
            }
            //查询出用户type值判断是公司还是个人
            $type = $user->Field('type')->where(array('username'=>$username))->find();
            //根据用户名查询该用户的信息
            $row = $user->where("username = '$username'")->find();
            $row['login_time'] = time();
            $row['login_ip'] = $_SERVER['REMOTE_ADDR'];
            $pwd = $row['password'];
            //判断用户名和密码是否正确
            if($row){
                if($pwd == md5($password)){
                    //将用户信息存入session
                    $_SESSION['user'] = $row;
                    //登录时修改登录时间，ip也有可能改变
                    $user->save($row);
                    //根据用户type判断是公司还是个人
                    if($type['type']==2){
                        $this->success('登录成功',U('CompanyRegist/step'));//以后跳转到公司主页
                    }else{
                        $this->success('登录成功',U('Index/index'));
                    }

                }else{
                    $this->error('密码有误！');
                }
            }else{
                $this->error('该用户不存在');
            }
            //如果没有post提交直接显示登录页面
        }else{
            //显示登录模板
            $this->display();
        }
    }

}


?>