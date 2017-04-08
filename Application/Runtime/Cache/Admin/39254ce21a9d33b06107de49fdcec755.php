<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>栏目管理</title>

    <!-- Bootstrap -->
    <link href="/Public/Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="/Public/Admin/css/index.css"> -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/rightmain.css">
</head>
<body>
<div class="iframecontent">
    <div class="pos">
        <i class="icoh"></i>
        <span>管理员列表</span>
    </div>
    <div class="operate">
        <div class="pull-left">
            <a href="<?php echo U('Manager/add');?>">
            <input type="button"  value="添加管理员" class="btn  btn-success">
            </a>
            <a href="<?php echo U('Manager/fit');?>">
            <input type="button" name="" value="设置等级权限" class="btn btn-danger">
            </a>
        </div>
        <!-- operate标题结束 -->
        <div class="list">
            <div class="tablewrap">
                <table class="table" width="100%" id="datalist">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" id="all">
                        </th>
                        <th >ID</th>
                        <th>用户名</th>
                        <th>密码</th>
                        <th>头像</th>
                        <th>状态</th>
                        <th>注册时间</th>
                        <th>登录时间</th>
                        <th>登录IP</th>
                        <th>工作状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class=""><input type="checkbox" name=""></td>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["username"]); ?></td>
                            <td><?php echo ($vo["password"]); ?></td>
                            <td>查看</td>
                            <td>
                                <?php if($vo["status"] == 0): ?>关闭
                                    <?php elseif($vo["status"] == 1): ?>开启<?php endif; ?>
                            </td>
                            <td><?php echo (date("Y-m-d",$vo["create_time"])); ?></td>
                            <td><?php echo (date("Y-m-d",$vo["login_time"])); ?></td>
                            <td><?php echo ($vo["login_ip"]); ?></td>
                            <td>
                                <?php if($vo["login_state"] == 0): ?>已下线
                                    <?php elseif($vo["login_state"] == 1): ?>正在工作<?php endif; ?>
                            </td>

                            <!--<td >-->
                                <!--<?php if($vo["state"] == 0): ?>禁用-->
                                    <!--<?php elseif($vo["state"] == 1): ?>已认证-->
                                    <!--<?php elseif($vo["state"] == -1): ?>未验证-->
                                    <!--<?php elseif($vo["state"] == 2): ?>未认证-->
                                    <!--<?php elseif($vo["state"] == 3): ?>正在申请认证-->

                                    <!--<?php endif; ?>-->
                            <!--</td>-->

                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>
            </div>
            <div class="page"><?php echo ($show); ?></div>
        </div>

    </div>
</div>


<script src="/Public/Admin/public/js/jquery-3.1.1.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    //alert($)
    //复选框全部选中
    $(function(){
        $("#all").click(function(){
            if($(this).prop('checked')){
                $('#datalist :checkbox').prop('checked',true)
            }else{
                $('#datalist :checkbox').prop('checked',false)
            }
        })
    })
</script>
</body>
</html>