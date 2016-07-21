
    <div class="content">
        <div class="login_box">
            <div class="login_l fl">
                <img class="" src="<?php echo base_url()?>/img/1.png" width="600">
            </div>
            <form id="reg_form" class="login_r fr c_f" action="<?php echo base_url('users/GoGetpass')?>" method="post">
                <h2 class="login_tit">季联赛找回密码</h2>
                <input class="login_ipt1 mt20" type="tel" id='phone' name="phone" placeholder="请输入手机号码"><br>
                <div class="login_ipt2box mt20">
                    <input class="login_ipt2 fl" type="text" name="phonecode" placeholder="请输入验证码">
                    <div id="divphone">
                    <a class="fr btnsedmsg"  onclick="send()" href="javascript:;">获取验证码</a>
                        </div>
                </div><br>
                <input class="login_ipt1 mt20" type="password" name="password" placeholder="请设置您的密码"><br>
                <input class="login_ipt1 mt20" type="password" name="password1" placeholder="请重新输入您的密码"><br>
                <input class="login_sub1 mt20 "  type="submit" value="提交"><br>
                <a class="login_a2 mt20" href="<?php echo base_url('users/login')?>" >返回</a>
            </form>
            <div class="clear"></div>
        </div>
    </div>
<script>
    function send(msgs){

        //自己的逻辑
        var str = document.getElementById("phone").value;

        var regPartton=/1[3-8]+\d{9}/;
        if(!regPartton.test(str)){
            alert('请输入正确的手机号');
        }else{
            var URL = "<?php echo base_url('shortMessage/send') ?>";
            $.ajax({
                type: "post",
                url: URL,
                data: "p="+str+"&m=reg",
                dataType:'json',
                success: function(msg) {
                    if(msg.status==0){
                        alert('验证码发送失败,请稍后重新尝试。');
                        return;
                    }else{
                        f_timeout();
                    }
                }
            });
        }
    }

    function f_timeout(){
        $('#divphone').html('  <span id="timeb2" class="fr btnsedmsg"> 120 </span> ');
        timer = self.setInterval(addsec,1000);
    }
    function addsec(){
        var t = $('#timeb2').html();
        if(t > 0){
            $('#timeb2').html(t-1);
        }else{
            window.clearInterval(timer);

            $('#divphone').html("<a id='yan' class='fr btnsedmsg'' onclick='send(2)'>重新获取</a>");
        }

    }

</script>