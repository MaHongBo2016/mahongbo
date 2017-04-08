<?php
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends Controller{
    //会员管理
    public function manager(){
        $data=M('admin')->select();
//        echo "<pre>";
//        print_r($data);
//        die;
        $this->assign('data',$data);
        $this->display('manager');
    }
    //添加管理员
    public function add(){
    	if(IS_POST){
    		

    	}else{
    		$this->display('add');
    	}
    	
    }
    //设置等级权限
    public function fit(){

    }

}

?>