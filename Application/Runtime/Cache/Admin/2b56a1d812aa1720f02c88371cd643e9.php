<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>职位管理</title>

    <!-- Bootstrap -->
    <link href="/Public/Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="/Public/Admin/css/index.css"> -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/rightmain.css">
  </head>
  <body>
      <div class="iframecontent">
        <div class="pos">
         <i class="icoh"></i>
          <span>职位列表</span>
        </div>
        <div class="operate">
          <div class="pull-left">
            <!--<input type="button" name="" value="添加职位" class="btn  btn-success">-->
            <input type="button" name="" value="更新排序" class="btn btn-danger">
          </div>
          <!-- operate标题结束 -->
          <div class="list">
            <div class="tablewrap">
              <table class="table" width="100%" id="datalist">
                <thead>
                  <tr>
                    <th><input type="checkbox" name="" id="all"></th>
                    <th>编号</th>
                    <th>所属类型</th>
                    <th>职位</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                <!--循环取出-->
                  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td class="">
                      <input type="checkbox" name="">
                    </td>
                    <td><?php echo ($vo["id"]); ?></td>
                    <td></td>
                    <td><a href="javascript:;"><?php echo ($vo["name"]); ?></a></td>


                    <td>
                      <a href="<?php echo U(Jodpost/add);?>">添加</a>
                      <a href="javascript:;">修改</a>
                      <a href="<?php echo U(Jodpost/delete);?>">删除</a>
                    </td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
              </table>
            </div>
            <div class="page">123</div>
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