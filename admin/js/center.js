if (!ph$)
	var ph$ = {};
;ph$.cter = {
	bindEvt : function() {
		var o={}, cter, el;
		el = ph$.cter;
		o.intro = $("#intro");
		if (o.intro.length > 0) {
			o.intro.bind("keyup", function() {
				el.setTextCount();
			})
		}
		// 律师其他信息
		o.form_law_other = $("#form_law_other");
		if (o.form_law_other.length > 0) {
			$(".del").bind("click", function() {
				ph$.cter.rmCourt(this);
			})
			var user = o.form_law_other.Validform({
				btnSubmit : "#btn_others",
				ajaxPost : true,
				callback : function(data) {
					ph$.alert('保存成功');
				},
				tiptype : 4
			})
			var config = {
				// url: 'http://suggest.taobao.com/sug?code=utf-8&extras=1',
				url: base_url + 'passport/getcourt/',
				//url?queryName=value,默认为输入框的name属性
				queryName: 'key',
				//设置此参数名，将开启jsonp功能，否则使用json数据结构
				// jsonp: 'callback',
				//下拉提示项目单位的选择器，默认一个li是一条提示，与processData写法相关
				item: 'li',
				//当前下拉项目的标记类，可以作为css高亮类名
				itemOverClass: 'suggest-curr-item',
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
						template.push('<li class="' , evenOdd[(++count) % 2] , '">', data[key].title,'</li>');
					}
					// for(var key in data.result) {
					// 	template.push('<li class="' , evenOdd[(++count) % 2] , '">', data.result[key][0],'</li>');
					// };
					template.push('</ul>');
					return template.join('');
				},
				//定义如何去取得当前提示项目的值并返回值,插件根据此函数获取当前提示项目的值，并填入input中，此方法应根据processData参数来定义
				getCurrItemValue: function($currItem){
					ph$.cter.buildCourt($currItem.text());
					// return $currItem.text();
				},
				//不同于change事件在失去焦点触发，inchange依赖本插件，只要内容有变化，就会触发，并传入input对象
				textchange: function($input){},
				//当选择一个下拉项目触发，并传入这个下拉项目jquery对象
				onselect: function($currItem){}
			};
			$("#auto_suggest").suggest(config);
		}
		o.form_law = $("#form_law");
		if (o.form_law.length > 0) {
			var cter = o.form_law.Validform({
				btnSubmit : "#user_submit",
				datatype : {
					"m" : /^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$/
				},
				tiptype : 4,
				ajaxPost : true,
				callback : function(data) {
					ph$.alert('保存成功');
				}
			})
		}
		o.form_person = $("#form_person");
		if (o.form_person.length > 0) {
			var cter = o.form_person.Validform({
				btnSubmit : "#user_submit",
				datatype : {
					"m" : /^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$/
				},
				tiptype : 4,
				ajaxPost : true,
				callback : function(data) {
					ph$.alert('保存成功');
				}
			})
		}
		o.btn_header = $("#btn_header");
		if (o.btn_header.length > 0) {
			if (!!check.html5) {
				o.btn_header.uploadifive({
					'fileObjName' : 'btn_header',
					'buttonText' : '选择头像',
					'buttonClass' : 'touxiang-images',
					'width' : 107,
					'height' : 36,
					'fileSizeLimit' : '2MB',
					'fileType' : 'image',
					'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
					// 'removeCompleted' : true,
					'formData' : {
					},
					'uploadScript' : base_url + 'upload/uploadheader',
					'onInit' : function() {
						$(".uploadifive-button").removeClass('uploadifive-button');
					},
					'onUploadComplete' : function(file, data) {
						var d = eval("("+data+")");
						if (1 == d.status) {
							var u = base_url + d.url + "?" + Math.floor(Math.random()*9999+1000);;
							$("#header_photo").attr("src", u);
							// el.viewDoctorPaper('f', d.url);
						}
					},
					'onError' : function(errorType) {
						el.showDoctorError(errorType);
					}
				})
			} else {
				o.btn_header.uploadify({
					// 'debug' : true,
					'fileObjName' : 'btn_header',
					'buttonText' : '选择头像',
					'buttonClass' : 'touxiang-images_1',
					'width' : 107,
					'height' : 36,
					'fileSizeLimit' : '2MB',
					'fileTypeDesc' : 'Image Files',
					'fileTypeExts' : '*.gif; *.jpg; *.png; *.jpeg',
					'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
					'formData' : {'uid' : uid},
					'swf' : base_url + 'data/flash/uploadify.swf',
					'uploader' : base_url + 'upload/uploadheader',
					'onInit' : function() {
						$(".uploadify-button").removeClass('uploadify-button');
					},
					'onUploadSuccess' : function(file, data, response) {
						// alert(data);
						var d = eval("("+data+")");
						if (1 == d.status) {
							var u = base_url + d.url + "?" + Math.floor(Math.random()*9999+1000);;
							$("#header_photo").attr("src", u);
							// el.viewDoctorPaper('f', d.url);
						}
					},
					'onUploadError' : function(file, errorCode, errorMsg, errorString) {
						el.showDoctorError(errorString);
					}
				});
}
}
		// o.btn_paper = $("#btn_paper_f");
		if ($("#btn_paper_f").length > 0) {
			if (!!check.html5) {
				$('#btn_paper_f').uploadifive({
					'fileObjName' : 'btn_paper_f',
					'buttonText' : '',
					'buttonClass' : 'xuanze',
					'width' : 121,
					'height' : 36,
					'fileSizeLimit' : '2MB',
					'fileType' : 'image',
					'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
					// 'removeCompleted' : true,
					'formData' : {
						'loc' : 'f'
					},
					'uploadScript' : base_url + 'upload/uploadPaper',
					'onInit' : function() {
						$(".uploadifive-button").removeClass('uploadifive-button');
					},
					'onUploadComplete' : function(file, data) {
						var d = eval("("+data+")");
						if (1 == d.status) {
							el.viewDoctorPaper('f', d.url);
						}
					},
					'onError' : function(errorType) {
						el.showDoctorError(errorType);
					}
				});
				$('#btn_paper_b').uploadifive({
					'fileObjName' : 'btn_paper_b',
					'buttonText' : '',
					'buttonClass' : 'xuanze xuanze1',
					'width' : 121,
					'height' : 36,
					'fileSizeLimit' : '2MB',
					'fileType' : 'image',
					'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
					// 'removeCompleted' : true,
					'formData' : {
						'loc' : 'b'
					},
					'uploadScript' : base_url + 'upload/uploadPaper',
					'onInit' : function() {
						$(".uploadifive-button").removeClass('uploadifive-button');
					},
					'onUploadComplete' : function(file, data) {
						var d = eval("("+data+")");
						if (1 == d.status) {
							el.viewDoctorPaper('b', d.url);
						}
					},
					'onError' : function(errorType) {
						el.showDoctorError(errorType);
					}
				});
			} else {
				$('#btn_paper_f').uploadify({
					// 'debug' : true,
					'fileObjName' : 'btn_paper_f',
					'buttonText' : '',
					'buttonClass' : 'xuanze',
					'width' : 160,
					'height' : 38,
					'fileSizeLimit' : '20MB',
					'fileTypeDesc' : 'Image Files',
					'fileTypeExts' : '*.gif; *.jpg; *.png; *.jpeg',
					'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
					'formData' : {'loc' : 'f', 'uid' : uid},
					'swf' : base_url + 'data/flash/uploadify.swf',
					'uploader' : base_url + 'upload/uploadDoctor5',
					'onInit' : function() {
						$(".uploadify-button").removeClass('uploadify-button');
					},
					'onUploadSuccess' : function(file, data, response) {
						var d = eval("("+data+")");
						if (1 == d.status) {
							el.viewDoctorPaper('f', d.url);
						}
					},
					'onUploadError' : function(file, errorCode, errorMsg, errorString) {
						el.showDoctorError(errorString);
					}
				});
				$('#btn_paper_b').uploadify({
					// 'debug' : true,
					'fileObjName' : 'btn_paper_b',
					'buttonText' : '',
					'buttonClass' : 'xuanze xuanze1',
					'width' : 160,
					'height' : 38,
					'fileSizeLimit' : '20MB',
					'fileTypeDesc' : 'Image Files',
					'fileTypeExts' : '*.gif; *.jpg; *.png; *.jpeg',
					'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
					'formData' : {'loc' : 'b', 'uid' : uid},
					'swf' : base_url + 'data/flash/uploadify.swf',
					'uploader' : base_url + 'upload/uploadDoctor5',
					'onInit' : function() {
						$(".uploadify-button").removeClass('uploadify-button');
					},
					'onUploadSuccess' : function(file, data, response) {
						var d = eval("("+data+")");
						if (1 == d.status) {
							el.viewDoctorPaper('b', d.url);
						}
					},
					'onUploadError' : function(file, errorCode, errorMsg, errorString) {
						el.showDoctorError(errorString);
					}
				});
			}
		}
	},
	buildCourt : function(txt) {
		var n, t, s, f=0;
		n = $("#court_layer>p").length;
		if (n >= 4) {
			layer.alert('最多只能选择4家裁判机构', 0, '注意');
			return false;
		}
		$("#court_layer>p").each(function(i) {
			t = $(this).html();
			t = t.split('<span');
			t = t[0];
			t = t.split('、');
			t = t[1];
			if (txt == t) {
				f = 1;
			}
		})
		if (f) {
			layer.alert('当前机构已经存在', 0, '注意');
			return false;
		}
		s = '<p class="fayuan">'+(n+1)+'、'+txt+'<span class="del" onclick="ph$.cter.rmCourt(this)">删除</span></p>';
		$("#court_layer").append(s);
		ph$.cter.buildCourtInput();
	},
	rmCourt : function(o) {
		$(o).parent().remove();
		ph$.cter.buildCourtInput();
	},
	buildCourtInput : function() {
		var a=[], t;
		$("#court_layer>p").each(function(i) {
			t = $(this).html();
			t = t.split('<span');
			t = t[0];
			t = t.split('、');
			t = t[1];
			a[i] = t;
		})
		a = a.join(',');
		$("#org").val(a);
	},
	showDoctorError : function(errorType) {
		var m;
		if ('FILE_SIZE_LIMIT_EXCEEDED' === errorType) {
			m = ("只能上传小于20M的图片");
		} else if ('FORBIDDEN_FILE_TYPE' === errorType) {
			m = ("图片格式限定在JPG, JPEG, GIF, PNG或BMP");
		} else {
			m = ('The error was: ' + errorType);
		}
		layer.alert(m, 0, '注意');
	},
	viewDoctorPaper : function(o, url) {
		var t, u, time;
		time = 400;
		u = base_url + url + '?' + Math.floor(Math.random()*9999+1000);
		if ('b'===o || 'back'===o) {
			// 背面
			t = $("#layer_back");
		} else if ('f'===o || 'front'===o) {
			// 正面
			t = $("#layer_front");
		}

		if (t.is(":hidden")) {
			t.find("img").attr("src", u);
			t.slideDown(time);
		} else {
			t.fadeOut((time/2), function() {
				t.find("img").attr("src", u);
				t.fadeIn((time/2));
			})
		}
		return 0;
	},
	setTextCount : function() {
		var c = 0;
		c = 2000 - $("#intro").val().length;
		$("#intro_c").html("剩余"+c+"个字");
	},
	init : function() {
		this.bindEvt();
		if ($("#intro").length > 0)
			this.setTextCount();
	}
}
jQuery(document).ready(function(){
	ph$.cter.init();
});