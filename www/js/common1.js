;if (!ph$)
var ph$ = {};

function popAlert(cont, title) {
 	$alertconf.tc.alert(cont, title);
 };
 function popConfirm(cont, title) {
 	$alertconf.tc.confirm(cont, title);
 };
 var $alertconf={};
 $alertconf.tc={
 	alert:function(cont, title){
 		if($("#alert_box").length > 0)
 			return false;
 		var string,string_shadow,string_box;
 		title=title?title:"提示信息";
 		cont=cont?cont:"";
 		string_shadow = '<div class="alert_shadow" id="alert_shadow"></div>';
 		string_box = '<div class="alert_box" id="alert_box"><div class="alert_title">';
 		string_box += '<div class="title_info">'+title+'</div>';
 		string_box += '<div class="title_close"onclick="$alertconf.tc.alertRemove()"></div><div class="clear"></div></div><div class="alert_conta">';
 		string_box += '<div class="conta_content"><p>' + cont + '</p></div>';
 		string_box += '<div class="conta_btn"><a href="javascript:;" onclick="$alertconf.tc.clickture(true);" class="ay atrue" autofocus="autofocus">确定</a>';
 		string= string_shadow + string_box;
 		$("body").append(string);
 		$(".atrue").focus();
 	},
 	alertRemove:function(){
 		$("#alert_shadow").remove();
 		$("#alert_box").remove();
 	},
 	payinfo:function(cont,title){
 		if($("#alert_box").length > 0)
 			return false;
 		var string,string_shadow,string_box,u;
 		u=base_url;
 		title=title?title:"支付信息提示：";
 		cont=cont?cont:"请您在新打开的网上银行页面进行支付，支付完成前请不要关闭该窗口！";
 		string_shadow = '<div class="alert_shadow" id="alert_shadow"></div>';
 		string_box = '<div class="alert_box" id="alert_box"><div class="alert_title">';
 		string_box += '<div class="title_info">'+title+'</div>';
 		string_box += '<div class="clear"></div></div><div class="alert_conta">';
 		string_box += '<div class="conta_content"><p>' + cont + '</p></div>';
 		string_box += '<div class="conta_btn"><a href="'+u+'designer/Accountp/transaction'+'" class="ay ctrue" onclick="$alertconf.tc.clickture();">支付成功</a>';
 		string_box += '<a href="javascript:;" class="an" onclick="$alertconf.tc.refresh()">支付失败</a></div></div></div>';
 		string= string_shadow + string_box;
 		$("body").append(string);
 		$(".ctrue").focus();
 	},
 	confirm:function(cont, title){
 		if($("#alert_box").length > 0)
 			return false;
 		var string,string_shadow,string_box;
 		title=title?title:"提示信息";
 		cont=cont?cont:"";
 		string_shadow = '<div class="alert_shadow" id="alert_shadow"></div>';
 		string_box = '<div class="alert_box" id="alert_box"><div class="alert_title">';
 		string_box += '<div class="title_info">'+title+'</div>';
 		string_box += '<div class="title_close"onclick="$alertconf.tc.confirmRemove()"></div><div class="clear"></div></div><div class="alert_conta">';
 		string_box += '<div class="conta_content"><p>' + cont + '</p></div>';
 		string_box += '<div class="conta_btn"><a href="javascript:;"class="ay ctrue" onclick="$alertconf.tc.clickture();">确定</a>';
 		string_box += '<a href="javascript:;" class="an" onclick="$alertconf.tc.clickfalse()">取消</a></div></div></div>';
 		string= string_shadow + string_box;
 		$("body").append(string);
 		$(".ctrue").focus();
 	},
 	refresh:function(){
 		window.location.href=window.location.href;
 	},
 	clickture:function(){
 		$alertconf.tc.confirmeCloseWind();
 		return true;
 		console.log(true);
 		/*$alertconf.tc.confirmerture();*/
 	},
 	clickfalse:function(){
 		$alertconf.tc.confirmeCloseWind();
 		/*$alertconf.tc.confirmerfalse();*/
 		return false;
 		console.log(false);
 	},
 	confirmeCloseWind:function(){
 		$("#alert_shadow").remove();
 		$("#alert_box").remove();
 	}
 }