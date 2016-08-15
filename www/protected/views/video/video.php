<div class="content">
    <div class="video_listbox">
        <div class="video_l">
            <div class="video_arr_u"></div>
            <div class="video_nav">
                <ul class="video_ul">
                <?php foreach ($list as $k=>$v):?>
                    <li id="vi<?php echo $v['id']?>" onclick="video('<?php echo $v['url'];?>',<?php echo  $v['id']?>)"><?php echo $v['name']?><?php echo $v['name']?></li>
                <?php endforeach;?>
                    <li>22222</li>
                    <li>3333</li>
                    <li>4444</li>
                    <li>55555</li>
                    <li>66666</li>
                    <li>77777</li>
                    <li>8888</li>
                    <li>99999</li>
                    <li>10</li>
                    <li>11</li>
                </ul>
            </div>
            <div class="video_arr_d"></div>
        </div>
        <div class="video_r">
            <embed src="<?php echo $list[0]['url']?>" allowFullScreen="true" id='jls_video' quality="high" width="100%" height="100%" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash">
        </div>
    </div>
    <div class="clear"></div>
    <div class="video_teambox mt50">
    	<h2>战队对战表</h2>
    	<div>
    		<p>6月30日18:00</p>
    		<p>级联赛2016 S2夏季赛</p>
    		<table>
    			<tr>
    				<td><img src=""></td>
    				<td>VS</td>
    				<td><img src=""></td>
    			</tr>
    			<tr>
    				<td>sdk战队</td>
    				<td></td>
    				<td>DKY战队</td>
    			</tr>
    			<tr>
    				<td>0</td>
    				<td><a href="javascript:;">战报</a></td>
    				<td>0</td>
    			</tr>
    		</table>
    		<p>街头篮球 小组赛</p>
    	</div>
    </div>
</div>
<script type="text/javascript">
var mt = 0;
var num = Math.ceil($(".video_ul>li").length / 5 -1);
if (num >= 1) {
    $(".video_arr_u").on("click",function(){
        if (mt < 0) {
            mt += 500;
            $(".video_ul").animate({"margin-top": mt +"px"});
        }
    })
    $(".video_arr_d").on("click",function(){
        if (mt > -500*num) {
            mt -= 500;
            $(".video_ul").animate({"margin-top": mt +"px"});
        }
    })
}

    // function video(u,id){
    // $('#jls_video').attr('src',u);
    //     $('#j_FocusNav li').attr('class','');
    // $('#vi'+id).attr('class','back');
    // }
    function video(u,id){
        var str = '<embed src="'+u+'" allowFullScreen="true" id="jls_video" quality="high" width="100%" height="100%" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash">'
        $(".video_r").html(str);
    }
</script>