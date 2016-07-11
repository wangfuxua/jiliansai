/******************
**********上传*********
*******************/
$(function () {
	var bar = $('.bar');
	var percent = $('.percent');
	var showimg = $('#showimg');
	var progress = $(".progress");
	var files = $(".files");
	var btn = $(".btn span");
	var group_pic = $(".group_pic");
	var url = base_url + "upload/case_upload_file";
	var root = base_url;
	var comments = $("#comments");
	//alert(url);
	$("#fileupload").wrap("<form id='myupload' action="+url+" method='post' enctype='multipart/form-data'></form>");
    $("#fileupload").change(function(){//选择文件 
		$("#myupload").ajaxSubmit({
			dataType:  'json',//数据格式为json 
			beforeSend: function() {//开始上传 
        		//showimg.empty(); //清空显示的图片 
        		$(".up_data_row").hide();//隐藏
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
			if(!!data.title){
				btn.hide();//隐藏进度条 
				progress.hide();//隐藏进度条 
				files.html("<b>"+data.title+"("+data.size+"k)</b> <span class='delimg' rel='"+data.title+"'><a href=''> 删除</a></span>");//获得后台返回的json数据，显示文件名，大小，以及删除按钮 
				$("#fileupload").hide();//隐藏
				$(".publish_right_9").hide();//隐藏
				$(".publish_right_6").hide();//隐藏
				$(".publish_right_2").hide();//隐藏
				$("#docfile").val(data.docurl);//上传完成后给input赋值
				$("#imgurl").val(data.downurl);//上传完成后给input赋值
				$("#title").val(data.title);//上传完成后给input赋值


			}else{
				$("#message").show().html(msg).fadeOut(10000);
				}
			},
			error:function(xhr){//上传失败 
				btn.html("上传失败");
				bar.width('0')
				files.html(xhr.responseText);//返回失败信息 
				$("#message").show().html(xhr.responseText).fadeOut(10000);
			}
		});
	});
	
	$(".delimg").live('click',function(){
		var pic = $(this).attr("rel");
		//alert(pic);
		$.post(url+"?act=delimg",{imagename:pic},function(msg){
			if(msg==1){
				files.html("删除成功.");
				//showimg.empty();//清空图片 
				progress.hide();//隐藏进度条 
				$("#fileupload").show();
				$(".publish_right_9").show();//隐藏
				$(".publish_right_6").show();//隐藏
				$(".publish_right_2").show();//隐藏
				$("#docfile").val('');//删除input赋值
				$("#imgurl").val('');//删除input赋值
				$("#title").val('');//删除input赋值
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

//_____________________________________________________________________________________


if (!fg$)
	var fg$ = {};
 
var curPage = 1; //当前页码
var total,pagesize,allpage;//总记录数，每页显示数，总页数 

fg$.doc = {//start


	/**cu
	 * 用于用户自己设定cfg的参数
	 * @param  {option}   option   传入的参数
	 * @param  {function} callback 回调函数
	 */
	option : function(option){
	 	var el = this;
	 	el.cfg = option;
		// alert(fg$.doc.cfg.uid);
	},

//___________________________________________________________

	//读取资料文献
	doc_load : function(page){
		
		var url, cfg=fg$.doc.cfg, root;
		// alert(cfg.url_class);
		var comments = $("#comments");
		var tmp="";
		if(!!cfg.url_class)
		tmp ="class/"+cfg.url_class+"/";
		 
		$.getJSON( cfg.root +"resource/get_resource/"+tmp+"page/"+page+"/"+Math.floor(Math.random()*9999+1000),function(json){
			comments.empty();//注销这句话表现形式为微博列表

			total = json.total; //总记录数
			pagesize = json.pagesize; //每页显示条数
			curPage = page; //当前页
			allpage = json.allpage; //总页数
			
			if(total!=0){
				var list = json.list;
				$.each(list,function(index,array){
					//alert(array['cont'])
					tmp = "";
					if (cfg.uid == array.auid) {
						tmp="<a  class='right f_12px c_333 pub_btn1' style='margin-top:0px;' onclick=comment_del('"+array['id']+"');  href='javascript: void(0);'>删除</a>";
					}
					if(array.imgpath=='') head=cfg.root+"images/img.png";
					else head=array.imgpath;
					
					var cont  = "<ul class='data_list b_d1d1d1_b'>";
						cont += "<li class='data_w1'><a href='"+cfg.root+"resource/resource_show/id/"+array.id+"' class='c_2d64bb1' target='_blank'>"+array.title+"</a> </li>";
						cont += "<li class='data_w2'><a href='"+cfg.root+"person/index/id/"+array.uid+"' class='c_2d64bb1' target='_blank'>"+array.username+"</a> </li>";
						cont += "<li class='data_w2'>"+array.dateline+"</li>";
						cont += "<li class='data_w3 c_2d64bb'>"+array.comment_count+"</li>";
						cont += "<li class='data_w3 c_2d64bb'>"+array.counter+"</li>";
						cont += "<li class='data_w4'><a href='"+cfg.root+array.filename+"' class='data_i2 left'></a></li>";
						cont += "<div class='clear'></div>";
						cont += "</ul>";
					comments.append(cont);
					fg$.doc.doc_page(total,pagesize,allpage);
				});
			}
		});
	}, 


//___________________________________________________________
	//翻页
	doc_page :function (total,pagesize,allpage){
		if(allpage>1){

			//页码大于最大页数
			if(curPage>allpage) curPage=allpage;
			//页码小于1
			if(curPage<1) curPage=1;
			pageStr = "<!--span>共"+total+"条</span--><span>"+curPage+"/"+allpage+"</span> ";
			pageStr += "<span class='right'>";  
			//如果是第一页
			if(curPage==1){
				//pageStr += "<span>首页</span><span>上一页</span>";
			}else{
				pageStr += "<a class='c_999' href='javascript:void(0)' rel='1'>首页</a><a  class='c_999' href='javascript:void(0)' rel='"+(curPage-1)+"'>上一页</a>";
			}
			
			//如果是最后页
			if(curPage>=allpage){
				//pageStr += "<span>下一页</span><span>尾页</span>";
			}else{
				pageStr += "<a class='c_999' href='javascript:void(0)' rel='"+(parseInt(curPage)+1)+"'>下一页</a><a class='c_999' href='javascript:void(0)' rel='"+allpage+"'>尾页</a>";
			}
			pageStr += "</span>";
			$("#pagecount").html(pageStr);
		}
	}

//___________________________________________________________

}//end

