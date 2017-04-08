<?php
namespace Admin\Controller;
use Think\Controller;
class CompanyController extends Controller
{
    //显示公司用户信息
    public function index()
    {
        $doc = M('company');
        //实例化分页
        $count = $doc->count();
        $Page = new \Think\Page($count, 10);
        $date = $doc->limit($Page->firstRow, $Page->listRows)->select();
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('theme', '%FIRST%　%UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $show = $Page->show();
        $this->assign('show', $show);
//        echo "<pre>";
//        print_r($date);
        $this->assign('date', $date);
        $this->display('company');
    }

    //删除公司用户
    public function delete()
    {
        $doc = M('Company');
        $id = I('get.id');
        if ($doc->delete($id)) {
            $this->success('删除成功', U('index'));
        } else {
            $this->error('删除失败');


        }
    }

    //修改公司信息
    public function edit()
    {
        $doc = M('Company');
        $id = I('get.id');
        $data = $doc->select($id);
//        echo "<pre>";
//        print_r($data);
        $this->assign('data', $data);
        $this->display('save');
    }

    //获取修改公司的信息
    public function getEdit()
    {
        $id = $_POST['id'];

//        $doc=M('Company');
        $arr = I('post.');
//        echo "<pre>";
//        var_dump(M('Company')->save($_POST));
//        die;
        if (false !== M('Company')->where("id = $id")->save($arr)) {
            $this->success('修该成功', U('index'));
        } else {
            $this->error('修改失败');
        }
    }

    //修改公司的状态
    public function editCompanyState()
    {
        $id = I('get.id');
        //            echo $id;
        $data = M('Company')->find($id);
        //            echo "<pre>";
        //            print_r($data);
        //            die;
        $this->assign('data', $data);
        $this->display('editCompanyState');

    }

    //获取修改公司的状态
    public function getEditCompanyState()
    {
        $id = I('get.id');
        $arr = I('post.');
        //            echo $id;
        //            echo $arr;
        //            print_r($arr);
        if (false !== M('Company')->where("id = $id")->save($arr)) {
            $this->success('修改成功', U('index'));
        } else {
            $this->error('修改失败');
        }

    }
    //申请认证公司的列表
    public function CompanyList()
    {
        $doc = M('company');
        $date = $doc->where("state = 3")->select();
        $this->assign('date', $date);
        $this->display('companyList');
    }
    //操作公司的申请
    public function byState(){
        $id=I('get.id');
        $arr['state']=I('get.state');
//        echo $id;
//        echo $arr['state'];
//        die;
//   判断当前的状态是3的话 修改为1
        if($arr['state'] == 3){
            $arr['state']=1;
            M('Company')->where("id = $id")->save($arr);
            $this->success('修改成功',U('CompanyList'));
        }

    }
}