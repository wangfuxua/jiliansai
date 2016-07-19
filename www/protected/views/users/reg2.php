
    <div class="content">
        <div class="login_box">
            <div class="login_l fl">
                <img class="" src="<?php echo base_url()?>/img/1.png" width="600">
            </div>
            <form id="reg_form" class="login_r fr c_f" action="<?php echo base_url('users/reg3');?>" method="post">
                <h2 class="login_tit">注册季联赛帐号</h2>
                <div class="reg_d1">
                    <input type="hidden" name="phone" value="<?php echo $phone?>">
                    <input class="login_ipt1 mt20" type="tel" name="phonecode" placeholder="请输入收到的验证码"><br>
                    <input class="login_sub1 mt20" type="submit" value="下一步"><br>
                </div>
                <a class="login_a2 mt20" href="<?php echo base_url('users/regview');?>" >返回</a>
            </form>
            <div class="clear"></div>
        </div>
    </div>


<script type="text/javascript">

</script>
