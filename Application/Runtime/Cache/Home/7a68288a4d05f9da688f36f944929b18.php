<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <script id="allmobilize" charset="utf-8" src="/Public/Home/js/allmobilize.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate" media="handheld"  />
    <!-- end 云适配 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>前端开发全国-职位搜索-拉勾网-最专业的互联网招聘平台</title>
    <meta property="qc:admins" content="23635710066417756375" />
    <meta content="前端开发招聘  全国地区招聘 紫色医疗招聘前端开发,月薪:10k-20k,要求:本科及以上学历,3-5年工作经验。职位诱惑：借移动医疗大势享受坐直升飞机的职场发展 公司规模:15-50人移动互联网 ,健康医疗类公司招聘信息汇总  最新最热门互联网行业招聘信息，尽在拉勾网" name="description">
    <meta content="前端开发招聘,全国地区前端开发招聘,紫色医疗招聘前端开发,移动互联网 类公司招聘信息汇总,健康医疗类公司招聘信息汇总,拉勾招聘,拉勾网,互联网招聘" name="keywords">
    <meta name="baidu-site-verification" content="QIQ6KC1oZ6" />

    <!-- <div class="web_root"  style="display:none">h</div> -->
    <script type="text/javascript">
        var ctx = "h";
        console.log(1);
    </script>
    <link rel="Shortcut Icon" href="http://www.lagou.com/h/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/external.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/popup.css"/>
    <script src="/Public/Home/js/jquery.1.10.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.lib.min.js"></script>
    <script src="/Public/Home/js/ajaxfileupload.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/Home/js/additional-methods.js"></script>
    <!--[if lte IE 8]>
    <script type="text/javascript" src="/Public/Home/js/excanvas.js"></script>
    <![endif]-->
    <style>
        #container{width:800px;margin:0 auto 0; padding-bottom:100px; }
    </style>
</head>
<body>
<div id="body">
    <div id="container">

        <div class="content">

            <ul class="hot_pos reset">
                <?php if(is_array($rec)): $i = 0; $__LIST__ = $rec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key % 2 == 0): ?><li class="odd clearfix">
                        <?php else: ?>
                        <li class="clearfix"><?php endif; ?>
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="<?php echo U('JobContent/index/',array('id'=>$vo['id']));?>" title="<?php echo ($vo["name"]); ?>" target="_blank"><?php echo ($vo["name"]); ?></a>
                                &nbsp;
                                <span class="c9">[<?php echo ($vo["city"]); ?>]</span>
                            </div>
                            <span><em class="c7">月薪：</em><?php echo ($vo["salary_low"]); ?>k-<?php echo ($vo["salary_high"]); ?>k</span>
                            <span><em class="c7">经验：</em> <?php echo ($vo["work_year"]); ?></span>
                            <span><em class="c7">最低学历： </em><?php echo ($vo["edu"]); ?></span>
                            <br />
                            <span><em class="c7">职位诱惑：</em><?php echo ($vo["welfare"]); ?></span>
                            <br />
                            <span>发布时间: <?php echo (date('Y-m-d',$vo["create_time"])); ?></span>
                        </div>
                        <div class="hot_pos_r">
                            <div class="apply">
                                <a href="toudi.html" target="_blank">投个简历</a>
                            </div>
                            <div class="mb10"><a href="h/c/1712.html" title="紫色医疗" target="_blank"><?php echo ($vo["short_name"]); ?></a></div>
                            <span><em class="c7">领域： </em><?php echo ($vo["trade"]); ?></span>
                            <br />
                            <span><em class="c7">阶段： </em><?php echo ($vo["stage_name"]); ?></span>
                            <span><em class="c7">规模： </em><?php echo ($vo["num"]); ?></span>
                            <ul class="companyTags reset">
                                <?php if(is_array($vo['tag'])): $i = 0; $__LIST__ = $vo['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><li><?php echo ($cat["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
            <div class="Pagination"><?php echo ($show); ?>共查到 <?php echo ($count); ?> 个职位</div>
            <?php if($count == 0): ?><style>
                    .Pagination{display: none}
                </style><?php endif; ?>
            <?php if($count != 0): ?><style>
                    .zero{display: none}
                </style><?php endif; ?>
            <span class="zero">
                <img style="padding-right: 500px" src="/Public/Home/images/img/error.gif" alt="没有结果">
                <div style="color: #0A246A;font-size: 2em">你要的职位被皮皮虾拐跑了,请重新选择条件</div>
            </span>

        </div>



        <div class="clear"></div>
        <input type="hidden" id="resubmitToken" value="" />
    </div><!-- end #container -->
</div><!-- end #body -->


<!--  -->

</body>
</html>