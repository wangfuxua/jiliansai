<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title><?php echo $this->title?></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="<?php echo base_url()?>/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/css/idangerous.swiper.css">
    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/js/idangerous.swiper.min.js"></script>
</head>
<body class="bg_1">
<div class="nav">
    <div class="nav_1">
        <img class="nav_logo" src="<?php echo base_url()?>/img/logo.png" height="120" title="logo">
        <div class="nav_login">
            <?php if(Yii::app()->user->id):?>
                <?php $sql="select * from `jls_users` where uid=".Yii::app()->user->id;
                $users=Yii::app()->db->createCommand($sql)->queryRow();
                ?>
                  <a class="mr20" style="color: red" href="javascript:;"><?php echo $users['phone']?></a>
                <a href="<?php echo base_url('/users/logout');?>">退出</a>
            <?php else:?>
            <a class="mr20" href="<?php echo base_url('/users/login');?>">登录</a>
            <a href="<?php echo base_url('/users/regview');?>">注册</a>
            <?php endif;?>
        </div>
    </div>
    <ul class="nav_ul">
        <li><a href="<?php echo base_url()?>">官网首页</a></li>
        <li><a href="javascript:;">快速报名</a></li>
        <li><a href="<?php echo base_url('video/video');?>">赛事直播</a></li>
        <li><a href="javascript:;">新闻中心</a></li>
        <li><a href="javascript:;">商务合作</a></li>
    </ul>
</div>

    <?php echo $content?>

<div class="footer">
    <ul class="footer_ul">
        <li><a href="javascript:;">关于我们</a></li>
        <li><a href="javascript:;">商务合作</a></li>
        <li><a href="javascript:;">联系我们</a></li>
        <li><a href="javascript:;">加入我们</a></li>
    </ul>
</div>

<script type="text/javascript">
    var mySwiper = new Swiper('.swiper-container',{
        // pagination: '.pagination',
        // paginationClickable: true,
        loop:true,
        autoplay:3000
    })
    function setBnH () {
        var bn_h = $(window).width()*320/1200;
        $(".home_bn").css({
            "height":bn_h
        })
    }
    $(function(){
        setBnH ();
    })
    $(window).resize(function(){
        setBnH ();
    })
</script>
</body>
</html>
