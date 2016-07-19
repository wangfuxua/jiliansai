
    <div class="content">
        <div class="login_box">
            <div class="login_l fl">
                <img class="" src="<?php echo base_url()?>/img/1.png" width="600">
            </div>
            <form id="reg_form" class="login_r fr c_f" action="<?php echo base_url('users/reg2');?>" method="post">
                <h2 class="login_tit">注册季联赛账号</h2>
                <div class="reg_d1">
                    <input class="login_ipt1 mt20" type="tel" name="phone" placeholder="请输入手机号码"><br>
                    <div class="login_ipt2box mt20">
                        <input class="login_ipt2 fl" type="keywords" name="authcode" placeholder="请输入验证码">

                        <img class="fr login_yzimg" src="<?php echo base_url("users/Authcode") ?>" width="130" height="38">
                    </div><br>
                    <input  class="login_sub1 mt20 "  type="submit" value="下一步"><br>
                    <p class="mt20">点击“立即注册”，即表示您以同意并愿意遵守</p>
                    <a class="mt10 dpb" href="javascript:;" target="_Blank">季联赛用户协议</a>
                    <p class="">已拥有季联赛帐号，点击这里 <a class="fsz24" href="javascript:;">登录</a></p>
                </div>

            </form>
            <div class="clear"></div>
        </div>
    </div>

<script type="text/javascript">

</script>
</body>
</html>