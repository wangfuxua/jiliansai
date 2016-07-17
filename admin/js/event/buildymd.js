/**
 * 生成年月日下拉菜单的JS
 * 生成对应的3个select选择框
 * 在页面中只要有input的class是'sel_ymd'（不限数量）
 * 选择后，会把结果存入sel_ymd的value中，格式[Y-m-d]
 */
 if (!ph$)
 	var ph$ = {};
 ph$.ymd = {
	/**
	 * 获取目标，可以是一个或多个
	 */
	 getTarget : function() {
	 	var tar;
	 	tar = $("."+ph$.ymd.cfg.target);
	 	tar.each(function(i) {
			// 逐一调用生成年月日的方法
			ph$.ymd.buildYMD(this);
		})
	 },
	/**
	 * 生成年月日
	 * @param  {obj} tar 传入目标input对象
	 */
	 buildYMD : function(tar) {
	 	var neo, o;
	 	o = {};
		// 把目标input设成隐藏
		o.ie = 0;
		if (!!$.browser.msie) {
			if (Math.floor($.browser.version)<9 || Math.floor(document.documentMode)<9) {
				o.ie = 1;
			}
		}
		// 如果是ie9一下的版本则使用display来实现
		if (1 === o.ie) {
			tar.style.display = "none";
		} else {
			tar.type = "hidden";
		}
		// 取出现有值
		o.hour = tar.value.split(" ");
		o.tmp = o.hour.length>1 ? o.hour[0].split("-") : tar.value.split("-");
		neo = {};
		// 年
		neo.year = document.createElement("select");
		neo.year.style.width = "80px";
		neo.year.style.height = "30px";
		neo.year.style.padding = "5px";
		neo.year.style.marginRight = "3px";
		// 循环生成每一年的选项
		o.d = new Date();
		o.t = o.d.getFullYear();
		neo.year.length = 0;
		neo.year.options[0] = new Option('年','');
		o.max = 2037==o.tmp[0] ? 1 : 0;
		neo.year.options[1] = new Option('今天', 'today', o.max);
		o.t++;
		for (var i=0; i<100; i++) {
			o.t--;
			o.flag = 0;
			if (o.tmp[0] == o.t)
				o.flag = 1;
			neo.year.options[i+2] = new Option((o.t + "年"), o.t, o.flag, o.flag);
		}
		tar.parentNode.insertBefore(neo.year, tar);
		// 绑定事件
		neo.year.onchange = function() {
			if ('today' == this.value) {
				// neo.month.value = 1;
				neo.month.style.display = "none";
				// neo.day.value = 1;
				neo.day.style.display = "none";
				if (!!neo.hour)
					neo.hour.style.display = "none";
				// 把结果写入input
				ph$.ymd.setDay(tar, o.d.getFullYear(), (o.d.getMonth()+1), o.d.getDate());
			} else if (!!this.value) {
				neo.month.style.display = "";
				neo.day.style.display = "";
				if (!!neo.hour)
					neo.hour.style.display = "";
				// 根据年月生成日的最大值
				ph$.ymd.setDayMax(this.value, neo.month.value);
				// 创建月份
				ph$.ymd.buildMonth(this, neo.month);
				// 创建日期
				ph$.ymd.buildDay(this, neo.month, neo.day);
				if (!!neo.hour)
					ph$.ymd.buildHour(neo.hour, o.maxh);
				// 把结果写入input
				ph$.ymd.setDay(tar, this.value, neo.month.value, neo.day.value);
			}
			// 回调函数
			ph$.ymd.callback(tar);
		}
		// 月
		neo.month = document.createElement("select");
		neo.month.style.width = "60px";
		neo.month.style.height = "30px";
		neo.month.style.padding = "5px";
		neo.month.style.marginRight = "3px";
		
		neo.month.length = 0;
		neo.month.options[0] = new Option('月', '');
		ph$.ymd.buildMonth(neo.year, neo.month, o.tmp[1]);
		if (1 == o.max)
			neo.month.style.display = "none";
			tar.parentNode.insertBefore(neo.month, tar);
			neo.month.onchange = function() {
			// 根据年月生成日的最大值
			ph$.ymd.setDayMax(neo.year.value, this.value);
			// 创建日期
			ph$.ymd.buildDay(neo.year, this, neo.day);
			if (!!neo.hour)
				ph$.ymd.buildHour(neo.hour, o.maxh);
			// 把结果写入input
			ph$.ymd.setDay(tar, neo.year.value, this.value, neo.day.value);
			// 回调函数
			ph$.ymd.callback(tar);
		}
		// 日
		neo.day = document.createElement("select");
		neo.day.style.width = "60px";
		neo.day.style.height = "30px";
		neo.day.style.padding = "5px";
		if (1 == o.max)
			neo.day.style.display = "none";
		tar.parentNode.insertBefore(neo.day, tar);
		neo.day.onchange = function() {
			if (!!neo.hour)
				ph$.ymd.buildHour(neo.hour, o.maxh);
			// 把结果写入input
			ph$.ymd.setDay(tar, neo.year.value, neo.month.value, this.value);
			// 回调函数
			ph$.ymd.callback(tar);
		}
		// 根据年月生成日的最大值
		ph$.ymd.setDayMax(neo.year.value, neo.month.value);
		ph$.ymd.buildDay(neo.year, neo.month, neo.day, o.tmp[2]);
		// 小时
		if (!tar.getAttribute("format")) {
			return false;
		} else if (!tar.getAttribute("format").match(/[hi]/)) {
			return false;
		}
		neo.hour = document.createElement("select");
		neo.hour.options[0] = new Option('小时','');
		o.hours = o.hour[1].split(":");
		o.maxh = 24;
		if (!!tar.getAttribute("format").match(/[i]/)) {
			o.maxh = 48;
		}
		ph$.ymd.buildHour(neo.hour, o.maxh, o.hour[1]);
		
		for (var i=0; i<o.maxh; i++) {
			o.h = 0;
			if (o.maxh > 24) {
				if (0 === i%2) {
					o.h = Number(i/2).setPrefix(2) + ":00";
				} else {
					o.h = parseInt(i/2).setPrefix(2) + ":30";
				}
			} else {
				o.h = Number(i).setPrefix(2) + ":00";
			}
			o.flag = 0;
			if (o.hour[1] == o.h)
				o.flag = 1;
			neo.hour.options[i+1] = new Option(o.h, o.h, o.flag)
		}
		
		tar.parentNode.insertBefore(neo.hour, tar);
	},
	buildHour : function(hour, max, def) {
		var neo={}, flag;
		hour.options[0] = new Option('小时','');
		for (var i=0; i<max; i++) {
			neo.h = 0;
			if (max > 24) {
				if (0 === i%2) {
					neo.h = Number(i/2).setPrefix(2) + ":00";
				} else {
					neo.h = parseInt(i/2).setPrefix(2) + ":30";
				}
			} else {
				neo.h = Number(i).setPrefix(2) + ":00";
			}
			flag = 0;
			if (def == neo.h)
				flag = 1;
			hour.options[i+1] = new Option(neo.h, neo.h, flag, flag)
		}
	},
	/**
	 * 生成月份
	 * @param  {obj} y   年份的select元素对象
	 * @param  {obj} m   月份的select元素对象
	 * @param  {int} def 月份的默认值
	 */
	 buildMonth : function(y, m, def) {
	 	var neo={}, flag, d;
	 	d = new Date();
	 	m.length = 0;
	 	m.options[0] = new Option('月', '');
	 	for (var i=0; i<12; i++) {
	 		//if (y.value==d.getFullYear() && i>d.getMonth())
	 			//continue;//时间限制
	 		flag = 0;
	 		if (def == (i+1))
	 			flag = 1;
	 		m.options[i+1] = new Option((i+1)+"月", i+1, flag, flag);
	 	}
	 },
	/**
	 * 生成日期
	 * @param  {obj} y   年份的select元素对象
	 * @param  {obj} m   月份的select元素对象
	 * @param  {obj} d   日期的select元素对象
	 * @param  {int} def  日期的默认值
	 */
	 buildDay : function(y, m, d, def) {
	 	var neo={}, flag, t;
	 	t = new Date();
	 	d.length = 0;
	 	d.options[0] = new Option('日', '');
	 	for (var i=0; i<ph$.ymd.cfg.daymax; i++) {
	 		/*if (y.value==t.getFullYear() && m.value==(t.getMonth()+1) && i>(t.getDate()-1)) {
	 			continue;
	 		}*/
	 		flag = 0;
	 		if (def == (i+1))
	 			flag = 1;
	 		d.options[i+1] = new Option((i+1)+"日", i+1, flag, flag);
	 	}
	 },
	/**
	 * 回调函数
	 * @return {Function} [description]
	 */
	 callback : function(tar) {
	 	if (!tar.getAttribute("call"))
	 		return false;
	 	var o={};
	 	o.call = tar.getAttribute("call");
	 	eval(o.call+"()");
	 },
	/**
	 * 把选择的年月日写入目标input
	 * @param {obj} tar 目标input对象
	 * @param {int} y   年
	 * @param {int} m   月
	 * @param {int} d   日
	 */
	 setDay : function(tar, y, m, d) {
	 	tar.value = y+"-"+m+"-"+d;
	 },
	/**
	 * 根据年月设置日期最大值
	 * @param {int} y 年
	 * @param {int} m 月
	 */
	 setDayMax : function(y, m) {
	 	var other = [4, 6, 9, 11], max=31;
	 	if (2 == m) {
	 		max = 28;
	 		if (0 === y%4)
	 			max = 29;
	 	} else if (!!other.inArray(m)) {
	 		max = 30;
	 	}
	 	ph$.ymd.cfg.daymax = max;
	 },
	 cfg : {
		// 对象class名
		'target' : 'sel_ymd',
		// 默认最大日期
		'daymax' : 31,
		'selmsg' : '请选择'
	},
	init : function() {
		ph$.ymd.getTarget();
	}
}
jQuery(document).ready(function(){
	ph$.ymd.init();
});