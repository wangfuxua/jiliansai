
    <div style="height:115px;"></div>



    <div class="content">
        <div class="sign_stepbox">
            <div class="sign_step ">第一步</div>
            <div class="sign_step sign_now">第二步</div>
            <div class="sign_step">第三步</div>
        </div>
        <div class="sign_box1">
            <div class="sign_tit">填写基本信息</div>
            <form class="" action="<?php echo base_url('item/Cgame');?>" method="post">
                <input type="hidden" value="<?php echo $gameid?>" name="gameid">
                <div class="sign_row">
                    <span class="sign_tit2">联系人</span>
                    <input class="sign_ipt1" name="name" type="text">
                </div>
                <div class="sign_row mt20">
                    <span class="sign_tit2">手机号</span>
                    <input class="sign_ipt1" name="phone" type="text">
                </div>
                <div class="sign_row mt20">
                    <span class="sign_tit2">手机号</span>
                    <div class="sign_rightbox">
                        <input class="sign_ipt2" name="vercode" type="text">
                        <span class="sign_btn2">获取验证码</span>
                    </div>
                </div>
                
                <div class="sign_ml170 mt20">
                    <a class="sign_btn3 mr20" href="javascript:;">上一步</a>
                    <input class="sign_btn1" type="submit" value="下一步">
                </div>
            </form>
        </div>
    </div>



