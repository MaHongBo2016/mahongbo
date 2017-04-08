<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
    <script id="allmobilize" charset="utf-8" src="/Public/Home/js/allmobilize.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate" media="handheld"/>
    <!-- end 云适配 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>拉勾网-最专业的互联网招聘平台</title>
    <meta property="qc:admins" content="23635710066417756375"/>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="baidu-site-verification" content="QIQ6KC1oZ6"/>

    <!-- <div class="web_root"  style="display:none">h</div> -->
    <script type="text/javascript">
        var ctx = "/index.php/Search/index/";
        console.log(1);
    </script>
    <script type="text/javascript">
        var ctx2 = "/index.php/Search/com_index/";
        console.log(4);
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

</head>
<body>
<div id="body">
    <div id="header">
        <div class="wrapper">
            <a href="index.html" class="logo">
                <img src="/Public/Home/images/logo.png" width="229" height="43" alt="拉勾招聘-专注互联网招聘"/>
            </a>
            <ul class="reset" id="navheader">
                <li class="current"><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li><a href="<?php echo U('Search/com_index');?>">公司</a></li>
                <li><a href="#" target="_blank">论坛</a></li>
                <li><a href="jianli.html" rel="nofollow">我的简历</a></li>
                <li><a href="create.html" rel="nofollow">发布职位</a></li>
            </ul>
            <ul class="loginTop">
                <li><a href="login.html" rel="nofollow">登录</a></li>
                <li>|</li>
                <li><a href="register.html" rel="nofollow">注册</a></li>
            </ul>
        </div>
    </div><!-- end #header -->
    <div id="container">

        <div id="sidebar">
            <div class="mainNavs">
                <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="menu_box">
                        <div class="menu_main">
                            <h2><?php echo ($vo["name"]); ?> <span></span></h2>
                            <?php if(is_array($vo['child'])): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voa): $mod = ($i % 2 );++$i; if(is_array($voa['child'])): $k = 0; $__LIST__ = $voa['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vob): $mod = ($k % 2 );++$k; if($k == 1): ?><a href="<?php echo U('Search/index/name/'.$vob[name]);?>"><?php echo ($vob["name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="menu_sub dn">
                            <?php if(is_array($vo['child'])): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><dl class="reset">
                                    <dt>
                                        <a href="<?php echo U('Search/index/name/'.$vo1[name]);?>">
                                            <?php echo ($vo1["name"]); ?>
                                        </a>
                                    </dt>
                                    <dd>
                                        <?php if(is_array($vo1['child'])): $k = 0; $__LIST__ = $vo1['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k % 2 );++$k; if($k == 1): ?><a href="<?php echo U('Search/index/name/'.$vo2[name]);?>"
                                                   class="curr"><?php echo ($vo2["name"]); ?></a>
                                                <?php else: ?>
                                                <a href="<?php echo U('Search/index/name/'.$vo2[name]);?>"><?php echo ($vo2["name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </dd>
                                </dl><?php endforeach; endif; else: echo "" ;endif; ?>

                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
            <a class="subscribe" href="subscribe.html" target="_blank">订阅职位</a>
        </div>
        <div class="content">
            <div id="search_box">
                <form id="searchForm" name="searchForm" action="list.html" method="get">
                    <ul id="searchType">
                        <li data-searchtype="1" id="job" class="type_selected">职位</li>
                        <li data-searchtype="4" id="com">公司</li>
                    </ul>
                    <div class="searchtype_arrow"></div>
                    <input type="text" id="search_input" name="name" tabindex="1" value=""
                           placeholder="请输入职位名称，如：产品经理"/>

                    <input type="submit" id="search_button" value="搜索"/>

                </form>
            </div>
            <style>
                .ui-autocomplete {
                    width: 488px;
                    background: #fafafa !important;
                    position: relative;
                    z-index: 10;
                    border: 2px solid #91cebe;
                }

                .ui-autocomplete-category {
                    font-size: 16px;
                    color: #999;
                    width: 50px;
                    position: absolute;
                    z-index: 11;
                    right: 0px; /*top: 6px; */
                    text-align: center;
                    border-top: 1px dashed #e5e5e5;
                    padding: 5px 0;
                }

                .ui-menu-item {
                    *width: 439px;
                    vertical-align: middle;
                    position: relative;
                    margin: 0px;
                    margin-right: 50px !important;
                    background: #fff;
                    border-right: 1px dashed #ededed;
                }

                .ui-menu-item a {
                    display: block;
                    overflow: hidden;
                }
            </style>
            <script type="text/javascript" src="/Public/Home/js/search.min.js"></script>
            <dl class="hotSearch">
                <dt>热门搜索：</dt>
                <dd><a href="<?php echo U('Search/index/name/Java');?>">Java</a></dd>
                <dd><a href="<?php echo U('Search/index/name/PHP');?>">PHP</a></dd>
                <dd><a href="<?php echo U('Search/index/name/Android');?>">Android</a></dd>
                <dd><a href="<?php echo U('Search/index/name/IOS');?>">IOS</a></dd>
                <dd><a href="<?php echo U('Search/index/name/前端');?>">前端</a></dd>
                <dd><a href="<?php echo U('Search/index/name/产品经理');?>">产品经理</a></dd>
                <dd><a href="<?php echo U('Search/index/name/UI');?>">UI</a></dd>
                <dd><a href="<?php echo U('Search/index/name/运营');?>">运营</a></dd>
                <dd><a href="<?php echo U('Search/index/name/BD');?>">BD</a></dd>
                <dd><a href="<?php echo U('Search/index/name/实习');?>">实习</a></dd>
            </dl>
            <div id="home_banner">
                <ul class="banner_bg">
                    <li class="banner_bg_1 current">
                        <a href="h/subject/s_buyfundation.html?utm_source=DH__lagou&utm_medium=banner&utm_campaign=haomai"
                           target="_blank"><img src="/Public/Home/images/d05a2cc6e6c94bdd80e074eb05e37ebd.jpg"
                                                width="612" height="160" alt="好买基金——来了就给100万"/></a>
                    </li>
                    <li class="banner_bg_2">
                        <a href="h/subject/s_worldcup.html?utm_source=DH__lagou&utm_medium=home&utm_campaign=wc"
                           target="_blank"><img src="/Public/Home/images/c9d8a0756d1442caa328adcf28a38857.jpg"
                                                width="612" height="160" alt="世界杯放假看球，老板我也要！"/></a>
                    </li>
                    <li class="banner_bg_3">
                        <a href="h/subject/s_xiamen.html?utm_source=DH__lagou&utm_medium=home&utm_campaign=xiamen"
                           target="_blank"><img src="/Public/Home/images/d03110162390422bb97cebc7fd2ab586.jpg"
                                                width="612" height="160" alt="出北京记——第一站厦门"/></a>
                    </li>
                </ul>
                <div class="banner_control">
                    <em></em>
                    <ul class="thumbs">
                        <li class="thumbs_1 current">
                            <i></i>
                            <img src="/Public/Home/images/4469b1b83b1f46c7adec255c4b1e4802.jpg" width="113"
                                 height="42"/>
                        </li>
                        <li class="thumbs_2">
                            <i></i>
                            <img src="/Public/Home/images/381b343557774270a508206b3a725f39.jpg" width="113"
                                 height="42"/>
                        </li>
                        <li class="thumbs_3">
                            <i></i>
                            <img src="/Public/Home/images/354d445c5fd84f1990b91eb559677eb5.jpg" width="113"
                                 height="42"/>
                        </li>
                    </ul>
                </div>
            </div><!--/#main_banner-->

            <ul id="da-thumbs" class="da-thumbs">
                <li>
                    <a href="h/c/1650.html" target="_blank">
                        <img src="/Public/Home/images/a254b11ecead45bda166afa8aaa9c8bc.jpg" width="113" height="113"
                             alt="联想"/>
                        <div class="hot_info">
                            <h2 title="联想">联想</h2>
                            <em></em>
                            <p title="世界因联想更美好">
                                世界因联想更美好
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="h/c/9725.html" target="_blank">
                        <img src="/Public/Home/images/c75654bc2ab141df8218983cfe5c89f9.jpg" width="113" height="113"
                             alt="淘米"/>
                        <div class="hot_info">
                            <h2 title="淘米">淘米</h2>
                            <em></em>
                            <p title="将心注入 追求极致">
                                将心注入 追求极致
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="h/c/1914.html" target="_blank">
                        <img src="/Public/Home/images/2bba2b71d0b0443eaea1774f7ee17c9f.png" width="113" height="113"
                             alt="优酷土豆"/>
                        <div class="hot_info">
                            <h2 title="优酷土豆">优酷土豆</h2>
                            <em></em>
                            <p title="专注于视频领域，是中国网络视频行业领军企业">
                                专注于视频领域，是中国网络视频行业领军企业
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="h/c/6630.html" target="_blank">
                        <img src="/Public/Home/images/f4822a445a8b495ebad81fcfad3e40e2.jpg" width="113" height="113"
                             alt="思特沃克"/>
                        <div class="hot_info">
                            <h2 title="思特沃克">思特沃克</h2>
                            <em></em>
                            <p title="一家全球信息技术服务公司">
                                一家全球信息技术服务公司
                            </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="h/c/2700.html" target="_blank">
                        <img src="/Public/Home/images/5caf8f9631114bf990f87bb11360653e.png" width="113" height="113"
                             alt="奇猫"/>
                        <div class="hot_info">
                            <h2 title="奇猫">奇猫</h2>
                            <em></em>
                            <p title="专注于移动互联网、互联网产品研发">
                                专注于移动互联网、互联网产品研发
                            </p>
                        </div>
                    </a>
                </li>
                <li class="last">
                    <a href="h/c/1335.html" target="_blank">
                        <img src="/Public/Home/images/c0052c69ef4546c3b7d08366d0744974.jpg" width="113" height="113"
                             alt="堆糖网"/>
                        <div class="hot_info">
                            <h2 title="堆糖网">堆糖网</h2>
                            <em></em>
                            <p title="分享收集生活中的美好，遇见世界上的另外一个你">
                                分享收集生活中的美好，遇见世界上的另外一个你
                            </p>
                        </div>
                    </a>
                </li>
            </ul>

            <ul class="reset hotabbing">
                <li class="current">热门职位</li>
                <li>最新职位</li>
            </ul>
            <div id="hotList">
                <ul class="hot_pos reset">
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/147822.html" target="_blank">运营总监</a>
                                &nbsp;
                                <span class="c9">[北京]</span>
                            </div>
                            <span><em class="c7">月薪： </em>15k-20k</span>
                            <span><em class="c7">经验：</em> 3-5年</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>发展前景</span>
                            <br/>
                            <span>1天前发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/399.html" target="_blank">节操精选</a></div>
                            <span><em class="c7">领域：</em> 移动互联网</span>
                            <span><em class="c7">创始人：</em>陈桦</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 初创型(天使轮)</span>
                            <span><em class="c7">规模：</em>少于15人</span>
                            <ul class="companyTags reset">
                                <li>移动互联网</li>
                                <li>五险一金</li>
                                <li>扁平管理</li>
                            </ul>
                        </div>
                    </li>
                    <li class="odd clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/147974.html" target="_blank">售前工程师（运维经验优先）</a>
                                &nbsp;
                                <span class="c9">[北京]</span>
                            </div>
                            <span><em class="c7">月薪： </em>6k-12k</span>
                            <span><em class="c7">经验：</em> 3-5年</span>
                            <span><em class="c7">最低学历： </em>大专</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>五险一金+商业保险+带薪年假+奖金等</span>
                            <br/>
                            <span>1天前发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/5232.html" target="_blank">监控宝</a></div>
                            <span><em class="c7">领域：</em> 云计算\大数据</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 成长型(A轮)</span>
                            <span><em class="c7">规模：</em>50-150人</span>
                            <ul class="companyTags reset">
                                <li>五险一金</li>
                                <li>福利好</li>
                                <li>商业险</li>
                            </ul>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/148237.html" target="_blank">手机游戏运营</a>
                                &nbsp;
                                <span class="c9">[南京]</span>
                            </div>
                            <span><em class="c7">月薪： </em>4k-8k</span>
                            <span><em class="c7">经验：</em> 1-3年</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>工作氛围和谐~正面激励成长~福利好~</span>
                            <br/>
                            <span>1天前发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/8307.html" target="_blank">爱游戏(中国电信游戏基地)</a></div>
                            <span><em class="c7">领域：</em> 移动互联网,游戏</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 初创型(未融资)</span>
                            <span><em class="c7">规模：</em>150-500人</span>
                            <ul class="companyTags reset">
                                <li>绩效奖金</li>
                                <li>年底双薪</li>
                                <li>五险一金</li>
                            </ul>
                        </div>
                    </li>
                    <li class="odd clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/148429.html" target="_blank">葡萄酒内容运营专员</a>
                                &nbsp;
                                <span class="c9">[广州]</span>
                            </div>
                            <span><em class="c7">月薪： </em>5k-8k</span>
                            <span><em class="c7">经验：</em> 1-3年</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>喝着世界美酒快乐地工作！</span>
                            <br/>
                            <span>1天前发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/4474.html" target="_blank">酒咔嚓</a></div>
                            <span><em class="c7">领域：</em> 移动互联网,生活服务</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 初创型(天使轮)</span>
                            <span><em class="c7">规模：</em>15-50人</span>
                            <ul class="companyTags reset">
                                <li>五险一金</li>
                                <li>股票期权</li>
                                <li>带薪年假</li>
                            </ul>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/1221.html" target="_blank">百度移动游戏UI designer</a>
                                &nbsp;
                                <span class="c9">[北京]</span>
                            </div>
                            <span><em class="c7">月薪： </em>7k-14k</span>
                            <span><em class="c7">经验：</em> 1-3年</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>喜欢游戏，喜欢生活，游戏生活~</span>
                            <br/>
                            <span>1天前发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/323.html" target="_blank">百度移动游戏</a></div>
                            <span><em class="c7">领域：</em> 移动互联网</span>
                            <span><em class="c7">创始人：</em>李彦宏</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 上市公司</span>
                            <span><em class="c7">规模：</em>2000人以上</span>
                            <ul class="companyTags reset">
                                <li>年终分红</li>
                                <li>绩效奖金</li>
                                <li>股票期权</li>
                            </ul>
                        </div>
                    </li>
                    <li class="odd clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/148188.html" target="_blank">iOS</a>
                                &nbsp;
                                <span class="c9">[北京]</span>
                            </div>
                            <span><em class="c7">月薪： </em>13k-26k</span>
                            <span><em class="c7">经验：</em> 不限</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>中国第一只能手机广告平台</span>
                            <br/>
                            <span>1天前发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/1331.html" target="_blank">多盟domob</a></div>
                            <span><em class="c7">领域：</em> 移动互联网</span>
                            <span><em class="c7">创始人：</em>齐玉杰</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 成长型(B轮)</span>
                            <span><em class="c7">规模：</em>150-500人</span>
                            <ul class="companyTags reset">
                                <li>绩效奖金</li>
                                <li>股票期权</li>
                                <li>年底双薪</li>
                            </ul>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/148393.html" target="_blank">Java</a>
                                &nbsp;
                                <span class="c9">[北京]</span>
                            </div>
                            <span><em class="c7">月薪： </em>15k-25k</span>
                            <span><em class="c7">经验：</em> 1-3年</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>项目快速发展，技术氛围浓厚，有业界大牛</span>
                            <br/>
                            <span>09:21发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/1537.html" target="_blank">搜狗</a></div>
                            <span><em class="c7">领域：</em> 移动互联网,搜索</span>
                            <span><em class="c7">创始人：</em>王小川</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 初创型(未融资)</span>
                            <span><em class="c7">规模：</em>2000人以上</span>
                            <ul class="companyTags reset">
                                <li>五险一金</li>
                                <li>带薪年假</li>
                                <li>午餐补助</li>
                            </ul>
                        </div>
                    </li>
                    <li class="odd clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/148838.html" target="_blank">web前端</a>
                                &nbsp;
                                <span class="c9">[上海]</span>
                            </div>
                            <span><em class="c7">月薪： </em>6k-12k</span>
                            <span><em class="c7">经验：</em> 1-3年</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>靠谱的工程师要来靠谱的公司</span>
                            <br/>
                            <span>00:21发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/195.html" target="_blank">杰派网络</a></div>
                            <span><em class="c7">领域：</em> 移动互联网</span>
                            <span><em class="c7">创始人：</em>顾培盟</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 初创型(天使轮)</span>
                            <span><em class="c7">规模：</em>15-50人</span>
                            <ul class="companyTags reset">
                                <li>股票期权</li>
                                <li>年底双薪</li>
                                <li>绩效奖金</li>
                            </ul>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/148849.html" target="_blank">Java</a>
                                &nbsp;
                                <span class="c9">[杭州]</span>
                            </div>
                            <span><em class="c7">月薪： </em>15k-30k</span>
                            <span><em class="c7">经验：</em> 不限</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>有技术挑战、有成长机会、有漂亮妹子</span>
                            <br/>
                            <span>09:08发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/108.html" target="_blank">蘑菇街</a></div>
                            <span><em class="c7">领域：</em> 电子商务</span>
                            <span><em class="c7">创始人：</em>陈琪</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 成熟型(C轮)</span>
                            <span><em class="c7">规模：</em>150-500人</span>
                            <ul class="companyTags reset">
                                <li>管理规范</li>
                                <li>无限零食饮料</li>
                                <li>轻时尚</li>
                            </ul>
                        </div>
                    </li>
                    <li class="odd clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/148978.html" target="_blank">测试实习生</a>
                                &nbsp;
                                <span class="c9">[上海]</span>
                            </div>
                            <span><em class="c7">月薪： </em>3k-5k</span>
                            <span><em class="c7">经验：</em> 不限</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>实习通过，毕业直接转正，实习期有餐贴</span>
                            <br/>
                            <span>10:16发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/4490.html" target="_blank">一铺科技</a></div>
                            <span><em class="c7">领域：</em> 移动互联网,企业服务</span>
                            <span><em class="c7">创始人：</em>William</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 成长型(A轮)</span>
                            <span><em class="c7">规模：</em>50-150人</span>
                            <ul class="companyTags reset">
                                <li>单身住宿</li>
                                <li>股票期权</li>
                                <li>午餐补助</li>
                            </ul>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/148783.html" target="_blank">网页产品设计师</a>
                                &nbsp;
                                <span class="c9">[北京]</span>
                            </div>
                            <span><em class="c7">月薪： </em>8k-10k</span>
                            <span><em class="c7">经验：</em> 1-3年</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>六险一金，饭补，班车，晋升机制，氛围好</span>
                            <br/>
                            <span>14:15发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/8143.html" target="_blank">途家网</a></div>
                            <span><em class="c7">领域：</em> 移动互联网,O2O</span>
                            <span><em class="c7">创始人：</em>罗军</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 成长型(B轮)</span>
                            <span><em class="c7">规模：</em>500-2000人</span>
                            <ul class="companyTags reset">
                                <li>绩效奖金</li>
                                <li>五险一金</li>
                                <li>带薪年假</li>
                            </ul>
                        </div>
                    </li>
                    <li class="odd clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/148206.html" target="_blank">产品经理（工商系统项目）</a>
                                &nbsp;
                                <span class="c9">[北京]</span>
                            </div>
                            <span><em class="c7">月薪： </em>10k-20k</span>
                            <span><em class="c7">经验：</em> 5-10年</span>
                            <span><em class="c7">最低学历： </em>本科</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>和一群聪明的人共事</span>
                            <br/>
                            <span>1天前发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/3646.html" target="_blank">PEVC</a></div>
                            <span><em class="c7">领域：</em> 金融互联网</span>
                            <span><em class="c7">创始人：</em>兰宁羽</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 成长型(A轮)</span>
                            <span><em class="c7">规模：</em>50-150人</span>
                            <ul class="companyTags reset">
                                <li>五险一金</li>
                                <li>节日礼物</li>
                                <li>弹性工作</li>
                            </ul>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/147720.html" target="_blank">团队经理</a>
                                &nbsp;
                                <span class="c9">[北京]</span>
                            </div>
                            <span><em class="c7">月薪： </em>10k-15k</span>
                            <span><em class="c7">经验：</em> 不限</span>
                            <span><em class="c7">最低学历： </em>大专</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>位置佳，环境优越，发展空间大，薪酬高</span>
                            <br/>
                            <span>2天前发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/3786.html" target="_blank">宜信公司</a></div>
                            <span><em class="c7">领域：</em> 移动互联网,金融互联网</span>
                            <span><em class="c7">创始人：</em>唐宁</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 成熟型(D轮及以上)</span>
                            <span><em class="c7">规模：</em>2000人以上</span>
                            <ul class="companyTags reset">
                                <li>管理规范</li>
                                <li>技能培训</li>
                                <li>扁平管理</li>
                            </ul>
                        </div>
                    </li>
                    <li class="odd clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/145249.html" target="_blank">手游商务</a>
                                &nbsp;
                                <span class="c9">[上海]</span>
                            </div>
                            <span><em class="c7">月薪： </em>6k-10k</span>
                            <span><em class="c7">经验：</em> 1-3年</span>
                            <span><em class="c7">最低学历： </em>大专</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>一年两次调薪，免费早、晚餐，项目、年终奖</span>
                            <br/>
                            <span>2014-06-27</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/4428.html" target="_blank">恺英网络</a></div>
                            <span><em class="c7">领域：</em> 移动互联网,游戏</span>
                            <span><em class="c7">创始人：</em>王悦</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 初创型(未融资)</span>
                            <span><em class="c7">规模：</em>500-2000人</span>
                            <ul class="companyTags reset">
                                <li>游戏公司</li>
                                <li>页游</li>
                                <li>手游</li>
                            </ul>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="h/jobs/148680.html" target="_blank">市场推广</a>
                                &nbsp;
                                <span class="c9">[上海]</span>
                            </div>
                            <span><em class="c7">月薪： </em>7k-12k</span>
                            <span><em class="c7">经验：</em> 1-3年</span>
                            <span><em class="c7">最低学历： </em>大专</span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em>年度16薪 市场营销发展方向</span>
                            <br/>
                            <span>1天前发布</span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany"><a href="h/c/1235.html" target="_blank">在路上</a></div>
                            <span><em class="c7">领域：</em> 移动互联网,在线旅游</span>
                            <span><em class="c7">创始人：</em>黄天赐</span>
                            <br/>
                            <span><em class="c7">阶段：</em> 成熟型(C轮)</span>
                            <span><em class="c7">规模：</em>50-150人</span>
                            <ul class="companyTags reset">
                                <li>弹性工作</li>
                                <li>领导好</li>
                                <li>移动互联网</li>
                            </ul>
                        </div>
                    </li>

                    <a href="<?php echo U('Search/index');?>" class="btn fr">查看更多</a>
                </ul>
                <ul class="hot_pos hot_posHotPosition reset" style="display:none;">
                    <?php if(is_array($ontime)): $i = 0; $__LIST__ = $ontime;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key % 2 == 1): ?><li class="odd clearfix">
                                <?php else: ?>
                            <li class="clearfix"><?php endif; ?>
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="<?php echo U('JobContent/index/',array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a>
                                &nbsp;
                                <span class="c9">[<?php echo ($vo["city"]); ?>]</span>
                            </div>
                            <span><em class="c7">月薪： </em><?php echo ($vo["salary_low"]); ?>k-<?php echo ($vo["salary_high"]); ?>k</span>
                            <span><em class="c7">经验：</em><?php echo ($vo["work_year"]); ?></span>
                            <span><em class="c7">最低学历：</em> <?php echo ($vo["edu"]); ?></span>
                            <br/>
                            <span><em class="c7">职位诱惑：</em><?php echo ($vo["welfare"]); ?></span>
                            <br/>
                            <span>发布时间: <?php echo (date('Y-m-d',$vo["create_time"])); ?></span>
                            <!-- <a  class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10"><a href="h/c/8250.html" target="_blank"><?php echo ($vo["short_name"]); ?></a></div>
                            <span><em class="c7">领域：</em> <?php echo ($vo["trade"]); ?></span>
                            <br/>
                            <span> <em class="c7">阶段： </em><?php echo ($vo["stage_name"]); ?></span>
                            <span> <em class="c7">规模：</em><?php echo ($vo["num"]); ?>人</span>
                            <ul class="companyTags reset">
                                <?php if(is_array($vo['tag'])): $i = 0; $__LIST__ = $vo['tag'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><li><?php echo ($cat["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    <a href="<?php echo U('Search/index');?>" class="btn fr">查看更多</a>
                </ul>
            </div>

            <div class="clear"></div>
            <div id="linkbox">
                <dl>
                    <dt>友情链接</dt>
                    <dd>
                        <a href="http://www.zhuqu.com/" target="_blank">住趣家居网</a> <span>|</span>
                        <a href="http://www.woshipm.com/" target="_blank">人人都是产品经理</a> <span>|</span>
                        <a href="http://zaodula.com/" target="_blank">互联网er的早读课</a> <span>|</span>
                        <a href="http://lieyunwang.com/" target="_blank">猎云网</a> <span>|</span>
                        <a href="http://www.ucloud.cn/" target="_blank">UCloud</a> <span>|</span>
                        <a href="http://www.iconfans.com/" target="_blank">iconfans</a> <span>|</span>
                        <a href="http://www.html5dw.com/" target="_blank">html5梦工厂</a> <span>|</span>
                        <a href="http://www.sykong.com/" target="_blank">手游那点事</a>

                        <a href="http://www.mycodes.net/" target="_blank">源码之家</a> <span>|</span>
                        <a href="http://www.uehtml.com/" target="_blank">uehtml</a> <span>|</span>
                        <a href="http://www.w3cplus.com/" target="_blank">W3CPlus</a> <span>|</span>
                        <a href="http://www.boxui.com/" target="_blank">盒子UI</a> <span>|</span>
                        <a href="http://www.uimaker.com/" target="_blank">uimaker</a> <span>|</span>
                        <a href="http://www.yixieshi.com/" target="_blank">互联网的一些事</a> <span>|</span>
                        <a href="http://www.chuanke.com/" target="_blank">传课网</a> <span>|</span>
                        <a href="http://www.eoe.cn/" target="_blank">安卓开发</a> <span>|</span>
                        <a href="http://www.eoeandroid.com/" target="_blank">安卓开发论坛</a>
                        <a href="http://hao.360.cn/" target="_blank">360安全网址导航</a> <span>|</span>
                        <a href="http://se.360.cn/" target="_blank">360安全浏览器</a> <span>|</span>
                        <a href="http://www.hao123.com/" target="_blank">hao123上网导航</a> <span>|</span>
                        <a href="http://www.ycpai.com" target="_blank">互联网创业</a><span>|</span>
                        <a href="http://www.zhongchou.cn" target="_blank">众筹网</a><span>|</span>
                        <a href="http://www.marklol.com/" target="_blank">马克互联网</a><span>|</span>
                        <a href="http://www.chaohuhr.com/" target="_blank">巢湖英才网</a>

                        <a href="http://www.zhubajie.com/" target="_blank">创意服务外包</a><span>|</span>
                        <a href="http://www.thinkphp.cn/" target="_blank">thinkphp</a><span>|</span>
                        <a href="http://www.chuangxinpai.com/" target="_blank">创新派</a><span>|</span>

                        <a href="http://w3cshare.com/" target="_blank">W3Cshare</a><span>|</span>
                        <a href="http://www.518lunwen.cn/" target="_blank">论文发表网</a><span>|</span>
                        <a href="http://www.199it.com" target="_blank">199it</a><span>|</span>

                        <a href="http://www.shichangbu.com" target="_blank">市场部网</a><span>|</span>
                        <a href="http://www.meitu.com/" target="_blank">美图公司</a><span>|</span>
                        <a href="https://www.teambition.com/" target="_blank">Teambition</a>
                        <a href="http://oupeng.com/" target="_blank">欧朋浏览器</a><span>|</span>
                        <a href="http://iwebad.com/" target="_blank">网络广告人社区</a>
                        <a href="h/af/flink.html" target="_blank" class="more">更多</a>
                    </dd>
                </dl>
            </div>
        </div>
        <input type="hidden" value="" name="userid" id="userid"/>
        <div style="display:none;">

            <!-- 登录框 -->
            <div id="loginPop" class="popup" style="height:240px;">
                <form id="loginForm">
                    <input type="text" id="email" name="email" tabindex="1" placeholder="请输入登录邮箱地址"/>
                    <input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码"/>
                    <span class="error" style="display:none;" id="beError"></span>
                    <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked"
                                                            name="autoLogin"/> 记住我</label>
                    <a href="h/reset.html" class="fr">忘记密码？</a>
                    <input type="submit" id="submitLogin" value="登 &nbsp; &nbsp; 录"/>
                </form>
                <div class="login_right">
                    <div>还没有拉勾帐号？</div>
                    <a href="register.html" class="registor_now">立即注册</a>
                    <div class="login_others">使用以下帐号直接登录:</div>
                    <a href="h/ologin/auth/sina.html" target="_blank" id="icon_wb" class="icon_wb"
                       title="使用新浪微博帐号登录"></a>
                    <a href="h/ologin/auth/qq.html" class="icon_qq" id="icon_qq" target="_blank" title="使用腾讯QQ帐号登录"></a>
                </div>
            </div><!--/#loginPop-->
        </div>
        <!------------------------------------- end ----------------------------------------->
        <script type="text/javascript" src="/Public/Home/js/Chart.min.js"></script>
        <script type="text/javascript" src="/Public/Home/js/home.min.js"></script>
        <script type="text/javascript" src="/Public/Home/js/count.js"></script>
        <div class="clear"></div>
        <input type="hidden" id="resubmitToken" value=""/>
        <a id="backtop" title="回到顶部" rel="nofollow"></a>
    </div><!-- end #container -->
</div><!-- end #body -->
<div id="footer">
    <div class="wrapper">
        <a href="h/about.html" target="_blank" rel="nofollow">联系我们</a>
        <a href="h/af/zhaopin.html" target="_blank">互联网公司导航</a>
        <a href="http://e.weibo.com/lagou720" target="_blank" rel="nofollow">拉勾微博</a>
        <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<i></i></a>
        <div class="copyright">&copy;2013-2014 Lagou <a target="_blank"
                                                        href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action">京ICP备14023790号-2</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="/Public/Home/js/core.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/popup.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#com').click(function () {
            {
                $('#search_button').click(function () {
                    $("#searchForm").attr("action", ctx2).submit()
                })
            }
        })
    })

</script>

<!-- <script src="/Public/Home/js/wb.js" type="text/javascript" charset="utf-8"></script>
 -->

</body>
</html>