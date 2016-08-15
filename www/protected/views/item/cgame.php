
    <div style="height:115px;"></div>



    <div class="content">
        <div class="sign_stepbox">
            <div class="sign_step ">第一步</div>
            <div class="sign_step">第二步</div>
            <div class="sign_step sign_now">第三步</div>
        </div>
        <div class="sign_box1">
            <div class="sign_tit">填写基本信息</div>
            <form class="" action="" method="post" id="form1">
                <input type="hidden" value="<?php echo $tid?>" name="tid">
                <div class="sign_row">
                    <span class="sign_tit2">战队名称</span>
                    <input class="sign_ipt1" name="tname" value="<?php echo isset($tname)?$tname:'';?>" type="text">
                </div>
                <div class="sign_row mt20">
                    <span class="sign_tit2">战队LOGO</span>
                    <div class="sign_rightbox">
                        <input class="sign_ipt2" type="file">
                        <div>上传</div>
                    </div>
                </div>
                <div class="sign_row mt20">
                    <span class="sign_tit2">战队简介</span>
                    <textarea class="sign_area vam" name="descript" placeholder="战队简介"><?php echo isset($descript)?$descript:'';?></textarea>
                </div>
                
                <div class="sign_teambox">
                    <ul class="fl sign_team">
                        <li id="member1" onclick="showteam(1)" class="sign_active">队长</li>
                        <?php for($i=1;$i<$tinfo['pnum'];$i++):?>
                        <li id="member<?php echo $i+1?>" onclick="showteam(<?php echo $i+1?>)">队员<?php echo $i?></li>
                        <?php endfor;?>

                    </ul>
                    <ul class="fl sign_infobox">
                        <li id="teaminfo1" style="display:block">
                            <div class="">
                                <span class="sign_tit2">姓名</span>
                                <input name="name[]" class="sign_ipt1" value="<?php echo isset($name[0])?$name[0]:'';?>"  type="text">
                            </div>
                            <div class="mt20">
                                <span class="sign_tit2">手机号</span>
                                <input name="phone[]" class="sign_ipt1"  value="<?php echo isset($phone[0])?$phone[0]:'';?>" type="text">
                            </div>
                            <div class="mt20">
                                <span class="sign_tit2">QQ号</span>
                                <input name="qq[]" class="sign_ipt1"  value="<?php echo isset($qq[0])?$qq[0]:'';?>" type="text">
                            </div>
                            <div class="mt20">
                                <span class="sign_tit2">证件类型</span>
                                <select name="idtype[]" class="sign_slc1">
                                    <option value="2">身份证</option>
                                </select>
                            </div>
                            <div class="mt20">
                                <span class="sign_tit2">证件号</span>
                                <input name="idcard[]" class="sign_ipt1"  value="<?php echo isset($idcard[0])?$idcard[0]:'';?>" type="text">
                            </div>
                        </li>
                        <?php for($i=1;$i<$tinfo['pnum'];$i++):?>
                        <li id="teaminfo<?php echo $i+1?>">
                            <div class="">
                                <span class="sign_tit2">姓名</span>
                                <input name="name[]" class="sign_ipt1" value="<?php echo isset($name[$i])?$name[$i]:'';?>" type="text">
                            </div>
                            <div class="mt20">
                                <span class="sign_tit2">手机号</span>
                                <input name="phone[]" class="sign_ipt1"  value="<?php echo isset($phone[$i])?$phone[$i]:'';?>" type="text">
                            </div>
                            <div class="mt20">
                                <span class="sign_tit2">QQ号</span>
                                <input name="qq[]" class="sign_ipt1" value="<?php echo isset($qq[$i])?$qq[$i]:'';?>" type="text">
                            </div>
                            <div class="mt20">
                                <span class="sign_tit2">证件类型</span>
                                <select name="idtype[]" class="sign_slc1">
                                    <option value="2">身份证</option>
                                </select>
                            </div>
                            <div class="mt20">
                                <span class="sign_tit2">证件号</span>
                                <input name="idcard[]" class="sign_ipt1"  value="<?php echo isset($idcard[$i])?$idcard[$i]:'';?>" type="text">
                            </div>
                        </li>
                        <?php endfor;?>
                    </ul>
                    <div class="clear"></div>
                </div>

                <div class="tac mt30"><div class="sign_btn1" onclick="sumit1()">保存战队信息</div></div>
                <div class=" sign_ml170 mt30">

                    <a class="sign_btn3 mr20" href="javascript:;">上一步</a>

                    <input class="sign_btn1" type="button" onclick="sumit2()" value="下一步">
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function showteam (num) {
            $(".sign_team>li").removeClass("sign_active");
            $("#member"+num).addClass("sign_active");
            $(".sign_infobox>li").hide();
            $("#teaminfo"+num).show();
        }
        function sumit1(){
            $('#form1').attr('action','<?php echo base_url('item/tjgame1');?>');
            $('#form1').submit();
        }
        function sumit2(){
            $('#form1').attr('action','<?php echo base_url('item/tjgame2');?>');
            $('#form1').submit();
        }
    </script>