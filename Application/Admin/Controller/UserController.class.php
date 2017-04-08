<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
    //显示个人用户的信息
    public function index(){
//        查询所有用户
        $doc=M('Users');
        //实例化分页
        $count=$doc->count();
        $Page=new \Think\Page($count,10);
        $data= $doc->limit($Page->firstRow,$Page->listRows)->select();
        $Page->setConfig('header','<span class="rows">共 {$count} 条记录</span>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show=$Page->show();

        $this->assign('show',$show);
        $this-> assign('data',$data);
//        echo "<pre>";
//        print_r($date);
        $this->display('introduce');
    }

    //修改用户状态
        public function editUserState(){
            $id=I('get.id');
            $arr['state']=I('get.state');
//        echo $id;
//        echo $arr['state'];
//        die;
//   判断当前的状态是1的话 修改为0   是0 修改为1
            if($arr['state'] == 0){
                $arr['state']=1;
                M('Users')->where("id = $id")->save($arr);
                $this->success('修改成功',U('index'));
            }else{
                $arr['state']=0;
                M('Users')->where("id = $id")->save($arr);
                $this->success('修改成功',U('index'));

            }

    }

}

?>