<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="<?php echo base_url("styles/houtai.css") ?>" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url("js/jquery/jquery-1.8.3.min.js") ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("js/layer/layer.min.js") ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("js/common.js") ?>"></script>
	<script type="text/javascript">
		var base_url, uid;
		base_url = "<?php echo base_url() ?>";
		uid = "<?php echo Yii::app()->user->id ?>";
	</script>

	<title><?php echo CHtml::encode($this->title); ?></title>
</head>
<body>
	<!--头部开始-->
	 
 
	<!--头部结束-->
	<?php echo $content; ?>
	<!--尾部开始-->
	 
 
	<!--尾部结束-->
</body>
</html>