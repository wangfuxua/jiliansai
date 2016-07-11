if (!ph$)
	var ph$ = {};
;ph$.law = {
	bindEvt : function() {
		var o={}, law, el;
		el = ph$.law;
		o.cause = $("#cause");
		if (o.cause.length > 0) {
			var config = {
				// url: 'http://suggest.taobao.com/sug?code=utf-8&extras=1',
				url: base_url + 'sys/getcausesbyroot',
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
						template.push('<li cid="', data[key].id,'" lv="', data[key].lv,'" class="' , evenOdd[(++count) % 2] , '">', data[key].title,'[lv:',data[key].lv,']</li>');
					}
					// for(var key in data.result) {
					// 	template.push('<li class="' , evenOdd[(++count) % 2] , '">', data.result[key][0],'</li>');
					// };
					template.push('</ul>');
					return template.join('');
				},
				//定义如何去取得当前提示项目的值并返回值,插件根据此函数获取当前提示项目的值，并填入input中，此方法应根据processData参数来定义
				getCurrItemValue: function($currItem){
					$("#cid").val($currItem.attr("cid"));
					// $("#lv").val($currItem.attr("lv"));
					// ph$.reg.buildCourt($currItem.text());
					var tmp;
					tmp = $currItem.text();
					tmp = tmp.split('[lv:');
					tmp = tmp[0];
					// $("#ctitle").val(tmp);
					return tmp;
				},
				//不同于change事件在失去焦点触发，inchange依赖本插件，只要内容有变化，就会触发，并传入input对象
				textchange: function($input){},
				//当选择一个下拉项目触发，并传入这个下拉项目jquery对象
				onselect: function($currItem){}
			};
			o.cause.suggest(config);
		}
		o.org = $("#org");
		if (o.org.length > 0) {
			var config = {
				// url: 'http://suggest.taobao.com/sug?code=utf-8&extras=1',
				url: base_url + 'passport/getcourt',
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
						template.push('<li pid="', data[key].id,'" lv="', data[key].lv,'" class="' , evenOdd[(++count) % 2] , '">', data[key].title,'</li>');
					}
					// for(var key in data.result) {
					// 	template.push('<li class="' , evenOdd[(++count) % 2] , '">', data.result[key][0],'</li>');
					// };
					template.push('</ul>');
					return template.join('');
				},
				//定义如何去取得当前提示项目的值并返回值,插件根据此函数获取当前提示项目的值，并填入input中，此方法应根据processData参数来定义
				getCurrItemValue: function($currItem){
					// ph$.reg.buildCourt($currItem.text());
					return $currItem.text();
				},
				//不同于change事件在失去焦点触发，inchange依赖本插件，只要内容有变化，就会触发，并传入input对象
				textchange: function($input){},
				//当选择一个下拉项目触发，并传入这个下拉项目jquery对象
				onselect: function($currItem){}
			};
			o.org.suggest(config);
		}
	},
	init : function() {
		this.bindEvt();
	}
}
jQuery(document).ready(function(){
	ph$.law.init();
});