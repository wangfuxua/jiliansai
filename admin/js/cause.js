if (!ph$)
	var ph$ = {};
;ph$.cas = {
	bindEvt : function() {
		var o={}, reg, el;
		el = ph$.reg;
		o.add_cate = $("#add_cate");
		if (o.add_cate.length > 0) {
			o.add_cate.bind("click", function() {
				window.location.href = $(this).attr('url');
			})
		}
		o.ret_list = $("#ret_list");
		if (o.ret_list.length > 0) {
			o.ret_list.bind("click", function() {
				window.location.href = base_url + "cause/causelist";
			})
		}
		o.btn_add = $("#btn_add");
		if (o.btn_add.length > 0) {
			o.btn_add.bind("click", function() {
				window.location.href = base_url + "cause/causeadd";
			})
		}
		o.causetable = $("#causetable");
		if (o.causetable.length > 0) {
			$(".btn_mdf").bind("click", function(){
				var p, obj={}, u;
				p = $(this).parent().parent();
				u = base_url + "cause/dosavecauseajax/" + Math.floor(Math.random()*9999+1000);
				obj.pid = p.find(".pid").val();
				obj.id = p.find(".id").val();
				obj.title = p.find(".title").val();
				obj.weight = p.find(".weight").val();
				jQuery.getJSON(u, obj, function(d) {
					var msg = "保存失败，请检查录入情况。";
					if (d.status) {
						msg = "保存成功。";
						p.find(".initial").html(d.d.initial);
						p.find(".spell").html(d.d.spell);
					}
					ph$.alert(msg);
				});
			})
			$(".btn_edit").bind("click", function(){
				window.location.href = $(this).attr("url");
			})
		}
		if ($("#form_info").length > 0) {
			$('#keys').tagsInput({
				width: 'auto',
				'onAddTag': function () {
					//alert(1);
				},
			});
			$('#types').tagsInput({
				width: 'auto',
				'onAddTag': function () {
					//alert(1);
				},
			});
		}
		if ($("#form_cate").length > 0) {
			$('#neighbor').tagsInput({
				width: 'auto',
				'onAddTag': function () {
					//alert(1);
				},
			});
		}
		// 
		o.prt = $("#parent");
		if (o.prt.length > 0) {
			o.prt.bind("click", function() {
				// ph$.reg.rmCourt(this);
			})
			var config = {
				// url: 'http://suggest.taobao.com/sug?code=utf-8&extras=1',
				url: base_url + 'cause/getcauseparent/',
				//url?queryName=value,默认为输入框的name属性
				queryName: 'key',
				//设置此参数名，将开启jsonp功能，否则使用json数据结构
				// jsonp: 'callback',
				//下拉提示项目单位的选择器，默认一个li是一条提示，与processData写法相关
				item: 'li',
				//当前下拉项目的标记类，可以作为css高亮类名
				itemOverClass: 'suggest-curr-item',
				sequential: 1,
				//提示层的层叠优先级设置，css，你懂的
				'z-index': 999,
				//自定义处理返回的数据，该方法可以return一个html字符串或jquery对象，将被写入到提示的下拉层中
				processData: function(data){
					var template = [];
					template.push('<ul class="suggest-list">');
					var evenOdd = {'0' : 'suggest-item-even', '1': 'suggest-item-odd'}, count = 0;
					//添加奇数，偶数区分
					for (var key in data) {
						if ('inArray' == key)
							break;
						template.push('<li pid="', data[key].id,'" lv="', data[key].lv,'" class="' , evenOdd[(++count) % 2] , '">[id:',data[key].id,']', data[key].title,'[lv:',data[key].lv,']</li>');
					}
					// for(var key in data.result) {
					// 	template.push('<li class="' , evenOdd[(++count) % 2] , '">', data.result[key][0],'</li>');
					// };
					template.push('</ul>');
					return template.join('');
				},
				//定义如何去取得当前提示项目的值并返回值,插件根据此函数获取当前提示项目的值，并填入input中，此方法应根据processData参数来定义
				getCurrItemValue: function($currItem){
					$("#pid").val($currItem.attr("pid"));
					$("#lv").val($currItem.attr("lv"));
					// ph$.reg.buildCourt($currItem.text());
					return $currItem.text();
				},
				//不同于change事件在失去焦点触发，inchange依赖本插件，只要内容有变化，就会触发，并传入input对象
				textchange: function($input){},
				//当选择一个下拉项目触发，并传入这个下拉项目jquery对象
				onselect: function($currItem){}
			};
			$("#parent").suggest(config);
		}
		o.reg_patient = $("#reg_patient");
		if (o.reg_patient.length > 0) {
			reg = o.reg_patient.Validform({
				btnSubmit : "#reg_patient_btn",
				datatype : {
					"m" : /^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$/
				},
				tiptype : function(msg, o, cssctl) {
					var objtip = o.obj.parent().next().find(".Validform_checktip");
					cssctl(objtip, o.type);
					objtip.text(msg);
				}
			});
			reg.addRule([
			{
				ele : "#authcode2",
				ajaxurl : base_url + "passport/checkAuthcodeValidform"
			}, {
				ele : "#username2",
				ajaxurl : base_url + "passport/checkUsernameValidform"
			}, {
				ele : "#email2",
				ajaxurl : base_url + "passport/checkEmailValidform"
			}, {
				ele : "#phone2",
				ajaxurl : base_url + "passport/checkPhoneValidform"
			}
			]);
		}
	},
	init : function() {
		this.bindEvt();
	}
}
jQuery(document).ready(function(){
	ph$.cas.init();
	ph$.cas.handleSelec2();
});