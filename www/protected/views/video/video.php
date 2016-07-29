

    <!-- <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script> -->
<style>
* {
    PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px
}

.focusWrap {
    MARGIN: 50px auto; WIDTH: 1200px;  left top; HEIGHT: 500px;background-color: lightslategray;
}
.focusCon {
    WIDTH: 1200px; FLOAT: left;
}
.focusR {
    WIDTH: 236px; DISPLAY: inline; FLOAT: right; HEIGHT: 100%; MARGIN-RIGHT: 10px
}
.focusL {
    POSITION: relative; MARGIN-TOP: 12px; WIDTH: 140px; /*BACKGROUND: url(../img/line.png) repeat-y left top;*/ FLOAT: left; HEIGHT: 500px
}
.ulFocus {
    Z-INDEX: 2; POSITION: relative; WIDTH: 100%; HEIGHT: 100%; TOP: 0px; LEFT: 0px;overflow: hidden;
}
.ulFocus LI {
    LINE-HEIGHT: 16px; MARGIN: 5px 10px 2px; WIDTH: 120px; DISPLAY: inline; FLOAT: left; HEIGHT: 38px; COLOR: #fff; FONT-SIZE: 12px;cursor:pointer;border-bottom: 1px solid #fff;
}
.ulFocus LI SPAN {
    Z-INDEX: 2; POSITION: relative; PADDING-BOTTOM: 6px; WIDTH: 100%; DISPLAY: block; HEIGHT: 32px; CURSOR: pointer;
}
.focusM {
    MARGIN-TOP: 6px; WIDTH: 1060px; FLOAT: left; HEIGHT: 500px; OVERFLOW: hidden
}
.ulFCon {
    WIDTH: 100%; FLOAT: left
}
.ulFCon LI {
    WIDTH: 100%; FLOAT: left; HEIGHT: 500px; OVERFLOW: hidden
}
.ulFCon LI A {
    WIDTH: 100%; DISPLAY: block; HEIGHT: 100%; TEXT-DECORATION: none
}
.ulFCon LI IMG {
    BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; WIDTH: 1060px; height: 500px;  BORDER-TOP: medium none; BORDER-RIGHT: medium none
}
.back {
    Z-INDEX: 1; POSITION: relative; WIDTH: 166px;no-repeat left top; HEIGHT: 47px; TOP: 0px; LEFT: 0px;background-color: #ba281e;
}

</style>

    <script type="text/javascript" src="<?php echo base_url()?>/js/jq1.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery.focus.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#j_Focus").Focus();
        });
    </script>
    <div class="content">

<div class="focusWrap">
    <div id="j_Focus" class="focusCon">
        <div class="focusL">
            <div style="background-color: white"><span>上</span></div>
            <ul id="j_FocusNav" class="ulFocus">

                <?php foreach ($list as $k=>$v):?>
            <li rel="<?php echo $k?>" id="vi<?php echo $v['id']?>" onclick="video('<?php echo $v['url'];?>',<?php echo  $v['id']?>)"><?php echo $v['name']?></li>

                <?php endforeach;?>
                <li rel="4">aaaaa</li>
                <li rel="5">aaaaa</li>
                <li rel="6">aaaaa</li>
                <li rel="7">aaaaa</li>
                <li rel="8">aaaaa</li>
                <li rel="9">aaaaa</li>
                <li rel="10">aaaaa</li>
                <li rel="11">aaaaa</li>
                <li rel="12">aaaaa</li>
            </ul>
            <!-- <div id="j_FocusBack" class="back"></div> -->
            <div style="background-color: white" onclick="downpage()"><span>下</span></div>
        </div>
        <div class="focusM">
            <ul id="j_FocusCon" class="ulFCon" >
            <li>
                <embed src="<?php echo $list[0]['url']?>" allowFullScreen="true" id='jls_video' quality="high" width="100%" height="100%" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash">
            </embed>
            </li>
            </ul>
        </div>
    </div>
</div>

    </div>


<script type="text/javascript">
    function video(u,id){
    $('#jls_video').attr('src',u);
        $('#j_FocusNav li').attr('class','');
    $('#vi'+id).attr('class','back');
    }




</script>
