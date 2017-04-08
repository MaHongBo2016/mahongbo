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
                        <th><input type="checkbox" name="" id="all"></th>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>创建时间</th>
                        <th>用户</th>
                        <th>登录时间</th>
                        <th>用户IP</th>
                        <th>状态</th>
                        <th>权限修改</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td class=""><input type="checkbox" name=""></td>
                        <td><?php echo ($vo["id"]); ?></td>
                        <td><?php echo ($vo["username"]); ?></td>
                        <td><a href="javascript:;"><?php echo (date("Y-m-d",$vo["create_time"])); ?></a></td>
                        <td><?php if($vo["type"] == 1): ?>个人
                            <?php elseif($vo["type"] == 2): ?>企业<?php endif; ?></td>
                        <td><?php echo (date("Y-m-d",$vo["login_time"])); ?></td>
                        <td><?php echo ($vo["login_ip"]); ?></td>
                        <td> <?php if($vo["state"] == 0): ?>禁用
                            <?php elseif($vo["state"] == 1): ?>正常<?php endif; ?>
                        </td>
<<<<<<< .mine
                        <td><a href="#">恢复正常&nbsp;&nbsp;&nbsp;</a><a href="">禁止</a></td>
>>>>>>> .r57
                        <td>
                            <!--<a href="javascript:;">添加子栏目</a>-->
                            <!--<a href="javascript:;">列表</a>-->
                            <a href="<?php echo U('User/edit',array('id'=>$vo['id']));?>">修改</a>
                            <a href="<?php echo U('User/delete',array('id'=>$vo['id']));?>"
                               onclick="return confirm('你确定要删除吗？');">删除</a>
||||||| .r58
                        <td><a href="">恢复正常&nbsp;&nbsp;&nbsp;</a><a href="">禁止</a></td>
                        <td>
                            <!--<a href="javascript:;">添加子栏目</a>-->
                            <!--<a href="javascript:;">列表</a>-->
                            <a href="<?php echo U('User/edit',array('id'=>$vo['id']));?>">修改</a>
                            <a href="<?php echo U('User/delete',array('id'=>$vo['id']));?>"
                               onclick="return confirm('你确定要删除吗？');">删除</a>
=======
                        <td><?php if($vo["state"] == 0): ?><a href="<?php echo U('editUserState','id='.$vo['id'].'&state='.$vo['state']);?>"
                            onclick="return confirm('你确定要修改他的状态么？')">
                            恢复正常</a>
                            <?php elseif($vo["state"] == 1): ?>
                            <a href="<?php echo U('editUserState','id='.$vo['id'].'&state='.$vo['state']);?>"
                               onclick="return confirm('你确定要修改他的状态么？')">禁止</a><?php endif; ?>


>>>>>>> .r69
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
            if($(this).prop("checked")){
                $("#datalist :checkbox").prop("checked",true)
            }else{
                $("#datalist :checkbox").prop("checked",false)
            }
        })
    })
</script>
</body>
</html>