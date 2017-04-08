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
        <span>栏目列表</span>
    </div>
    <div class="operate">
        <div class="pull-left">
            <input type="button" name="" value="添加栏目" class="btn  btn-success">
            <input type="button" name="" value="更新排序" class="btn btn-danger">
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
                        <th style="width:80px;">企业ID</th>
                        <th style="width:250px;">企业名称</th>
                        <th>企业电话</th>
                        <th>企业邮箱</th>
                        <th>企业网址</th>
                        <th style="width:120px;">企业地址</th>
                        <th style="width:220px;">企业领域</th>
                        <th style="width:150px;">状态</th>
                        <th style="width:80px;">权限</th>
                        <th style="width: 120px;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($date)): $i = 0; $__LIST__ = $date;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class=""><input type="checkbox" name=""></td>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td><?php echo ($vo["tel"]); ?></td>
                            <td><?php echo ($vo["email"]); ?></td>
                            <td><?php echo ($vo["web"]); ?></td>
                            <td><?php echo ($vo["city"]); ?></td>
                            <td><?php echo ($vo["trade"]); ?></td>
                            <td >
                                <?php if($vo["state"] == 0): ?>禁用
                                    <?php elseif($vo["state"] == 1): ?>已认证
                                    <?php elseif($vo["state"] == -1): ?>未验证
                                    <?php elseif($vo["state"] == 2): ?>未认证
                                    <?php elseif($vo["state"] == 3): ?>正在申请认证<?php endif; ?>
                                <!--<if($vo['state'] eq 0)禁用></if>-->
                                <!--else if($vo['state'] eq 1)-->
                                <!--else if($vo['state'] eq -1)-->
                                <!--else if($vo['state'] eq 2)-->
                                <!--else if($vo['state'] eq 3)-->
                            </td>
                            <td>
                                <a href="<?php echo U('editCompanyState','id='.$vo['id']);?>">修改</a>
                            </td>


                            <td>
                                <!--<a href="javascript:;">添加子栏目</a>-->
                                <!--<a href="javascript:;">列表</a>-->
                                <a href="<?php echo U('edit','id='.$vo['id']);?>">修改</a>
                                <a href="<?php echo U('delete','id='.$vo['id']);?>"
                                   onclick="return confirm('你确定要删除吗？');">删除</a>
                            </td>
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