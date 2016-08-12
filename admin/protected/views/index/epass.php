 
<script type="text/javascript">
	jQuery(document).ready(function(){
		var m = "<?php   ?>";
		if (m) {
			ph$.alert(m);
		}
	});	

	$(function(){
		$("#myform").Validform({

			tiptype:function(msg,o,cssctl){
      //msg：提示信息;
      //o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
      //cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
      if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
      	var objtip=o.obj.siblings(".Validform_checktip");
      	cssctl(objtip,o.type);
      	objtip.text(msg);
      }
  }
});
	})

	

	function submitForm(){
		$('#myform').submit();
	}

	
</script>
<div class="container-fluid">

	<!-- BEGIN PAGE HEADER-->

	<div class="row-fluid">

		<div class="span12">

			<!-- BEGIN STYLE CUSTOMIZER -->

			<!-- END BEGIN STYLE CUSTOMIZER --> 

			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
				<?php ?> <small><?php  ?> </small>
			</h3>
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li>
					<a href="#"></a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#"><?php  ?></a></li>
			</ul>
			<!-- END PAGE TITLE & BREADCRUMB-->

		</div>

	</div>

	<!-- END PAGE HEADER-->

	<!-- BEGIN PAGE CONTENT-->

	<div class="row-fluid">

		<div class="span12">
			<div class="portlet box blue">

				<div class="portlet-title">

					<div class="caption"><i class="icon-reorder"></i>Form   <?php //  echo date("Y-m-d H:m:i", 1403513875);?></div>

								<!-- <div class="tools">
								
									<a href="javascript:;" class="collapse"></a>
								
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
								
									<a href="javascript:;" class="reload"></a>
								
									<a href="javascript:;" class="remove"></a>
								
								</div> -->

							</div>

							<div class="portlet-body form">

								<!-- BEGIN FORM-->
								<form class="form-horizontal" id='myform' action='<?php echo base_url('Admin/doadmin_change_pwd')  ?>' method='post'  >
									<div class="control-group">
										<label class="control-label">登录帐号：</label>
										<div class="controls">
											<input name="id" value="<?php echo $admin['id']?>" type="hidden"  />
											<?php echo $admin['username']?>
											
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">登录密码：</label>
										<div class="controls">
											<input name="pwd"  type="text" class="span6 m-wrap popovers" data-trigger="hover" data-content="字母、数字或符号，最短6个字符，区分大小写." data-original-title="提示"   hint="字母、数字或符号，最短6个字符，区分大小写"  nullmsg="请填写密码" datatype="*6-18" errormsg="字母、数字或符号，6~18个字符，区分大小写" type="password"   />
											<span class="help-inline  Validform_checktip"></span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">重复密码：</label>
										<div class="controls">
											<input name="confirm_pwd"  type="text" class="span6 m-wrap popovers" data-trigger="hover" data-content="请再次输入密码." data-original-title="提示"  hint="请再次输入密码"  type="password"  errormsg="您两次输入的密码不一致！" datatype="*6-15" nullmsg="请填确认密码" recheck="pwd"   />
											<span class="help-inline  Validform_checktip"></span>
										</div>
									</div> 
									
									
									
									
									
									<div class="form-actions">
										<button type="submit" class="btn blue">Submit</button>
										<button type="button" class="btn">Cancel</button>                            
									</div>
								</form>

								<!-- END FORM-->       

							</div>

						</div>

					</div>

				</div>

				<!-- END PAGE CONTENT-->

			</div>

			<!-- END PAGE CONTAINER--> 

		</div>

		<!-- END PAGE -->    

	</div>