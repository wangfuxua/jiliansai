
    <link rel="stylesheet" href="<?php echo base_url()?>/css/idangerous.swiper.css">
    <script type="text/javascript" src="<?php echo base_url()?>/js/idangerous.swiper.min.js"></script>

    <div class="swiper-container home_bn">
        <div class="swiper-wrapper">
<?php foreach($banner as $v):?>
            <a class="swiper-slide dpb" href="javascript:;">
                <img class="w100" src="<?php echo ADMIMG.$v['img']?>">
            </a>
            <?php endforeach;?>
        </div>
        <div class="pagination"></div>
    </div>
    <div class="home_con1">
        <div class="home_content" style="padding: 50px 0;">
            <div class="home_d1 fl">
                <!-- <h2 class="home_tit1">新闻中心</h2> -->
                <div class="home_tab_box">
                    <div id="zxzx_btn" class="tab_btn">

                        <div class="sel active"><a href="javascript:void(0);">新闻</a></div>
                        <div class="sel"><a href="javascript:void(0);">战报</a></div>
                        <div class="sel"><a href="javascript:void(0);">专访</a></div>
                        <div class="sel"><a href="javascript:void(0);">行业</a></div>
                    </div>
                    <div id="zxzx_con" class="zxzx_con">
                    <div class="zxzx_content active" >
                        <?php foreach($news[7] as $k=>$v):?>
                            <?php if($k!=0):?>
                            <div class="home_line1 "></div>
                                <?php endif;?>
                        <div class="home_column">
                            <div class="home_pic">
                                <a title="" target="_blank" href="#"><img alt="" width="188" height="106" width="188" height="106" src="<?php echo ADMIMG.$v['logo']?>"></a>
                            </div>
                            <div class="home_caption">
                                <h4 class="tit mb10"><a href="" target="_blank" title=""><?php echo $v['title']?></a></h4>
                                <p class="txt"><?php echo $v['desc']?>。</p>
                            </div>
                        </div>

                        <?php endforeach;?>

                    </div>

                        <div class="zxzx_content" >
                            <?php foreach($news[2] as $k=>$v):?>
                                <?php if($k!=0):?>
                                    <div class="home_line1"></div>
                                <?php endif;?>
                                <div class="home_column">
                                    <div class="home_pic">
                                        <a title="" target="_blank" href="#"><img alt="" width="188" height="106" width="188" height="106" src="<?php echo ADMIMG.$v['logo']?>"></a>
                                    </div>
                                    <div class="home_caption">
                                        <h4 class="tit mb10"><a href="" target="_blank" title=""><?php echo $v['title']?></a></h4>
                                        <p class="txt"><?php echo $v['desc']?>。</p>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>

                        <div class="zxzx_content" >
                            <?php foreach($news[8] as $k=>$v):?>
                                <?php if($k!=0):?>
                                    <div class="home_line1"></div>
                                <?php endif;?>
                                <div class="home_column">
                                    <div class="home_pic">
                                        <a title="" target="_blank" href="#"><img alt="" width="188" height="106" width="188" height="106" src="<?php echo ADMIMG.$v['logo']?>"></a>
                                    </div>
                                    <div class="home_caption">
                                        <h4 class="tit mb10"><a href="" target="_blank" title=""><?php echo $v['title']?></a></h4>
                                        <p class="txt"><?php echo $v['desc']?>。</p>
                                    </div>
                                </div>

                            <?php endforeach;?>
                        </div>
                        <div class="zxzx_content" >
                            <?php foreach($news[9] as $k=>$v):?>
                                <?php if($k!=0):?>
                                    <div class="home_line1"></div>
                                <?php endif;?>
                                <div class="home_column">
                                    <div class="home_pic">
                                        <a title="" target="_blank" href="#"><img alt="" width="188" height="106" width="188" height="106" src="<?php echo ADMIMG.$v['logo']?>"></a>
                                    </div>
                                    <div class="home_caption">
                                        <h4 class="tit mb10"><a href="" target="_blank" title=""><?php echo $v['title']?></a></h4>
                                        <p class="txt"><?php echo $v['desc']?>。</p>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <div class="home_line1"></div>
                        </div>


                  </div>
                       </div>
            </div>
            <div class="home_d2 fr">
                <div class="home_d2_con1">
                    <h2 class="home_tit1">比赛项目报名</h2>
                    <?php foreach($item as $v):?>
                        <a href="<?php echo base_url('item/game/itemid/'.$v['id']);?>">
                    <img class="home_d2img" src="<?php echo ADMIMG.$v['logo']?>" width="200" height="120    " >
                            </a>
                    <?php endforeach;?>

                </div>
                <div >
                    <h2 class="home_tit1 home_d2_con1_tit1">热门活动</h2>
                    <?php if($adv1['status']==1):?>
                        <?php if($adv1['type']==1):?>
                            <a href="<?php echo $adv1['url']?>">
						<?php else:?>
                            <a href="#">
                        <?php endif;?>
                    			<!-- <img class="w100" src="<?php echo ADMIMG.$adv1['img']?>"> -->
                    			<img class="w100" src="http://mgy.jileague.com/attachment/jls/16/08/20160802103401824.jpg">
                            </a>
                    <?php endif;?>
                </div>
                <div >
                    <h2 class="home_tit1 home_d2_con1_tit1">热门活动</h2>
                    <?php if($adv2['status']==1):?>
                    <?php if($adv2['type']==1):?>
                    <a href="<?php echo $adv2['url']?>">

                        <?php else:?>
                        <a href="#">
                            <?php endif;?>
                    <!-- <img class="w100" src="<?php echo ADMIMG.$adv2['img']?>"> -->
                    <img class="w100" src="http://mgy.jileague.com/attachment/jls/16/08/20160802103401824.jpg">
                        </a>
                    <?php endif;?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="home_line2"></div>
    <div class="home_con2">
        <div class="home_content">
            <div class="home_hotbox">
                <h2 class="home_tit3">热门视频</h2>
                <ul class="home_hot_tit">
                    <?php foreach($item as $k=>$v):?>
                    <li id="hottit<?php echo $k+1?>"><?php echo $v['name']?></li>
                    <?php endforeach;?>
                </ul>
                <div class="home_hot_con">
                    <div id="hotarr" class="home_hot_arr1"></div>

                    <?php foreach($videos as $k=>$v):?>

                    <ul id="hot_conul<?php echo $k+1?>" class="home_hot_conul">
                        <?php foreach($v as $val):?>
                        <?php if(!empty($val)):?>
                        <li>
                            <img src="<?php echo ADMIMG.$val['logo']?>" class="w100">
                            <p class="tac fsz16 mt10 c_f"><?PHP ECHO $val['name']?></p>
                        </li>
                        <?php endif;?>
                        <?php endforeach;?>
                    </ul>
                    <?php endforeach;?>


                    <div class="clear"></div>
                </div>
            </div>
            <h2 class="home_tit3 mt40 mb40">全程赞助</h2>
            <div class="home_hot_con">
                <div class="imgs">
                    <?php if(!empty($zanzhu)):?>
                        <?php foreach($zanzhu as $v):?>
                            <a href="">
                    <img class="" src="<?php echo ADMIMG.$v['logo']?>" >
                                </a>
                            <?php endforeach;?>
                    <?php endif?>

                </div>
            </div>
            <h2 class="home_tit3 mt40 mb40">合作方</h2>
            <div class="home_hot_con">
                <div class="imgs">
                    <?php if(!empty($hezuo)):?>
                        <?php foreach($hezuo as $v):?>
                            <a href="">
                                <img class="" src="<?php echo ADMIMG.$v['logo']?>" >
                            </a>
                            <?php endforeach;?>
                    <?php endif?>
                </div>
            </div>
            <h2 class="home_tit3 mt40 mb40">合作媒体</h2>
            <div class="home_hot_con">
                <div class="imgs">
                    <?php if(!empty($meiti)):?>
                        <?php foreach($meiti as $v):?>
                            <a href="">
                                <img class="" src="<?php echo ADMIMG.$v['logo']?>" >
                            </a>
                            <?php endforeach;?>
                    <?php endif?>
                </div>
            </div>
            <!-- <div class="home_d3 fl">
                <h2 class="home_tit2">合作方</h2>
                <div class="imgs">
                    <img class="" src="<?php echo base_url()?>/img/partner01.png" >
                    <img class="" src="<?php echo base_url()?>./img/partner02.png" >
                    <img class="" src="<?php echo base_url()?>/img/partner03.png" >
                    <img class="" src="<?php echo base_url()?>/img/partner04.png" >
                    </div>
            </div>
            <div class="clear"></div>
            <div class="home_d4">
                <h2 class="home_tit1">合作媒体</h2>
                <img class="mt20 ml20" src="<?php echo base_url()?>/img/partner01.png" >
                <img class="" src="<?php echo base_url()?>./img/partner02.png" >
                <img class="" src="<?php echo base_url()?>/img/partner03.png" >
                <img class="" src="<?php echo base_url()?>/img/partner04.png" >
                <img class="" src="<?php echo base_url()?>/img/partner02.png" >
                <img class="" src="<?php echo base_url()?>/img/partner01.png" >
            </div> -->
        </div>
        <div class="footer" id="footer">
            <ul class="footer_ul">
                <li><a href="javascript:;">关于我们</a></li>
                <li><a href="javascript:;">商务合作</a></li>
                <li><a href="javascript:;">联系我们</a></li>
                <li><a href="javascript:;">加入我们</a></li>
            </ul>
        </div>
    </div>
    
    <script type="text/javascript">
        $(window).load(function(){
            setNewsHight(40,106,6);
        })
        
        $(".home_hot_tit li").on("click",function(){
            var num = $(this).attr("id").replace("hottit","")
            $("#hotarr").attr("class","home_hot_arr"+num);
            $("ul.home_hot_conul").hide();
            $("ul#hot_conul"+num).show();

        })

        $("#zxzx_btn .sel").on("click",function(){
            var _index=$(this).index();
            $(this).addClass("active").siblings("div").removeClass("active");
            $("#zxzx_con .zxzx_content:eq("+_index+")").addClass("active").siblings().removeClass("active");
        })
    $("body").removeClass("bg_1");
    $(window).load(function(){
        $(".footer").hide();
        $("#footer").show();
    })
    $(".zxzx_content .home_line1:last").hide();
    var mySwiper = new Swiper('.swiper-container',{
        pagination: '.pagination',
        paginationClickable: true,
        loop:true,
        autoplay:3000
    })
    function setBnH () {
        // var bn_h = $(window).width()*320/1200;
        var bn_h = $(window).width()*700/1920;
        $(".home_bn").css({
            "height":bn_h
        })
        setNewsHight(40,106,6)
    }
    function setNewsHight(line_h,newsimg_h,news_num) {
    	var d2_h = $(".home_d2").height();
    	var pd = (d2_h - 75  - (line_h * (news_num-1)) - (newsimg_h * news_num)) / (news_num*2);

    	$(".home_column").css({
            "padding-top":pd,
            "padding-bottom":pd
        })
    	$(".zxzx_content").css({
            "height":d2_h-60,
        })
    }
    $(function(){
        setBnH ();
    })
    $(window).resize(function(){
        setBnH ();
    })
</script>
