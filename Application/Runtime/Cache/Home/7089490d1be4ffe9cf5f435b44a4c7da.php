<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
    <script id="allmobilize" charset="utf-8" src="/Public/Home/js/allmobilize.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate" media="handheld"/>
    <!-- end 云适配 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>全国-公司列表-拉勾网-最专业的互联网招聘平台</title>
    <meta property="qc:admins" content="23635710066417756375"/>
    <meta content="全国condition-condition-公司列表-拉勾网-最专业的互联网招聘平台" name="description">
    <meta content="全国condition-公司列表-拉勾网-最专业的互联网招聘平台" name="keywords">
    <meta name="baidu-site-verification" content="QIQ6KC1oZ6"/>

    <!-- <div class="web_root"  style="display:none">h</div> -->
    <script type="text/javascript">
        var ctx = "h";
        console.log(1);
    </script>
    <link rel="Shortcut Icon" href="h/images/favicon.ico">
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

    <script type="text/javascript" src="/Public/Home/js/conv.js"></script>
</head>
<body>
<div id="body">
    <div id="container">

        <div class="clearfix">
            <div class="content_l">

                    <ul class="hc_list reset">

                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key % 3 == 0): ?><li style="clear:both;">
                                    <?php else: ?>
                                <li><?php endif; ?>

                            <a href="h/c/25829.html" target="_blank">
                                <h3 title="<?php echo ($vo['short_name']); ?>"><?php echo ($vo['short_name']); ?></h3>
                                <div class="comLogo">
                                    <img src="/Public/Home/images/aa.jpg" width="190" height="190"
                                         alt="<?php echo ($vo["short_name"]); ?>"/>
                                    <ul>
                                        <li><?php echo ($vo['trade']); ?></li>
                                        <li><?php echo ($vo['city']); ?>，<?php echo ($vo['stage_name']); ?></li>
                                    </ul>
                                </div>
                            </a>
                            <?php if(is_array($vo['job'])): $i = 0; $__LIST__ = $vo['job'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$job): $mod = ($i % 2 );++$i;?><a href="h/jobs/148928.html" target="_blank"> <?php echo ($job['name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            <ul class="reset ctags">
                                <li><?php echo ($vo['stage_name']); ?></li>
                                <?php if(is_array($vo['tag'])): $i = 0; $__LIST__ = $vo['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><li><?php echo ($tag['name']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>

                    <div class="Pagination"><?php echo ($show); ?></div>
            </div>
        </div>

        <input type="hidden" value="" name="userid" id="userid"/>

        <script type="text/javascript" src="/Public/Home/js/company_list.min.js"></script>
        <script>
        </script>
    </div><!-- end #container -->
</div><!-- end #body -->

<script type="text/javascript" src="/Public/Home/js/core.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/popup.min.js"></script>

<!--  -->

</body>
</html>