
    <div class="content">
        <div class="login_box">
            <div class="login_l fl">
                <img class="" src="<?php echo base_url()?>/img/1.png" width="600">
            </div>
            <form id="reg_form" class="login_r fr c_f" action="<?php echo base_url('users/reg4');?>" method="post">
                <h2 class="login_tit">注册季联赛帐号</h2>
                <div class="reg_d1">
                    <input type="hidden" name="phone" value="<?php echo $phone?>">
                    <input class="login_ipt1 mt20" type="password" name="password" placeholder="请设置您的密码"><br>
                    <input class="login_ipt1 mt20" type="password" name="password1" placeholder="请重新输入您的密码"><br>
                    <input class="login_sub1 mt20" type="submit" value="下一步"><br>
                </div>
                <a class="login_a2 mt20" href="<?php echo base_url('users/regview');?>" >返回</a>
            </form>
            <div class="clear"></div>
        </div>
    </div>


<script type="text/javascript">

</script>
