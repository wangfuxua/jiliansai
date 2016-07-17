/*************
************活动删除********
**************/
function case_delevent(eid,into){

	if(confirm("您确定删除活动吗？")){
			var url, root;
			root = !!base_url ? base_url : "/";
			url = root + "Case/Deleteinto";
			jQuery.getJSON(url,{'id' : eid}, function(data) {
				if(data.status==eid) {
					if (into == '1')
					{
						$('#case_into_'+eid+'').hide('slow');
					}else{
						window.location.href=''+root+'Case/';
					}
					
				 } else {
					alert('error');
				 }
			});
		}
}

//收藏添加
function case_into(eid,fva){
	var url, root;
	root = !!base_url ? base_url : "/";
	url = root + "Case/CaseIntoSelect/";
	var frieObj = {
		'eid' : eid,
		'fva' : fva
	};
	jQuery.getJSON(url,frieObj, function(data) {
				
		$('#case_fav_'+eid+'').html(data.status);

	});

}

//搜索案由
function lookup(inputString) {
  var url = base_url + "Case/Case_rpc";
  if(inputString.length == 0) {
      // Hide the suggestion box.
      $('#suggestions').hide();
    } else {

      //inputString=encodeURI(inputString);//IE下汉字编码问题
      $.post(url, {queryString: ""+inputString+""}, function(data){
        if(data.length >0) {
          $('#suggestions').show();
          $('#autoSuggestionsList').html(data);
        }
      });
    }
  } 