$(function () {
	var bar = $('.bar');
	var percent = $('.percent');
	var showimg = $('#showimg');
	var progress = $(".progress");
	var files = $(".files");
	var btn = $(".btn span");
	var group_pic = $(".group_pic");
	var url = base_url + "upload/upload";
	//alert(url);
	$("#fileupload").wrap("<form id='myupload'  class='form-horizontal' action="+url+" method='post' enctype='multipart/form-data'></form>");
    $("#fileupload").change(function(){//选择文件 
		$("#myupload").ajaxSubmit({
			dataType:  'json',//数据格式为json 
			beforeSend: function() {//开始上传 
        		showimg.empty(); //清空显示的图片 
				progress.show();//显示进度条 
        		var percentVal = '0%';//开始进度为0% 
        		bar.width(percentVal);//进度条的宽度 
        		percent.html(percentVal);//显示进度为0% 
				btn.html("上传中...");//上传按钮显示上传中 
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		var percentVal = percentComplete + '%';//获得进度 
        		bar.width(percentVal);//上传进度条宽度变宽 
        		percent.html(percentVal);//显示上传进度百分比 
    		},
			success: function(data) {//成功 
				var img = data.path;
				files.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg' rel='"+data.pic+"'><a href='###'>删除</a></span>");//获得后台返回的json数据，显示文件名，大小，以及删除按钮 
				showimg.attr('src', base_url+img); //显示上传后的图片 
				btn.html("Remove");//上传按钮还原 
				$("#fileupload").hide();//隐藏
				group_pic.html("<input   type='hidden' name='pic' value='"+img+"'>");//上传完成后给input赋值
			},
			error:function(xhr){//上传失败 
				btn.html("上传失败");
				bar.width('0')
				files.html(xhr.responseText);//返回失败信息 
			}
		});
	});
	
	$(".delimg").live('click',function(){
		var pic = $(this).attr("rel");
		$.post(url+"?act=delimg",{imagename:pic},function(msg){
			if(msg==1){
				files.html("删除成功.");
				showimg.empty();//清空图片 
				progress.hide();//隐藏进度条 
				$("#fileupload").show();
				//showimg.html("<img class=b_ababab left group_headimg  src='"+base_url+"/images/group_sculpture.png' >"); 
				showimg.attr('src', base_url+'images/group_head.png');//显示上传后的图片 
				group_pic.html("<input   type='hidden' name='gphoto' value=''>");//删除input赋值
				resetFileVal("fileupload");//重置file类型input的value
			}else{
				alert(msg);
			}
		});
	});
});

// 重置file类型input的value
function resetFileVal(f) {
	var fo, f2, evts;
	// 根据传入类型封装
	if (!jQuery.isPlainObject(f)) {
		f = $("#"+f);
	} else {
		f = $(f);
	}
	// 如果有父级form，则直接通过浏览器清空
	fo = f.parents("form");
	if (fo.length < 1) {
		f.wrap("<form></form>");
		fo = f.parent();
	}
	fo[0].reset();
}

