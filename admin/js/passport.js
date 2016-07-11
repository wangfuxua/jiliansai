if (!ph$)
	var ph$ = {};
;ph$.reg = {
	bindEvt : function() {
		var o={}, reg, el;
		el = ph$.reg;
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
					'buttonText' : '上传证件正面',
					'buttonClass' : 'iden_but left f_16px c_fff',
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
					'buttonText' : '上传证件背面',
					'buttonClass' : 'iden_but2 left f_16px c_fff',
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
					'buttonText' : '上传证件正面',
					'buttonClass' : 'iden_but f_16px c_fff',
					'width' : 110,
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
					'buttonText' : '上传证件背面',
					'buttonClass' : 'iden_but2 f_16px c_fff',
					'width' : 110,
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
		o.btn_checkdoctor = $("#btn_checkdoctor");
		if (o.btn_checkdoctor.length > 0) {
			o.btn_checkdoctor.bind("click", function() {
				var f, b;
				f = $("#layer_front img");
				b = $("#layer_back img");
				if (0 == f.length) {
					lq$.alert("请上传正面证书");
					return 0;
				}
				if (0 == b.length) {
					lq$.alert("请上传背面证书");
					return 0;
				}
				if (!f.attr("src")) {
					lq$.alert("请上传正面证书");
					return 0;
				}
				if (!b.attr("src")) {
					lq$.alert("请上传背面证书");
					return 0;
				}
				window.location.href = base_url + 'bbs';
			})
		}
		o.btn_authcode_login = $("#authcode_btn_login");
		if (o.btn_authcode_login.length > 0) {
			o.btn_authcode_login.bind("click", function() {
				var u;
				u = base_url + "passport/authcode/" + Math.floor(Math.random()*9999+1000);
				$("#authcode_img").attr("src", u);
			})
		}
		// 选择职业
		o.changeclass = $(".changeclass");
		if (o.changeclass.length > 0) {
			$(".changeclass>a").bind("click", function() {
				var v = $(this).attr('value');
				var u = '';
				if (1 == v) {
					u = "lawbase";
				} else if (101 == v) {
					u = "officebase";
				} else if (201 == v) {
					u = "personbase";
				}
				u = base_url + "passport/"+u;
				window.location.href = u;
			})
		}
		// 获取短信验证码
		o.reg_getverify = $("#btn_getverify");
		if (o.reg_getverify.length > 0) {
			o.reg_getverify.bind("click", function() {
				var u, obj, p;
				p = $("#phone").val();
				if (!/^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$/.test(p)) {
					layer.alert('请输入正确的手机号。', 0, '注意');
					return false;
				}
				u = base_url + "passport/getmsgverify/" + Math.floor(Math.random()*9999+1000);
				obj = {'phone': p};
				$.getJSON(u, obj, function(d) {
					if (!d.status) {
						layer.alert(d.msg, 0, '注意');
						return false;
					}
					$("#verify").val(d.msg);
				})
			})
		}
		o.userinfo_form = $("#userinfo_form");
		if (o.userinfo_form.length > 0) {
			var user = o.userinfo_form.Validform({
				btnSubmit : "#btn_userinfo",
				tiptype : 4
			});
		}
		// 律师其他信息
		o.user_other = $("#userother_form");
		if (o.user_other.length > 0) {
			$(".btn_del_org").bind("click", function() {
				ph$.reg.rmCourt(this);
			})
			var user = o.user_other.Validform({
				btnSubmit : "#btn_others",
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
					ph$.reg.buildCourt($currItem.text());
					// return $currItem.text();
				},
				//不同于change事件在失去焦点触发，inchange依赖本插件，只要内容有变化，就会触发，并传入input对象
				textchange: function($input){},
				//当选择一个下拉项目触发，并传入这个下拉项目jquery对象
				onselect: function($currItem){}
			};
			$("#auto_suggest").suggest(config);
		}
		// 用户信息保存
		o.company_form = $("#company_form");
		if (o.company_form.length > 0) {
			var user = o.company_form.Validform({
				btnSubmit : "#btn_company",
				tiptype : 4
			});
		}
		// 用户信息保存
		o.user_form = $("#user_form");
		if (o.user_form.length > 0) {
			var user = o.user_form.Validform({
				btnSubmit : "#btn_user",
				tiptype : 4
			});
		}
		// 注册表单事件
		o.reg_form = $("#register_form");
		if (o.reg_form.length > 0) {
			var reg = o.reg_form.Validform({
				btnSubmit : "#btn_register",
				datatype : {
					"m" : /^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$/
				},
				tiptype : 4,
				callback : function(data) {
					// alert("ok");
				}
			});
			reg.addRule([
			{
				ele : "#verify",
				ajaxurl : base_url + "passport/checkmsgverify"
			}
			]);
		}
		// 登录表单
		o.login_form = $("#login_form");
		if (o.login_form.length > 0) {
			reg = o.login_form.Validform({
				btnSubmit : "#btn_login",
				// ajaxPost : true,
				datatype : {
					"m" : /^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$/
				},
				tiptype : 4,
				callback : function(data) {
					/*
					var t = $("#login_wrong");
					// t.removeClass("Validform_loading");
					// t.addClass("Validform_right");
					// t.html(data.msg);

					if (1 == data.status) {
						window.location.href = base_url + "bbs";
						return 0;
					}
					if (2 == data.status) {
						window.location.href = base_url + "group";
						return 0;
					}
					if (3 == data.status) {
						window.location.href = data.url;
						return 0;
					}
					if (!data.status) {
						t.removeClass("Validform_right");
						t.addClass("Validform_wrong");
					}
					*/
				}
			});
			reg.addRule([
			{
				ele : "#authcode",
				ajaxurl : base_url + "passport/checkAuthcodeValidform"
			}
			]);
		}
		o.reg_doctor = $("#reg_doctor");
		if (o.reg_doctor.length > 0) {
			reg = o.reg_doctor.Validform({
				btnSubmit : "#reg_doctor_btn",
				datatype : {
					"m" : /^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$/
				},
				tiptype : function(msg, o, cssctl) {
					// var objtip = $(".hint_layer");
					// var objtip = o.obj.siblings(".Validform_checktip");
					var objtip = o.obj.parent().next().find(".Validform_checktip");
					cssctl(objtip, o.type);
					objtip.text(msg);
				}
			});
			reg.addRule([
			{
				ele : "#authcode1",
				ajaxurl : base_url + "passport/checkAuthcodeValidform"
			}, {
				ele : "#username1",
				ajaxurl : base_url + "passport/checkUsernameValidform"
			}, {
				ele : "#idcard",
				ajaxurl : base_url + "passport/checkIdcardValidform"
			}, {
				ele : "#email1",
				ajaxurl : base_url + "passport/checkEmailValidform"
			}, {
				ele : "#phone1",
				ajaxurl : base_url + "passport/checkPhoneValidform"
			}
			]);
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
		o.reg_ediart = $("#reg_ediart");
		if (o.reg_ediart.length > 0) {
			reg = o.reg_ediart.Validform({
				btnSubmit : "#reg_ediart_btn",
				datatype : {
					"m" : /^13[0-9]{9}$|14[0-9]{9}$|15[0-9]{9}$|18[0-9]{9}$/
				},
				tiptype : function(msg, o, cssctl) {
					var objtip = o.obj.parent().next().find(".Validform_checktip");
					cssctl(objtip, o.type);
					objtip.text(msg);
				},
				beforeSubmit : function(d) {
					lq$.alert('录入成功');
				}
			});
			reg.addRule([
			{
				ele : "#authcode1",
				ajaxurl : base_url + "passport/checkAuthcodeValidform"
			}, {
				ele : "#username1",
				ajaxurl : base_url + "passport/checkUsernameValidform"
			}, {
				ele : "#idcard",
				ajaxurl : base_url + "passport/checkIdcardValidform"
			}, {
				ele : "#email1",
				ajaxurl : base_url + "passport/checkEmailValidform"
			}, {
				ele : "#phone1",
				ajaxurl : base_url + "passport/checkPhoneValidform"
			}
			]);
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
		s = '<p class="xuan">'+(n+1)+'、'+txt+'<span class="btn_del_org" onclick="ph$.reg.rmCourt(this)">删除</span></p>';
		$("#court_layer").append(s);
		ph$.reg.buildCourtInput();
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
	rmCourt : function(o) {
		$(o).parent().remove();
		ph$.reg.buildCourtInput();
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
	init : function() {
		this.bindEvt();
	}
}
jQuery(document).ready(function(){
	ph$.reg.init();
});