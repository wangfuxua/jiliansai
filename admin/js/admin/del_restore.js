/*
*type： 表名 如group
*tid：  where 条件字段名 如 gid
*tv：   条件字段值 
* $sql = "UPDATE `{$g['type']}` SET `status`='3' WHERE   `{$g['tid']}`='{$g['tv']}'";
* <a id="dev_del" class="group" tid="gid" tv="<?php echo $item['gid']?>" href="javascript: void(0);"><span class="label label-danger">删除</span>
*/
  //删除
  $("#dev_del").live('click',function(){
    var btn = $(this);
    var tv = btn.attr('tv');
    var tid = btn.attr('tid');
    var type = btn.attr('class');
    // alert(id);return false;
    var URL = base_url + "admin/remove/type/"+type+"/tv/"+tv+"/tid/"+tid+"/fuckie/"+Math.floor(Math.random()*9999+1000);
    hiConfirm('您确定要删除吗？', '提示',function(r){
      if(r){
        $.ajax({
          type: "GET",
          url: URL,
          success: function(msg){
           if(msg==3){
            
            btn.parent().html(' <a id="dev_res" class='+type+' tid='+tid+' tv='+tv+' href="javascript: void(0);"><span class="label label-warning">恢复</span>');
           }else{
             jNotify("操作失败!");
             return false;
           }
         }
       });
      }
    });
  });


  //恢复删除
  $("#dev_res").live('click',function(){
    var btn = $(this);
    var tv = btn.attr('tv');
    var tid = btn.attr('tid');
    var type = btn.attr('class');
    // alert(id);return false;
    var URL = base_url + "admin/restore/type/"+type+"/tv/"+tv+"/tid/"+tid+"/fuckie/"+Math.floor(Math.random()*9999+1000);
    hiConfirm('您确定要恢复删除吗？', '提示',function(r){
      if(r){
        $.ajax({
          type: "GET",
          url: URL,
          success: function(msg){
           if(msg==1){
            btn.parent().html(' <a id="dev_del" class='+type+' tid='+tid+' tv='+tv+' href="javascript: void(0);"><span class="label label-danger">删除</span>');
           }else{
             jNotify("操作失败!");
             return false;
           }
         }
       });
      }
    });
  });

/*
*type： 表名 如group
*tid：  where 条件字段名 如 gid
*tv：   条件字段值 
* $sql = "UPDATE `{$g['type']}` SET `ishome`='1' WHERE   `{$g['tid']}`='{$g['tv']}'";
* <a id="dev_del" class="group" tid="gid" tv="<?php echo $item['gid']?>" href="javascript: void(0);"><span class="label label-danger">删除</span>
*/
  //首页推荐
  $("#is_home").live('click',function(){
    var btn = $(this);
    var tv = btn.attr('tv');
    var tid = btn.attr('tid');
    var type = btn.attr('class');
    // alert(id);return false;
    var URL = base_url + "admin/is_home/type/"+type+"/tv/"+tv+"/tid/"+tid+"/fuckie/"+Math.floor(Math.random()*9999+1000);
    hiConfirm('您确定要首页推荐吗？', '提示',function(r){
      if(r){
        $.ajax({
          type: "GET",
          url: URL,
          success: function(msg){
           if(msg==3){
            
            btn.parent().html(' <a id="res_home" class='+type+' tid='+tid+' tv='+tv+' href="javascript: void(0);"><span class="label label-success">首页</span>');
           }else{
             jNotify("操作失败!");
             return false;
           }
         }
       });
      }
    });
  });


  //取消首页推荐
  $("#res_home").live('click',function(){
    var btn = $(this);
    var tv = btn.attr('tv');
    var tid = btn.attr('tid');
    var type = btn.attr('class');
    // alert(id);return false;
    var URL = base_url + "admin/res_home/type/"+type+"/tv/"+tv+"/tid/"+tid+"/fuckie/"+Math.floor(Math.random()*9999+1000);
    hiConfirm('您确定要取消首页推荐吗？', '提示',function(r){
      if(r){
        $.ajax({
          type: "GET",
          url: URL,
          success: function(msg){
           if(msg==1){
            btn.parent().html(' <a id="is_home" class='+type+' tid='+tid+' tv='+tv+' href="javascript: void(0);"><span class="label label-danger">首页</span>');
           }else{
             jNotify("操作失败!");
             return false;
           }
         }
       });
      }
    });
  });
 
 