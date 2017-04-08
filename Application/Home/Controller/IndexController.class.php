<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        header("content-type:text/html;charset=utf-8");
        //获取分类数据
        $data = S('data');

        if ($data === false) {
            $data = M('job_category')->select();
            $data = Arrays($data);
            S('data', $data, 600);
        }

        $this->assign('cate', $data);

        //按发布时间排序

        //$sql = "select j.name,j.city,j.salary_high,j.salary_low,j.work_year,j.edu,j.welfare,j.create_time,c.short_name,c.trade,s.num,t.stage_name from lg_job j left join (lg_company c, lg_scale s ,lg_stage t) on (j.company_id=c.id and c.scale=s.type and j.state=t.type) order by create_time desc limit 0,15";
        $rec = S('rec');
        if ($rec === false) {

            $rec = M('Job')->alias('j')->
            field('j.id,j.name,j.city,j.salary_high,j.salary_low,j.work_year,j.edu,j.welfare,j.create_time,c.short_name,c.trade,c.id cid,s.num,t.stage_name')->
            join('left join (lg_company c, lg_scale s ,lg_stage t) on (j.company_id=c.id and c.scale=s.type and j.state=t.type)')->
            order(array('j.create_time' => 'desc'))->
            limit(0, 15)->
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
            S('rec',$rec,600);
        }
        $this->assign('ontime', $rec);
        $this->display();
    }
}