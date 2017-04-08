<?php
namespace Home\Controller;

use Think\Controller;

header("content-type:text/html;charset=utf-8");

class CompanyRegistController extends Controller
{
    //公司注册步骤
    public function step()
    {
        $id = session('user.id');
        $comobj = M('Company');
        if ($id) {
            //根据id查询出公司注册的步骤
            $res = $comobj->where(array('id' => $id))->find();
            //$res['step'] ? $res['step'] : 1;
            // dump($res['step']);die;
            $str = 'step_' . $res['step'];  //step_1()
            // dump($str);die;


            $this->$str();
        } else {
            $this->error('请先登录', U('Login/login'));
        }
    }


    //开通招聘服务第一步
    public function step_1()
    {
        $id = session('user.id');
        $comobj = D('Company');
        //从数据表中取出数据将数据添加到模板中
//            dump($this->id);
        $res = $comobj->Field(array('tel', 'email'))->where(array('id' => $id))->find();
//            dump($res);die;

        $this->assign('data', $res);
        $this->display('bindstep1');

    }

    //接手第一步传过来的数据
    public function step1Handle()
    {
        $id = session('user.id');
        $comobj = D('Company');
        if (IS_POST) {
            $data = I('post.');
            //正则验证手机号
            $phone = "/^1[34578]\d{9}$/";
            $tel = $data['tel'];
            if (!preg_match($phone, $tel)) {
                $this->error('手机格式不正确');
            }
            //正则验证邮箱
            //4-16个字符，可以使用英文小写，数字，下划线，下划线不在首尾
            $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
            $email_address = $data['email'];
            if (!preg_match($pattern, $email_address)) {
                $this->error('邮箱格式不正确');
            }
            $a = session('user.id');
//            dump($a);
            //将数据添加到数据表
            //如果company数据表中根据session中的id能查出数据，就是修改，不能就是添加
            $row = $comobj->where(array('id' => $id))->find();
//            dump($row);die;
            $data['id'] = session('user.id');
            $data['step'] = 2;//到下一步好判断这是第几步
            $data['state'] = 1;//现在申请到什么程度
            if ($row['tel']) {
                //修改信息,因为是严格模式的数据库，当不做修改时报错，是由于不判断修改成功与否
                $res = $comobj->where(array('id' => $id))->save($data);
                $this->success('已修复成功', U('step'));
            } else {
                //添加信息
                $res = $comobj->add($data);
                if ($res) {
                    $this->success('第一步完成', U('step'));
                } else {
                    $this->error('第一步失败');
                }
            }
        }
    }
    //楷体招聘第二步
    //第二步之前，ajax先清空本公司的

    public function step_2()
    {
        $comobj = D('Company');
        $id = session('user.id');
        if (IS_POST) {
            //处理提交过来的数据
            $companyName = I('post.');
            //判断公司名不能有重复的
            //根据公司名查询数据库里有没有该公司，并且不查询本公司名称
            $res = $comobj->where(array("id != '$id'", 'name' => $companyName['name']))->select();
            if ($res) {
                $this->error('该公司已经开通了招聘服务！');
            } else {
                //申请步骤
                $companyName['step'] = 3;
                //添加数据
                $resone = $comobj->where(array('id' => $id))->save($companyName);
                $this->success('第二步完成', U('step'));
            }

        } else {
            $res = $comobj->field(array('name'))->where(array('id' => $id))->find();
//            dump($res);
            $this->assign('data', $res);
            $this->display('bindStep2');
        }
    }

    //开通招聘第三步
    public function step_3()
    {
        //查询出该公司的邮箱，
        $id = session('user.id');
        $comobj = D('Company');
        $email = $comobj->field('email')->where("id='$id'")->find();

//        //完成这一步后向注册用户发送邮件
//        $sendmail = new  \Org\Util\Sendmail();
//        //获取用户接收简历邮箱
//        $email = $comobj->field('email')->where("id='$id'")->find();
//        $to =$email['email'];//要发送的邮箱，公司注册接收简历的邮箱
//        $subject = '拉钩网站开通招聘服务激活邮件';
//
//        $code = base64_encode(md5('招招网') .' ' .time() .' '. $to);
//        $url = "http://www.zhaozhao.com/index.php/Home/ComoanyRegist/jihuo&code=$code";
//        //发送到客户邮箱里的内容
//        $content = <<<aa
//您好！<br>
//感谢您在招招网站开通招聘服务！<br>
//服务需要激活才能使用，赶紧激活才能发送招聘信息:)
//点击下面的链接立即开通服务(或将网址复制到浏览器中打开)：
//<a href='$url'>$url</a>
//
//aa;
//        //$to 公司邮箱  $subject ‘拉钩网站开通招聘服务激活邮件’  $companyName['name'] 公司名称 $content 给公司发送的内容
//
//        $sendmail->postmail($to,$subject,$content,'招招网',$companyName['name']);


        //分配数据
        $this->assign('email', $email);
        $this->display('bindStep3');
    }

    //发送邮件进行验证
    public function jihuo()
    {

        echo "123";
    }


    //公司信息注册第一步
    public function step_4()
    {
        $comobj = M('Company');
        $id = session('user.id');
        //查询公司信息
        $companyName = $comobj->where("id='$id'")->find();
        $this->assign('company', $companyName);
        $this->display('companyInfo01');
    }

    //处理传输过来的公司信息
    public function step4Handle()
    {
        $comobj = M('Company');
        $id = session('user.id');
        if (IS_POST) {
            $data = I('post.');
            //判断公司简称
            if (empty($data['name'])) {
                $this->error('公司简称不能为空');
            }
            //判断公司网址
            if (empty($data['website'])) {
                $this->error('公司网站不能为空');
            }
            //判断公司规模
            if (empty($data['select_scale_hidden'])) {
                $this->error('请选择您公司的规模');
            }
            //公司发展阶段
            if (empty($data['s_radio_hidden'])) {
                $this->error('请选择您公司的发展阶段');
            }
            //公司领域
            if (empty($data['select_industry_hidden'])) {
                $this->error('请选择您公司领域');
            }


            $info = array();//存储添加数据库里的内容
            //上传公司LOGO
            if ($_FILES['companyLogo']['name']) {
                $info = $this->upload();
                $file = $info['companyLogo']['savepath'] . $info['companyLogo']['savename'];
//                    dump($file);
//                    判断是否是图片
                $res = array('png', 'jpg', 'jpeg', 'gif');
                if (in_array(strtolower($info['companyLogo']['ext']), $res)) {
                    $img = new \Think\Image();
                    //缩略图
                    $savepath = './Public/Thumb/' . date('Y-m-d');//缩略图路径
                    //判断是否有这个路径
                    if (!file_exists($savepath)) {
                        mkdir($savepath, 0777, true);
                    }
                    //进行缩略
                    $img->open('./Public/Uploads/' . $file)->thumb(190, 190)->save('./Public/Thumb/' . $file);
                };
            }
            //post过来的公司数据
            $info['short_name'] = $data['name'];//简写名称
            $inf['web'] = $data['website']; //网站
            $info['trade'] = $data['select_industry_hidden']; //属于什么行业 公司领域
            $info['one_desc'] = $data['temptation'];//描述公司
            $info['city'] = $data['city'];
            $arrscale = array_flip(C('company_scale'));//将配置中的数据对调
            $info['scale'] = $arrscale[$data['select_scale_hidden']];//将公司规模数据变为数字，方便存储
            $arrstage = array_flip(C('company_stage'));
            $info['stage'] = $arrstage[$data['s_radio_hidden']];//公司发展阶段
            $info['logo'] = $file;//存在图片路径
            $info['step'] = 5;
            //将数据添加到数据表中
            $res = $comobj->where("id='$id'")->save($info);
            if ($res) {
                $this->success('公司信息第一步成功', U('step_5'));
            } else {
                $this->error('公司信息第一步填写失败');
            }
        } else {

        }

    }


    //公司信息注册第二步
    public function step_5()
    {
        if (IS_POST) {
            $res = I('post.');
            dump($res);

        } else {

            //查询数据添加到页面
            $tag = M('Tag');
            $data1 = $tag->field('name')->where('type=1')->select();
            $data2 = $tag->field('name')->where('type=2')->select();
            $data3 = $tag->field('name')->where('type=3')->select();
            $data4 = $tag->field('name')->where('type=4')->select();
//        dump($data1);die;
            //将数据发送到模板
            $this->assign('data1', $data1);
            $this->assign('data2', $data1);
            $this->assign('data3', $data1);
            $this->assign('data4', $data1);
            $this->display('companyTag02');
        }
    }


    //公司信息注册第三步
    public function step_6()
    {
        $ceoobj = M('Team');
        $id = session('user.id');
        if (IS_POST) {
//            array(1) {
//                ["myfiles"] => array(5) {
//                    ["name"] => string(6) "04.jpg"
//                    ["type"] => string(10) "image/jpeg"
//                    ["tmp_name"] => string(27) "C:\Windows\Temp\phpF491.tmp"
//                    ["error"] => int(0)
//                    ["size"] => int(26807)
//  }
//}
//array(1) {
//                ["leaderInfos"] => array(1) {
//                    [0] => array(5) {
//                        ["photo"] => string(0) ""
//                        ["name"] => string(9) "周根生"
//                        ["position"] => string(9) "董事长"
//                        ["weibo"] => string(4) "1111"
//                        ["remark"] => string(32) "jfklasjkfldas jgdkla功夫大师"
//    }
//  }
//}



            $leaderInfos = I('post.');

            foreach($leaderInfos as $key=>$val ){

            }




            dump($_FILES);
            dump($info);die;
            $this->display('companyInfo04');




        } else {
            //公司团队页面
            $this->display('companyFounder03');
        }


    }

    //公司信息注册第四步
    public function step_7()
    {

    }

    //公司信息注册第五步
    public function step_8()
    {
        $this->display('companyInfo05');
    }


    //上传方法
    public function upload()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功
            //上传成功后，返回上传的地址
//            dump($info);die;
            return $info;
            //$this->success('上传成功！');
        }
    }


}


?>