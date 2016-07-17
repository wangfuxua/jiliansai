if (!ph$)
	var ph$ = {};
;ph$.prov = {
	bindEvt : function() {
		var o={};
		o.prov = $("#prov");
		if (o.prov.length > 0) {
			o.prov[0].onchange = function() {
				ph$.prov.changeselect1(this.value);
			}
		}
		o.city = $("#city");
		if (o.city.length > 0) {
			o.city[0].onchange = function() {
				ph$.prov.changeselect2(this.value);
			}
		}
	},
	changeselect0 : function() {
		var obj, index;
		obj = $("#prov")[0];
		obj.length = 0;
		obj.options[0] = new Option('=请选择=', '');
		for (i=0; prov0.length > i ; i++) {
			obj.options[obj.length] = new Option(prov0[i][1], prov0[i][2]);
			if (obj.getAttribute('val') == prov0[i][1]) {
				index = obj.length-1;
				ph$.prov.cfg.prov = prov0[i][2];
			}
		}
		if (index != null)
			obj.options[index].selected = true;
	},
	changeselect1 : function(locationid) {
		var obj, index;
		obj = $("#city")[0];
		if (locationid == null)
			locationid = ph$.prov.cfg.prov;
		if (locationid == 0)
			return false;
		obj.length = 0;
		obj.options[0] = new Option('=请选择=', '');
		for (i=0; prov1.length > i ; i++) {
			if (prov1[i][0] == locationid) {
				obj.options[obj.length] = new Option(prov1[i][1], prov1[i][2]);
				if (obj.getAttribute('val') == prov1[i][1]) {
					index = obj.length-1;
					ph$.prov.cfg.city = prov1[i][2];
				}
			}	
		}
		if (index != null)
			obj.options[index].selected = true;
	},
	changeselect2 : function(locationid) {
		var obj, index;
		obj = $("#zone")[0];
		if (locationid == null)
			locationid = ph$.prov.cfg.city;
		if (locationid == 0)
			return false;
		obj.length = 0;
		var c=0;
		obj.options[0] = new Option('=请选择=', '');
		for (i=0; prov2.length>i; i++) {
			if (prov2[i][0] == locationid) {
				
				obj.options[obj.length] = new Option(prov2[i][1], prov2[i][2]);
				if (obj.getAttribute('val') == prov2[i][1])
					index = obj.length-1;
			}
		}
		if (index != null)
			obj.options[index].selected = true;
	},
	cfg : {
		'flag' : '0',
		'tar' : 'prov',
		'prov' : 0,
		'city' : 0
	},
	init : function() {
		ph$.prov.changeselect0();
		ph$.prov.changeselect1();
		ph$.prov.changeselect2();
		ph$.prov.bindEvt();
	}
}
jQuery(document).ready(function(){
 	ph$.prov.init();
});