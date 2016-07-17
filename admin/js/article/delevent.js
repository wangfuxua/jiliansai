/*************
************活动删除********
**************/
function article_delevent(eid,into){

	if(confirm("您确定删除活动吗？")){
			var url, root;
			root = !!base_url ? base_url : "/";
			url = root + "article/article_cat_deleteinto";
			jQuery.getJSON(url,{'id' : eid}, function(data) {
				if(data.status==eid) {
					if (into == '1')
					{
						$('#case_into_'+eid+'').hide('slow');
					}
					
				 } else {
					alert('error');
				 }
			});
		}
}

