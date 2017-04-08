<?php
namespace Admin\Controller;
use Think\Controller;
class JodpostController extends Controller{
    //显示职位列表
    public function index(){
        $jod = D('Job_category');
        $data= $jod->select();
//        echo "<pre>";
//        print_r($data);//die();
        $this->assign('data',$data);
        $this->display();
    }

    //删除职位
    public function delete(){
        if (M('Job_category')->delete($_GET['id'])){
            $this->success('删除成功',U('index'));
        }else{
            $this->error('删除失败');
        }
    }

    //显示添加模板
    public function add(){
        //根据有没有post表单,来判断,是否
        if(IS_POST){
            $dept = M('Job_category');
//            dump($_POST);
            $post = I('post.');
            if($id = $dept->add($post)){
                $this->success('添加成功,最新id='.$id,U('index'));
            }else{
                $this->error('添加失败');
            }
        }else{
            //取出所有的部门,并分配到模板
            $this->assign('dept',M('Job_category')->select())->display();
        }

    }





}
?>