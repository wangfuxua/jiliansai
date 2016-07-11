if (!ph$)
	var ph$ = {};
;ph$.user = {
	bindEvt : function() {
		var o={};
		o.btn_retpwd = $(".btn_retpwd");
		if (o.btn_retpwd.length > 0) {
			o.btn_retpwd.bind("click", function() {
				if (confirm("您确认要重置该用户密码么？")) {
					var u;
					u = base_url + "user/resetpwd/uid/" + $(this).attr('uid') + "/rand/" + Math.floor(Math.random()*9999+1000);
					jQuery.getJSON(u, function(d) {
						alert(d.msg);
					})
				}
			})
		}
		o.prt = $("#sel_org2");
		if (o.prt.length > 0) {
			o.prt.bind("click", function() {
				// ph$.reg.rmCourt(this);
			})
			var config = {
				// url: 'http://suggest.taobao.com/sug?code=utf-8&extras=1',
				url: base_url + 'cause/getcourtsajax/',
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
	},

	handleSelec2 : function () {

		function movieFormatResult(item) {
			var markup = "<div>";
			markup += item.title;
			markup += "</div>"
			return markup;
		}

		function movieFormatSelection(item) {
			ph$.user.setTag(item);
			return item.title;
		}

		$("#sel_org").select2({
			placeholder: "根据拼音或者关键字搜索",
			minimumInputLength: 2,
			// instead of writing the function to execute the request we use Select2's convenient helper
			ajax: {
				url: base_url + "court/getcourtsajax",
				dataType: 'json',
				data: function (term, page) {
					return {
						// search term
						key: term,
						page_limit: 10,
						// please do not use so this example keeps working
						apikey: "fdjsaklsdiekfj1jhjdsvn"
					};
				},
				// parse the results into the format expected by Select2.
				results: function (data, page) {
					// since we are using custom formatting functions we do not need to alter remote JSON data
					return {
						results: data
					};
				}
			},
			initSelection: function (element, callback) {
				// the input tag has a value attribute preloaded that points to a preselected movie's id
				// this function resolves that id attribute to an object that select2 can render
				// using its formatResult renderer - that way the movie name is shown preselected
				var id = $(element).val();
				if (id !== "") {
					$.ajax("http://api.rottentomatoes.com/api/public/v1.0/movies/" + id + ".json", {
						data: {
							apikey: "fdjsaklsdiekfj1jhjdsvn"
						},
						dataType: "jsonp"
					}).done(function (data) {
						callback(data);
					});
				}
			},
			// omitted for brevity, see the source of this page
			formatResult: movieFormatResult,
			// omitted for brevity, see the source of this page
			formatSelection: movieFormatSelection,
			// apply css that makes the dropdown taller
			dropdownCssClass: "bigdrop",
			// we do not want to escape markup since we are displaying html in results
			escapeMarkup: function (m) {
				return m;
			}
		});
	},
	setTag : function(item) {
		var o={};
		o.tar = $("#org")
		o.val = o.tar.val();
		if (o.val.length > 0) {
			o.v = o.val.split(',');
			if (o.v.length >= 4) {
				alert("最多只能选择4个审判机构");
				return false;
			}
			if (!o.v.inArray(item.title)) {
				o.v.push(item.title);
				o.v = o.v.join(',');
				// o.tar.val(o.v.join(','));
			}
		} else {
			o.v = item.title;
			// o.tar.val(item.title);
		}
		ph$.user.buildTag(o.v);
	},
	remTag : function(tar) {
		var o={}, tag;
		tag = $(tar).attr('tag');
		o.tar = $("#org")
		o.val = o.tar.val();
		if (o.val.length <= 0) {
			return false;
		}
		o.val = ','+o.val+',';
		// alert(tag);
		o.val = o.val.replace(','+tag+',', ',');
		o.val = o.val.trim(',');
		ph$.user.buildTag(o.val);
		return 0;
		$("#org").val(o.val);

		o.v = o.val.length>0 ? o.val.split(',') : [];
		$("#tag_layer").html("");
		o.s = '';
		for (var i=0; i<o.v.length; i++) {
			o.s += '<span class="tag"><span>'+o.v[i]+'&nbsp;&nbsp;</span><a href="javascript: void(0);" onclick="ph$.user.remTag(this)" class="btn_closetag" title="移除机构" tag="'+o.v[i]+'">x</a></span>';
		}
		$("#tag_layer").append(o.s);
	},
	buildTag : function(v) {
		var a, s;
		$("#org").val(v);

		a = v.length>0 ? v.split(',') : [];
		$("#tag_layer").html("");
		s = '';
		for (var i=0; i<a.length; i++) {
			s += '<span class="tag"><span>'+a[i]+'&nbsp;&nbsp;</span><a href="javascript: void(0);" onclick="ph$.user.remTag(this)" class="btn_closetag" title="移除机构" tag="'+a[i]+'">x</a></span>';
		}
		$("#tag_layer").append(s);
	},
	init : function() {
		this.bindEvt();
		this.handleSelec2();
	}
}
jQuery(document).ready(function(){
	ph$.user.init();
});