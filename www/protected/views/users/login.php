
    <div class="content">
        <div class="login_box">
            <div class="login_l fl">
                <img class="" src="<?php echo base_url()?>/img/1.png" width="600">
            </div>
            <div class="login_r fr c_f tac">
                <h2 class="login_tit">季联赛账号登录</h2>
                <form id="reg_form" class="login_r fr c_f" action="<?php echo base_url('users/gologin');?>" method="post">
                <input class="login_ipt1 mt20" type="tel" name="phone" placeholder="手机号码"><br>
                <input class="login_ipt1 mt20" type="password" name="password" placeholder="密码"><br>
                <input class="login_sub1 mt20"  type="submit" value="立即登录"><br>
                    </form>
                <div class="mt20">
                    <span class="login_line1"></span>
                    <span class="vam">其他登录方式</span>
                    <span class="login_line1"></span>
                </div>
                <div class="mt20">
<!--                    <a href="javascript:;" class="login_icon1 mr10">QQ</a>-->
<!--                    <a href="javascript:;" class="login_icon1">微信</a>-->
                </div>
                <div class="mt20">
                    <a class="mr20 login_a1" href="<?php echo base_url('users/regview');?>">注册账号</a>|<a class="ml20 login_a1" href="<?php echo base_url('users/getpass');?>">忘记密码？</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
