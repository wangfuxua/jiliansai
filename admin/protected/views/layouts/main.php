	<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="<?php echo base_url() ?>media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo base_url() ?>media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo base_url() ?>media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo base_url() ?>media/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo base_url() ?>media/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo base_url() ?>media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo base_url() ?>media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="<?php echo base_url() ?>media/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/bootstrap-fileupload.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/jquery.gritter.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/chosen.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/select2_metro.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/jquery.tagsinput.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/clockface.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/bootstrap-wysihtml5.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/datepicker.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/timepicker.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/colorpicker.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/bootstrap-toggle-buttons.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/daterangepicker.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/datetimepicker.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>media/css/multi-select-metro.css" />

	<link href="<?php echo base_url() ?>media/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="<?php echo base_url() ?>media/image/favicon.ico" />

	<link rel="stylesheet" href="<?php echo base_url("styles/page.css") ?>" rel="stylesheet" />
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script src="<?php echo base_url() ?>media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url() ?>media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="<?php echo base_url() ?>media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="<?php echo base_url() ?>media/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="<?php echo base_url() ?>media/js/excanvas.min.js"></script>

	<script src="<?php echo base_url() ?>media/js/respond.min.js"></script>  

	<![endif]-->   

	<script src="<?php echo base_url() ?>media/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url() ?>media/js/jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="<?php echo base_url() ?>media/js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="<?php echo base_url() ?>media/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/ckeditor.js"></script>  

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/bootstrap-fileupload.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/chosen.jquery.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/select2.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/wysihtml5-0.3.0.js"></script> 

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/bootstrap-wysihtml5.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/jquery.tagsinput.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/jquery.toggle.buttons.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/bootstrap-datetimepicker.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/clockface.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/date.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/daterangepicker.js"></script> 

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/bootstrap-colorpicker.js"></script>  

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/bootstrap-timepicker.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/jquery.inputmask.bundle.min.js"></script>   

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/jquery.input-ip-address-control-1.0.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ?>media/js/jquery.multi-select.js"></script>   

	<script src="<?php echo base_url() ?>media/js/bootstrap-modal.js" type="text/javascript" ></script>

	<script src="<?php echo base_url() ?>media/js/bootstrap-modalmanager.js" type="text/javascript" ></script> 

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url() ?>media/js/app.js"></script>

	<script src="<?php echo base_url() ?>media/js/form-components.js"></script>     

	<!-- END PAGE LEVEL SCRIPTS -->

	<script src="<?php echo base_url() ?>media/js/app.js"></script>
	   
	<script type="text/javascript" src="<?php echo base_url("js/jquery/bootstrap.autocomplete.js") ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("js/layer/layer.min.js") ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("js/common.js") ?>"></script>
	<script>
		var serverTime = <?php echo time();?> * 1000;//倒计时
		var base_url, uid;
		base_url = "<?php echo base_url() ?>";
		uid = "<?php echo Yii::app()->user->id ?>";

		jQuery(document).ready(function() {    

		   App.init();

		   FormComponents.init();

		});

	</script>

	<title>季联赛后台管理</title>
	
	<!-- END JAVASCRIPTS -->
</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

	<!-- BEGIN HEADER -->

	<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="<?php echo base_url() ?>">

				<!-- <img src="<?php echo base_url() ?>media/image/logo.png" alt="logo" /> -->
                    季联赛渠道后台管理
				</a>

				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="javascript: void(0);" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="<?php echo base_url() ?>media/image/menu-toggler.png" alt="" />

				</a>          

				<!-- END RESPONSIVE MENU TOGGLER -->            

				<!-- BEGIN TOP NAVIGATION MENU -->              

				<ul class="nav pull-right">

					<!-- BEGIN NOTIFICATION DROPDOWN -->   

					 

					<!-- END NOTIFICATION DROPDOWN -->

					<!-- BEGIN INBOX DROPDOWN -->

					 

					<!-- END INBOX DROPDOWN -->

					<!-- BEGIN TODO DROPDOWN -->



					<!-- END TODO DROPDOWN -->

					<!-- BEGIN USER LOGIN DROPDOWN -->

					<li class="dropdown user">

						<a href="<?php echo base_url() ?>#" class="dropdown-toggle" data-toggle="dropdown">

						<img alt="" src="<?php echo base_url() ?>media/image/avatar1_small.jpg" />

						<span class="username">总管理员</span>

						<i class="icon-angle-down"></i>

						</a>

						<ul class="dropdown-menu">

						<!-- 	<li><a href="<?php echo base_url() ?>extra_profile.html"><i class="icon-user"></i> My Profile</a></li>
						
						<li><a href="<?php echo base_url() ?>page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
						
						<li><a href="<?php echo base_url() ?>inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>
						
						<li><a href="<?php echo base_url() ?>#"><i class="icon-tasks"></i> My Tasks</a></li>
						
						<li class="divider"></li>-->
						
						<li><a href=""><i class="icon-lock"></i> 修改密码</a></li>
						<li><a href="<?php echo base_url() ?>passport/logout?logout=1"><i class="icon-key"></i> 安全退出</a></li>

						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU --> 

			</div>

		</div>

		<!-- END TOP NAVIGATION BAR -->

	</div>

	<!-- END HEADER -->

	<!-- BEGIN CONTAINER -->   

	<div class="page-container row-fluid">

		<!-- BEGIN SIDEBAR -->

		<div class="page-sidebar nav-collapse collapse">

			<!-- BEGIN SIDEBAR MENU -->        

			<ul class="page-sidebar-menu">

				<li>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

					<div class="sidebar-toggler hidden-phone"></div>

					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

				</li>

				<li>

					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

					<!-- <form class="sidebar-search">

						<div class="input-box">

							<a href="<?php echo base_url('index/index') ?>javascript:;" class="remove"></a>

							<input type="text" placeholder="Search..." />

							<input type="button" class="submit" value=" " />

						</div>

					</form> -->

					<!-- END RESPONSIVE QUICK SEARCH FORM -->

				</li>

				<li class="start ">

					<a href="<?php echo base_url('index/index') ?>">

					<i class="icon-home"></i> 

					<span class="title">Home</span>

					</a>

				</li>

 

                <?php
                $sql="select * from `jls_admin_colmns` where fid=0";
                $data=Yii::app()->db->createCommand($sql)->queryAll();

                ?>
                <?php foreach($data as $v):?>
				<li class="<?php $id=$name = Yii::app()->controller->id; if($id==$v['cls_name']){echo 'active';}?>">
					<a href="javascript:;">
						<i class="icon-cogs"></i> 
						<span class="title"><?php echo $v['name']?></span>
						<span class="selected"></span>
						<span class="arrow open"></span>
					</a>

					<ul class="sub-menu">
                        <?php
                        $sql="select * from `jls_admin_colmns` where fid=".$v['id'];
                        $data1=Yii::app()->db->createCommand($sql)->queryAll();

                        ?>
                    <?php foreach($data1 as $v):?>
						<li class="">
							<a href="<?php echo base_url($v['url'])?>">
                                <?php echo $v['name']?>
							</a>
						</li>
                    <?php endforeach;?>

					</ul>
				</li>
                <?php endforeach;?>

			</ul>

			<!-- END SIDEBAR MENU -->

		</div>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

 

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			



	<!-- BEGIN PAGE CONTAINER-->


	<?php echo $content; ?>


<!-- END PAGE -->    

</div> 


				 

	<!-- END CONTAINER -->


	

	<!-- BEGIN FOOTER -->

	<div class="footer">

		<div class="footer-inner">

			2016 &copy; 季联赛

		</div>

		<div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

		</div>

	</div>

	<!-- END FOOTER -->

	


<!-- END BODY -->

</html>