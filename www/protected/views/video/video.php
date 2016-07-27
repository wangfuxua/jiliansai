
    <link rel="stylesheet" href="<?php echo base_url()?>/css/idangerous.swiper.css">
    <!-- <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url()?>/js/jq1.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery.focus.js"></script>
    <SCRIPT type=text/javascript>

</SCRIPT>
<style>
* {
    PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px
}

.focusWrap {
    MARGIN: 50px auto; WIDTH: 1200px; BACKGROUND: url(../img/focusbg.gif) left top; HEIGHT: 500px
}
.focusCon {
    WIDTH: 1200px; FLOAT: left;
}
.focusR {
    WIDTH: 236px; DISPLAY: inline; FLOAT: right; HEIGHT: 100%; MARGIN-RIGHT: 10px
}
.focusL {
    POSITION: relative; MARGIN-TOP: 12px; WIDTH: 140px; BACKGROUND: url(../img/line.png) repeat-y left top; FLOAT: left; HEIGHT: 500px
}
.ulFocus {
    Z-INDEX: 2; POSITION: relative; WIDTH: 100%; HEIGHT: 100%; TOP: 0px; LEFT: 0px
}
.ulFocus LI {
    LINE-HEIGHT: 16px; MARGIN: 5px 10px 2px; WIDTH: 120px; DISPLAY: inline; FLOAT: left; HEIGHT: 38px; COLOR: #fff; FONT-SIZE: 12px;cursor:pointer;
}
.ulFocus LI SPAN {
    Z-INDEX: 2; POSITION: relative; PADDING-BOTTOM: 6px; WIDTH: 100%; DISPLAY: block; HEIGHT: 32px; CURSOR: pointer
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
    Z-INDEX: 1; POSITION: absolute; WIDTH: 166px; BACKGROUND: url(../img/titlebg.png) no-repeat left top; HEIGHT: 47px; TOP: 0px; LEFT: 0px;
}

</style>
    <script type="text/javascript">
        var theme_list_open = false;
        $(document).ready(function () {
            function fixHeight() {
                var headerHeight = $("#switcher").height();
                $("#iframe").attr("height", $(window).height()-54+ "px");
            }
            $(window).resize(function () {
                fixHeight();
            }).resize();

        });
    </script>
    <div class="content">

<div class="focusWrap">
    <div class="focusCon">
        <div class="focusL">
            <ul id="j_FocusNav" class="ulFocus">
                <?php foreach ($list as $k=>$v):?>
            <li rel="<?php echo $k?>" onclick="video('<?php echo $v['url'];?>')"><?php echo $v['name']?></li>
                <?php endforeach;?>
             </ul>
            <div id="j_FocusBack" class="back"></div>
        </div>
        <div class="focusM">
            <ul id="j_FocusCon" class="ulFCon" >
            <li>
                <embed src="<?php echo $list[0]['url']?>" allowFullScreen="true" id='jls_video' quality="high" width="100%" height="400" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash">
            </embed>
            </li>
            </ul>
        </div>
    </div>
</div>

    </div>


<script type="text/javascript">
    function video(u){
    $('#jls_video').attr('src',u);
    }

function getReg() {
    if (true) {
        $(".reg_d1").hide();
        $(".reg_d2").show();
    };
}
</script>
