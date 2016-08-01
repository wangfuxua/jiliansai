
<div class="content">
    <?php foreach($list as $k=>$v):?>
                <div class="home_d3">
                <div class=" item<?php
                if($k==0){echo '1';}else{
                    $y=$k%2;
                if($y!=0){echo '2';}else{echo '1';}
                }?>">
                        <h1 class="home_tit1"><?php echo $v['name']?></h1>
                    <div class="item_imgs">
                            <img src="<?php echo ADMIMG.$v['logo'];?>">
                    </div>
                </div>
                    <div class="baoming"><a href="<?php echo base_url('item/game/itemid/'.$v['id']);?>">报名</a></div>
                 </div>
            <?php endforeach;?>

        <?php $c=count($list);if($c%2!=0):?>
        <div class="home_d3 ">

            <div class=" item2">
                <h1 class="home_tit1"></h1>
            <div class="imgs">

            </div>
                 </div>
            <div class="baoming"><a>报名</a></div>
             </div>
    <?php endif;?>

    <div class="clear"></div>
            <div class="foot_heoght"></div>
<style>
    .home_tit1{
        background-size:auto ;
    }
    .home_d3{
         height: auto;
        background-color: #12151a;
    }
    .item1{
        margin-right:30px ;
        width: 570px;
        height: 370px;
        border:2px solid black;
        background-color: #29323d;
    }
    .item2{
        margin-left:30px ;
        width: 570px;
        height: 370px;
        border:2px solid black;
        background-color: #29323d;
    }
    .baoming{
        margin-top: 20px;
          margin-left: 35%;;
          color: red;
        width: 150px;
        border-radius: 15px;
        text-align: center;
        line-height: 45px;
        border: 2px;
        background-color: lightslategray;
        height: 45px;
    }
    .baoming a{
        color: orange;
        font-size: 18px;
    }
    .item_imgs{
        line-height: 300px;
    }
    .item_imgs img{
          margin-left: 35px;
        height: 260px;
        width: 500px;
    }
    .foot_heoght{
        width: 100%;
            height: 60px;

    }

</style>