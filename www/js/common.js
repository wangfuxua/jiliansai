;if (!check)
var check={};
check.html5 = html5();
;if (!ph$)
var ph$ = {};

ph$.alert = function(msg) {
	msg = !!msg ? msg : '';
	layer.alert(msg, 0, '提示');
}

// prototype
Array.prototype.inArray = function(value) {
	for (var i=0; i<this.length; i++) {
		if (value == this[i])
			return true;
	}
	return false;
}
Number.prototype.setPrefix = function(leng) {
	var fix = "00000000000000000000";
	while (leng > fix.length) {
		fix += fix;
	}
	return (fix + this).slice(-1 * leng);
}
String.prototype.ltrim = function(str) {
	if (!str)
		str = " ";
	re = eval("/(^[" + str + "]*)/g");
	return this.replace(re, "");
}
String.prototype.rtrim = function(str) {
	if (!str)
		str = " ";
	re = eval("/([" + str + "]*$)/g");
	return this.replace(re, "");
}
String.prototype.trim = function(str) {
	return this.ltrim(str).rtrim(str);
	if (!str)
		str = " ";
	re = eval("/(^[" + str + "]*)|([" + str + "]*$)/g");
	return this.replace(re, "");
}
function insertAfter(newElement,targetElement) {
	var parent = targetElement.parentNode;
	if (parent.lastChild == targetElement) {
		parent.appendChild(newElement);
	} else {
		parent.insertBefore(newElement,targetElement.nextSibling);
	}
} 
function getScrollTop() {
	return !('pageYOffset' in window)
	? (document.compatMode === "BackCompat")
	? document.body.scrollTop
	: document.documentElement.scrollTop
	: window.pageYOffset;
}

//tab切换
function rTabs(thisObj,Num){
	if(thisObj.className == "select")return;
	var tabObj = thisObj.parentNode.id;
	var tabList = document.getElementById(tabObj).getElementsByTagName("li");
	for(i=0; i <tabList.length; i++){
		if (i == Num) {
			thisObj.className = "select";
			document.getElementById(tabObj+"_Content"+i).style.display = "block";
		} else {
			tabList[i].className = "normal";
			document.getElementById(tabObj+"_Content"+i).style.display = "none";
		}
	}
}

/**
 * 检测是否支持html5
 * @return {[type]} [description]
 */
 function html5() {
 	var rs = false;
 	if (typeof(Worker) !== "undefined")
 		rs = true;
 	return rs;
 }

/**
 * 时间显示格式化，通过传入时间戳，显示XX天前/XX小时前/XX分钟前
 * @param  {int} time 时间戳
 * @return {[type]}      [description]
 */
 function time_format(time) {
 	if (!time)
 		return false;
 	var now, diff, ret, t;
	// 当前时间戳
	now = Date.parse(new Date())/1000;
	// 差值
	diff = now - time;
	// 设置时间
	t = new Date();
	t.setTime(time*1000);
	y = t.getFullYear();
	m = t.getMonth()+1;
	d = t.getDate();
	h = t.getHours();
	i = t.getMinutes();
	// 开始判断
	if (diff > (60*60*24)) {
		ret = y+"-"+m+"-"+d+" "+h+":"+i;
	} else if (diff > (60*60)) {
		ret = parseInt(diff/3600) + "小时前";
	} else if (diff > 60) {
		ret = parseInt(diff/60) + "分钟前";
	} else if (diff > 10) {
		ret = diff + "秒前";
	} else {
		ret = "10秒前";
	}
	return ret;
}

function phalert(content, obj) {
	var neo;
	if ($("#phAlert").length > 0)
		$("#phAlert").remove();
	neo = {};
	neo.title = !!obj&&!!obj.title ? obj.title : '警告';
	neo.close = !!obj&&!!obj.close ? obj.close : '关闭';
	neo.content = !!content ? content : '';
	neo.html = '<div class="modal fade" id="phAlert"><div class="modal-dialog"><div class="modal-content">';
	neo.html += '<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
	neo.html += '<h4 class="modal-title">' + neo.title + '</h4></div>';
	neo.html += '<div class="modal-body">' + neo.content + '</div>';
	neo.html += '<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">' + neo.close + '</button></div>';
	neo.html += '</div></div></div>';
	$("body").append(neo.html);
	$('#phAlert').modal({
		backdrop: 'static',
		keyboard: false
	})
}


;var date = function(fmt, ts) {
	var tmp, d, zone, o={};
	tmp = String(ts);
	if (!fmt)
		return false;
	if (!!ts && (10!==tmp.length && 13!==tmp.length))
		return false;
	// "Y-m-d".match(/[D]/)
	tmp = 10===tmp.length ? tmp+"000" : tmp;
	ts = parseInt(tmp);
	d = !!ts ? new Date(ts) : new Date();
	tmp = d.getTime();
	zone = (new Date().getTimezoneOffset()/60)*(-1);
	o.week = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	o.month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	// alert(t);
	return fmt.replace(/a|A|B|c|d|D|e|F|g|G|h|H|i|I|j|l|L|m|M|n|N|o|O|P|r|s|S|t|T|U|w|W|y|Y|z|Z/g, function(fmt) {
		switch (fmt) {
			case 'a' : return d.getHours() > 11 ? 'pm' : 'am';
			case 'A' : return d.getHours() > 11 ? 'PM' : 'AM';
			// case 'B'
			// case 'c' : return d.getFullYear()
			case 'd' : return ('0' + d.getDate()).slice(-2);
			case 'D' : return (o.week[d.getDay()]).slice(0, 3);
			// case 'e'
			case 'F' : return o.month[d.getMonth()];
			case 'g' : return (s = (d.getHours() || 12)) > 12 ? s - 12 : s;
			case 'G' : return d.getHours();
			case 'h' : return ('0' + ((s = d.getHours() || 12 ) > 12 ? s - 12 : s)).slice(-2);
			case 'H' : return ('0' + d.getHours() ).slice(-2);
			case 'i' : return ('0' + d.getMinutes() ).slice(-2);
			case 'I' : return (function() {
				d.setDate(1);
				d.setMonth(0);
				s = [d.getTimezoneOffset()];
				d.setMonth(6);
				s[1] = d.getTimezoneOffset();
				d.setTime(tmp);
				return s[0] == s[1] ? 0 : 1;
			})();
			case 'j' : return d.getDate();
			case 'l' : return o.week[d.getDay()];
			case 'L' : return (s = d.getFullYear() ) % 4 == 0 && ( s % 100 != 0 || s % 400 == 0) ? 1 : 0;
			case 'm' : return ('0' + ( d.getMonth() + 1)).slice(-2);
			case 'M' : return o.month[d.getMonth()].slice(0, 3);
			case 'n' : return d.getMonth() + 1;
			case 'N' : return d.getDay() + 1;
			case 'o' : return d.getFullYear();
			// case 'O'
			// case 'P' : return 
			case 'r' : return (o.week[d.getDay()]).slice(0, 3) + ' ' + ('0' + d.getDate()).slice(-2) + ' ' + o.month[d.getMonth()].slice(0, 3) + ' ' + d.getFullYear() + ('0' + ((s = d.getHours() || 12 ) > 12 ? s - 12 : s)).slice(-2) + ' ' + ('0' + ( d.getMonth() + 1)).slice(-2) + ' ' + ('0' + d.getSeconds()).slice(-2);
			case 's' : return ('0' + d.getSeconds()).slice(-2);
			case 'S' : return ['th', 'st', 'nd', 'rd'][( s = d.getDate()) < 4 ? s : 0];
			case 't' : return (function() {
				d.setDate(32);
				s = 32 - d.getDate();
				d.setTime(tmp);
				return s;
			})();
			case 'T' : return 'UTC';
			case 'U' : return ('' + tmp).slice(0, -3);
			case 'w' : return d.getDay();
			case 'W' : return parseInt((new Date().getTime() - (new Date(d.getFullYear(), 1, 1).getTime())) / (3600*24*7*1000));
			case 'y' : return ( '' + d.getFullYear() ).slice(-2);
			case 'Y' : return d.getFullYear();
			case 'z' : return (function() {
				d.setMonth(0);
				return d.setTime(f - d.setDate(1))/86400000;
			})();
			default : return -d.getTimezoneOffset() * 60;
		}
	})
}

ph$.input = {
	css : function(url) {
		if (document.body == null) {
			document.write("<link rel='stylesheet' href='" + url + "' type='text/css'/>");
		} else {
			var link = document.createElement("link");
			link.setAttribute("rel", "stylesheet");
			link.setAttribute("type", "text/css");
			link.setAttribute("href", url);
			document.body.appendChild(link);
		}
	},
	js : function(fileUrl, id) {
		if (document.body == null) {
			document.write("<script src='" + fileUrl + "'><\/script>");
		} else {
			var scriptTag = document.getElementById( id );
			var oHead = document.getElementsByTagName('HEAD').item(0);
			var oScript= document.createElement("script");
			if ( scriptTag  ) oHead.removeChild( scriptTag  );
			oScript.id = id != null ? id : "loadjs";
			oScript.type = "text/javascript";
			oScript.src=fileUrl ;
			oHead.appendChild( oScript);
		}
	}
}

/*
$(document).ready(function() {
	lq$.popup.option({
		'title' : "提示",
		'cont' : "系统提示信息",
		//'icon' : "confirm",
		//'icon' : "remove",		
		'call' : 'abcde',
	})
	lq$.popup.init();
});
*/
