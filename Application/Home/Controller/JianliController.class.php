<?php
namespace Home\Controller;
use Think\Controller;
class JianliController extends Controller{
    //添加个人简历基本信息
    public function jlAdd(){
        if(IS_POST){
            $resume = D('Resume');
            if($resume->create()){
                if($id = $resume->add()){
                    $this->success('添加成功!',U('jianli'));
                }else{
                    $this->error('添加失败!');
                }
            }else{
                $this->error($resume->getError());
            }
        }else{
            $this->display();
        }
    }




    //个人简历
    public function index(){

    }

    //预览简历
    public function showJianli(){
        $this->display();
    }
}

?>