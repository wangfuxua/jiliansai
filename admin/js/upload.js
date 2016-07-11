jQuery(document).ready(function(){
	if (!!check.html5) {
		$("#btn_header1").uploadifive({
			'fileObjName' : 'btn_header',
			'buttonText' : '',
			'buttonClass' : 'yzform14',
			'width' : 107,
			'height' : 36,
			'fileSizeLimit' : '2MB',
			'fileType' : 'image',
			'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
			// 'removeCompleted' : true,
			'formData' : {
			},
			'uploadScript' : base_url + 'upload/throughupload',
			'onInit' : function() {
				$(".uploadifive-button").removeClass('uploadifive-button');
			},
			'onUploadComplete' : function(file, data) {
                           
				var d = eval("("+data+")");
              
			
                                var u = base_url + d.path + "?" + Math.floor(Math.random()*9999+1000);
                                $("#header_photo").attr("src", u);
                                $("#shopimage").val(d.path);
                                // viewDoctorPaper('f', d.url);
				
			},
			'onError' : function(errorType) {
				showDoctorError(errorType);
			}
		})
	} else {
		$("#btn_header1").uploadify({
			// 'debug' : true,
			'fileObjName' : 'btn_header',
			'buttonText' : '',
			'buttonClass' : 'yzform14',
			'width' : 107,
			'height' : 36,
			'fileSizeLimit' : '2MB',
			'fileTypeDesc' : 'Image Files',
			'fileTypeExts' : ' *.jpg; *.png; *.jpeg',
			'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
			'formData' : {'uid' : uid},
			'swf' : base_url + 'data/flash/uploadify.swf?var='+(new Date()).getTime(),
			'uploader' : base_url + 'upload/throughupload',
			'onInit' : function() {
				$(".uploadify-button").removeClass('uploadify-button');
			},
			'onUploadSuccess' : function(file, data, response) {
				var d = eval("("+data+")");
				if (1 == d.status) {
             
					var u = base_url + d.path + "?" + Math.floor(Math.random()*9999+1000);
					$("#header_photo").attr("src", u);
				}
			},
			'onUploadError' : function(file, errorCode, errorMsg, errorString) {
				showDoctorError(errorString);
			}
		});
	}
});



jQuery(document).ready(function(){
	if (!!check.html5) {
		$("#btn_header2").uploadifive({
			'fileObjName' : 'btn_header',
			'buttonText' : '',
			'buttonClass' : 'yzform14',
			'width' : 107,
			'height' : 36,
			'fileSizeLimit' : '2MB',
			'fileType' : 'image',
			'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
			// 'removeCompleted' : true,
			'formData' : {
			},
			'uploadScript' : base_url + 'upload/throughupload',
			'onInit' : function() {
				$(".uploadifive-button").removeClass('uploadifive-button');
			},
			'onUploadComplete' : function(file, data) {
                           
				var d = eval("("+data+")");
              
			
                                var u = base_url + d.path + "?" + Math.floor(Math.random()*9999+1000);
                                $("#header_photo").attr("src", u);
                                $("#oneimg").val(d.path);
                                // viewDoctorPaper('f', d.url);
				
			},
			'onError' : function(errorType) {
				showDoctorError(errorType);
			}
		})
	} else {
		$("#btn_header2").uploadify({
			// 'debug' : true,
			'fileObjName' : 'btn_header',
			'buttonText' : '',
			'buttonClass' : 'yzform14',
			'width' : 107,
			'height' : 36,
			'fileSizeLimit' : '2MB',
			'fileTypeDesc' : 'Image Files',
			'fileTypeExts' : ' *.jpg; *.png; *.jpeg',
			'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
			'formData' : {'uid' : uid},
			'swf' : base_url + 'data/flash/uploadify.swf?var='+(new Date()).getTime(),
			'uploader' : base_url + 'upload/throughupload',
			'onInit' : function() {
				$(".uploadify-button").removeClass('uploadify-button');
			},
			'onUploadSuccess' : function(file, data, response) {
				var d = eval("("+data+")");
				if (1 == d.status) {
             
					var u = base_url + d.path + "?" + Math.floor(Math.random()*9999+1000);
					$("#header_photo").attr("src", u);
				}
			},
			'onUploadError' : function(file, errorCode, errorMsg, errorString) {
				showDoctorError(errorString);
			}
		});
	}
});
jQuery(document).ready(function(){
	if (!!check.html5) {
		$("#btn_header3").uploadifive({
			'fileObjName' : 'btn_header',
			'buttonText' : '',
			'buttonClass' : 'yzform14',
			'width' : 107,
			'height' : 36,
			'fileSizeLimit' : '2MB',
			'fileType' : 'image',
			'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
			// 'removeCompleted' : true,
			'formData' : {
			},
			'uploadScript' : base_url + 'upload/throughupload',
			'onInit' : function() {
				$(".uploadifive-button").removeClass('uploadifive-button');
			},
			'onUploadComplete' : function(file, data) {
                           
				var d = eval("("+data+")");
              
			
                                var u = base_url + d.path + "?" + Math.floor(Math.random()*9999+1000);
                                $("#header_photo1").attr("src", u);
                                $("#twoimg").val(d.path);
                                // viewDoctorPaper('f', d.url);
				
			},
			'onError' : function(errorType) {
				showDoctorError(errorType);
			}
		})
	} else {
		$("#btn_header3").uploadify({
			// 'debug' : true,
			'fileObjName' : 'btn_header',
			'buttonText' : '',
			'buttonClass' : 'yzform14',
			'width' : 107,
			'height' : 36,
			'fileSizeLimit' : '2MB',
			'fileTypeDesc' : 'Image Files',
			'fileTypeExts' : ' *.jpg; *.png; *.jpeg',
			'itemTemplate' : '<div class="uploadifive-queue-item" style="display: none;"></div>',
			'formData' : {'uid' : uid},
			'swf' : base_url + 'data/flash/uploadify.swf?var='+(new Date()).getTime(),
			'uploader' : base_url + 'upload/throughupload',
			'onInit' : function() {
				$(".uploadify-button").removeClass('uploadify-button');
			},
			'onUploadSuccess' : function(file, data, response) {
				var d = eval("("+data+")");
				if (1 == d.status) {
             
					var u = base_url + d.path + "?" + Math.floor(Math.random()*9999+1000);
					$("#header_photo1").attr("src", u);
				}
			},
			'onUploadError' : function(file, errorCode, errorMsg, errorString) {
				showDoctorError(errorString);
			}
		});
	}
});

function showDoctorError(errorType) {
	var m;
	if ('FILE_SIZE_LIMIT_EXCEEDED' === errorType) {
		m = ("只能上传小于20M的图片");
	} else if ('FORBIDDEN_FILE_TYPE' === errorType) {
		m = ("图片格式限定在JPG, JPEG, GIF, PNG或BMP");
	} else {
		m = ('The error was: ' + errorType);
	}
	alert(m);
}

