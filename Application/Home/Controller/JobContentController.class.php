<?php
namespace Home\Controller;

use Think\Controller;

class JobContentController extends Controller
{
    public function index()
    {
        header("content-type:text/html;charset=utf-8");
        $map['j.id'] = array('EQ', $_GET['id']);
        $rec = M('Job')->alias('j')->
        field('j.id,j.name,j.branch,j.nature,j.desc,j.city,j.salary_high,j.salary_low,j.work_year,j.edu,j.welfare,j.create_time,j.address,c.short_name,c.trade,c.name cname,c.web,c.id cid,c.logo,s.num,t.stage_name')->
        join('left join (lg_company c, lg_scale s ,lg_stage t) on (j.company_id=c.id and c.scale=s.type and j.state=t.type)')->
        where($map)->
        find();

        $tag_model = M('Company_tag');
        $cid = $rec['cid'];
        //$sql = "SELECT lg_tag.name FROM lg_tag RIGHT JOIN lg_company_tag ON lg_tag.id = lg_company_tag.tag_id WHERE company_id = $cid LIMIT 6";
        $data = $tag_model->alias('c')->
        field('t.name')->
        join('left join lg_tag t on (t.id = c.tag_id)')->
        where(array('c.company_id' => $cid))->
        select();
        $rec['tag'] = $data;


//        dump($rec);
//        die;
        $this->assign('data', $rec);
        $this->display('jobdetail');
    }
}