<?php
namespace Home\Controller;
use Think\Controller;
class RegistController extends Controller
{
    //ajax判断用户名
    public function ajax_get_user(){
        $username = I('get.username');
        $data = M('User');
        $row = $data->where("username = '$username'")->select();
        if($row){
            $a = 1;
        }else{
            $a = 2;
        }
        $this->ajaxReturn($a, 'json');

    }


    public function regist()
    {
        if (IS_POST) {
            $user = D('Users');
            $res = I('post.');
            //判断用户名是否存在
            $username = I('post.username');
            $date = $user->where("username='$username'")->find();
            if ($date) {
                $this->error('用户已存在');
            }
            if(empty($username)){
                $this->error('用户名不能为空');
            }

            //正则验证邮箱
            //4-16个字符，可以使用英文小写，数字，下划线，下划线不在首尾
            $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
            $email_address = $res['username'];
            if (! preg_match( $pattern, $email_address ) ){
                $this->error('请使用正确的邮箱格式');
            }


            //添加数据
            if($a = $user->create()){
                if($user->add()){

                    $this->success('注册成功',U('Login/login'));
                }else{
                    $this->error('注册失败');
                }
            }else{
                $this->error($user->getError());
                //getError方法可以获取到是因为什么，数据创建失败
            }
//            //判断用户名
//            $username = I('post.email');
////            dump($username);die;
//            ///$password= I('post.email');
//            $date = $user->where("username='$username'")->find();
//            if ($date) {
//                $this->error('用户已有');
//            }
//            //获取注册数据
//            $data['username'] = I('post.email');
//            $data['password'] = md5(I('post.password'));
//            $data['type'] = I('post.type');
//            $data['create_time'] = time();
//            $data['login_time'] = time();
//            $data['login_ip'] = $_SERVER['REMOTE_ADDR'];
//            $data['state'] = 1;
////            dump($data);die;
//            //添加数据
//            if ($user->data($data)->add()) {
//                $this->success('添加成功',U('CompanyRegist/step_1'));
//            } else {
//
//            $this->error('失败');
//            }
        } else {
            $this->display();

        }


    }
}

?>