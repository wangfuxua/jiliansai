	<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>ShengSu | Admin - System Page</title>

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
	<link href="<?php echo base_url() ?>media/css/bootstrap-fileupload.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->

	<link rel="shortcut icon" href="<?php echo base_url() ?>media/image/favicon.ico" />
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

	<script src="<?php echo base_url() ?>media/js/app.js"></script>      

	<script>

		jQuery(document).ready(function() {    

		   App.init();

		});

	</script>

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
				 ShengSu
				</a>

				<!-- END LOGO -->

				<!-- BEGIN RESPONSIVE MENU TOGGLER -->

				<a href="<?php echo base_url() ?>javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

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

						<span class="username"><?php echo Yii::app()->user->name ?></span>

						<i class="icon-angle-down"></i>

						</a>

						<ul class="dropdown-menu">

						<!-- 	<li><a href="<?php echo base_url() ?>extra_profile.html"><i class="icon-user"></i> My Profile</a></li>
						
						<li><a href="<?php echo base_url() ?>page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
						
						<li><a href="<?php echo base_url() ?>inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>
						
						<li><a href="<?php echo base_url() ?>#"><i class="icon-tasks"></i> My Tasks</a></li>
						
						<li class="divider"></li>
						
						<li><a href="<?php echo base_url() ?>extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>
						 -->
							<li><a href="<?php echo base_url() ?>passport/logout"><i class="icon-key"></i> Log Out</a></li>

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

					<form class="sidebar-search">

						<div class="input-box">

							<a href="<?php echo base_url() ?>javascript:;" class="remove"></a>

							<input type="text" placeholder="Search..." />

							<input type="button" class="submit" value=" " />

						</div>

					</form>

					<!-- END RESPONSIVE QUICK SEARCH FORM -->

				</li>

				<li class="start ">

					<a href="<?php echo base_url() ?>" target="_blank">

					<i class="icon-home"></i> 

					<span class="title">Home</span>

					</a>

				</li>

 

				<?php 
				/*$language = '';	
				if(isset ($p['language']) ){
					 
					$where .=  "  and ". $k."=".$v.""; 
					 
				}
				*/


				$url_bid=Yii::app()->request->getParam('bid');
				$url_sid=Yii::app()->request->getParam('sid');

				$sql = "SELECT id as bid, name FROM `admin_column` where   pid=0 ";
				$command = Yii::app()->db->createCommand($sql);
				$bid = $command->query(); 
				//var_dump($rs);exit;
				while($row =$bid->read()){ ?>
				<li class="<?php if($url_bid==$row['bid']) echo 'active';?>">
					<a href="javascript:;">
						<i class="icon-cogs"></i> 
						<span class="title"><?php echo $row['name'];?></span>
						<span class="selected"></span>
						<span class="arrow open"></span>
					</a>

					<ul class="sub-menu">
						<?php $sql = "SELECT id as sid, name, url FROM `admin_column` where  pid={$row['bid']} ";
						$command = Yii::app()->db->createCommand($sql);
						$sid = $command->query(); 
						while($rs =$sid->read()){ ?>
						<li class="<?php if($url_sid==$rs['sid']) echo 'active';?>">
							<a href="<?php echo base_url(''.$rs['url'].'/bid/'.$row['bid'].'/sid/'.$rs['sid'].' ')?>">
								<?php echo $rs['name'];?>               
							</a>
						</li>
						<?php  } ?> 

					</ul>

				</li>
				<?php  } ?>

			</ul>

			<!-- END SIDEBAR MENU -->

		</div>

		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->

		<div class="page-content">

			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

 

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			



	<?php
	if ($this->style) {
		if (is_array($this->style)) {
			foreach ($this->style as $item) {
				?>
				<link href="<?php echo base_url("styles/{$item}.css") ?>" rel="stylesheet" type="text/css" />
				<?php
			}
		} else {
			?>
			<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url("styles/{$this->style}.css") ?>" /> -->
			<?php
		}
	}
	?>
	<script type="text/javascript">
	var serverTime = <?php echo time();?> * 1000;//倒计时
	var base_url, ph$;
	base_url = "<?php echo base_url() ?>";
	ph$ = {};
	</script>
	
	<?php
	if ($this->script) {
		if (is_array($this->script)) {
			foreach ($this->script as $item) {
				?>
				<script type="text/javascript" src="<?php echo base_url("js/{$item}.js") ?>"></script>
				<?php
			}
		} else {
			?>
			<script type="text/javascript" src="<?php echo base_url("js/{$this->script}.js") ?>"></script>
			<?php
		}
	}
	?>
	
	<!-- BEGIN PAGE CONTAINER-->

			 










	<?php echo $content; ?>













				 

	<!-- END CONTAINER -->


	

	<!-- BEGIN FOOTER -->

	<div class="footer">

		<div class="footer-inner">

			2014 &copy; FG.

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