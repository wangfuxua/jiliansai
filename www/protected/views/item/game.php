
<div style="height:115px;"></div>



<div class="content">
    <div class="sign_stepbox">
        <div class="sign_step sign_now">第一步</div>
        <div class="sign_step">第二步</div>
        <div class="sign_step">第三步</div>
    </div>
    <div class="sign_box1">
        <div class="sign_tit">确认选择游戏</div>
        <form class="" action="<?php echo base_url('item/BGanme')?>" method="post">
            <input type="hidden" name="itemid" value="<?php echo $itemid?>">
            <div class="sign_row">
                <span class="sign_tit2">游戏比赛项目</span>
                <input class="sign_ipt1" type="text" value="<?php echo $list[0]['name']?>" readonly="readonly">
            </div>
            <div class="sign_row mt20">
                <span class="sign_tit2">游戏比赛项目</span>
                <select class="sign_slc1" name="gameid">
                    <?php foreach ($list as $v):?>
                    <option value="<?php echo $v['id']?>"><?php echo $v['pnum']?>V<?php echo $v['pnum']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <label class=" mt20 dpb tac"><input class="vam" type="checkbox"><span class="vam"> 我阅读并同意《季联赛》报名规则</span></label>
            <div class="tac"><input class="sign_btn1 mt20" type="submit" value="下一步"></div>
        </form>
    </div>
</div>




</html>