<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class SearchController extends Controller {
    //显示列表页面
    public function index(){
//        echo count($_GET);die;
        //如果get值为空,清空session
        if (count($_GET) == 0){
//            session_destroy();
            session(null);
            //如果get值为6,说明是在搜索页点击查询
        }elseif(count($_GET) == 6){
            foreach ($_GET as $key=>$value){
                if ($value != null){
                    $_SESSION[$key] = $value;
                }
            }
            //如果get值为1,说明是在外部点击搜索
        }elseif (count($_GET) == 1){
            //从外部点击搜索先将session清空
            session(null);
            $_SESSION['job'] = $_GET['name'];
        }

        $this->assign('search_c',$_SESSION);
        $this->display('list');
    }

    //删除职位选项
    //点击已选项后面的小叉号,清除当前选项值
    public function clearCon(){
        unset($_SESSION[$_GET['id']]);
        $this->assign('search_c',$_SESSION);
        $this->display('list');
    }

    //搜索职位
    public function search(){
        header("content-type:text/html;charset=utf-8");

        //获取判断条件
        if ($_SESSION['salary'] == '2k以下'){
            $map['j.salary_high'] = array('ELT',2);
        }elseif ($_SESSION['salary'] == '2k-5k'){
            $map['j.salary_high'] = array('EGT',2);
            $map['j.salary_low'] = array('ELT',5);
        }elseif ($_SESSION['salary'] == '5k-10k'){
            $map['j.salary_high'] = array('EGT',5);
            $map['j.salary_low'] = array('ELT',10);
        }elseif ($_SESSION['salary'] == '10k-15k'){
            $map['j.salary_high'] = array('EGT',10);
            $map['j.salary_low'] = array('ELT',15);
        }elseif ($_SESSION['salary'] == '15k-25k'){
            $map['j.salary_high'] = array('EGT',15);
            $map['j.salary_low'] = array('ELT',25);
        }elseif ($_SESSION['salary'] == '25k-50k'){
            $map['j.salary_high'] = array('EGT',25);
            $map['j.salary_low'] = array('ELT',50);
        }elseif ($_SESSION['salary'] == '2k-5k'){
            $map['j.salary_low'] = array('EGT',50);
        }

        if ($_SESSION['workyear'] == '不限'){}
        elseif ($_SESSION['workyear'] != null){
            $map['j.work_year'] = $_SESSION['workyear'];
        }
        if ($_SESSION['edu'] == '不限'){}
        elseif ($_SESSION['edu'] != null){
            $map['j.edu'] = $_SESSION['edu'];
        }

        if ($_SESSION['nature'] != null){
            $map['j.nature'] = $_SESSION['nature'];
        }

        if ($_SESSION['job'] != null){
            $map['j.name'] = array('LIKE','%'.$_SESSION['job'].'%');
        }
        if ($_SESSION['city'] == '全国'){}
        elseif ($_SESSION['city'] != null){
            $map['j.city'] = $_SESSION['city'];
        }

        $job_model = M('Job');
        //统计查询总数
        $count = $job_model->alias('j')->
        join('left join (lg_company c, lg_scale s ,lg_stage t) on (j.company_id=c.id and c.scale=s.type and j.state=t.type)')->
        where($map)->
        count();

        $sul = $job_model ->alias('j')->
        field('j.id,j.name,j.city,j.salary_high,j.salary_low,j.work_year,j.edu,j.welfare,j.create_time,c.short_name,c.trade,c.id cid,s.num,t.stage_name')->
        join('left join (lg_company c, lg_scale s ,lg_stage t) on (j.company_id=c.id and c.scale=s.type and j.state=t.type)')->
        order(array('j.create_time' => 'desc'));


        $Page = new \Think\Page($count,11);

        $rec = $sul->where($map)->
        limit($Page->firstRow, $Page->listRows)->
        select();
        foreach ($rec as $key => $value) {
            $tag_model = M('Company_tag');
            $cid = $value['cid'];
            //$sql = "SELECT lg_tag.name FROM lg_tag RIGHT JOIN lg_company_tag ON lg_tag.id = lg_company_tag.tag_id WHERE company_id = $cid LIMIT 6";
            $data = $tag_model->alias('c')->
            field('t.name')->
            join('left join lg_tag t on (t.id = c.tag_id)')->
            where(array('c.company_id' => $cid))->
            limit(0, 6)->
            select();
            $rec[$key]['tag'] = $data;
        }
        $Page->setConfig('first','最新发布');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $show = $Page->show();
        $this->assign('count',$count);
        $this->assign('show',$show);
        $this->assign('rec',$rec);
        $this->display('content');
    }
    //公司查询页
    public function com_index()
    {
        header("content-type:text/html;charset=utf-8");
        if (count($_GET) == 4) {
            foreach ($_GET as $key => $value) {
                if ($value != null) {
                    //如果值为clean,说明是要取消选择
                    if ($value == 'clean') {
                        $_SESSION[$key] = '';
                    } else {
                        $_SESSION[$key] = $value;
                    }
                }
            }
        } elseif (count($_GET) == 1) {
            foreach ($_GET as $key => $value) {
                session(null);
                if ($key == 'name') {
                    $_SESSION['keyword'] = $value;
                } else {
                    $_SESSION[$key] = $value;
                }

            }
        } elseif (count($_GET == 0)) {
            session(null);
        }
        $this->assign('choice', $_SESSION);
        $this->display('companylist');
    }

    public function company_search()
    {
        if ($_SESSION['keyword'] != null) {
            $map['c.short_name'] = array('LIKE', '%' . $_SESSION['keyword'] . '%');
        }
        if ($_SESSION['city'] != null) {
            $map['c.city'] = $_SESSION['city'];
        }
        if ($_SESSION['trade'] != null) {
            $map['c.trade'] = $_SESSION['trade'];
        }
        if ($_SESSION['stage'] != null) {
            $map['s.stage_name'] = $_SESSION['stage'];
        }

        $company_Model = M('Company');
        //统计查询总数
        $count = $company_Model->
        alias('c')->
        field('c.id,c.short_name,c.LOGO,c.trade,c.city,s.stage_name')->
        join('left join (lg_stage s) on (c.stage = s.type)')->
        where($map)->
        count();

        $res = $company_Model->
        alias('c')->
        field('c.id,c.short_name,c.LOGO,c.trade,c.city,s.stage_name')->
        join('left join (lg_stage s) on (c.stage = s.type)')->
        where($map);

        $Page = new Page($count, 9);
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $data = $res->limit($Page->firstRow, $Page->listRows)->
        select();
        foreach ($data as $key => $value) {
            $job_Model = M('Job');
            $cid = $value['id'];
            $job = $job_Model->alias('j')->
            field('j.name')->
            where(array('j.company_id' => $cid))->select();
            $data[$key]['job'] = $job;

            $tag_model = M('Company_tag');
            $tag = $tag_model->alias('c')->
            field('t.name')->
            join('left join lg_tag t on (t.id = c.tag_id)')->
            where(array('c.company_id' => $cid))->
            select();
            $data[$key]['tag'] = $tag;
        }

        $show = $Page->show();
        $this->assign('show', $show);
        $this->assign('data', $data);
        $this->display('companycontent');

    }

}
