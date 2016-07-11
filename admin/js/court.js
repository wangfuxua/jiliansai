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
	},
	init : function() {
		this.bindEvt();
	}
}
jQuery(document).ready(function(){
	ph$.user.init();
});