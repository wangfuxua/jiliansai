<?php
//if($p && $_SERVER['REDIRECT_URL']!='/m/index' && !strstr($_SERVER['REDIRECT_URL'],'api')){
//    header("location:/m/index");
//}
date_default_timezone_set('Asia/Shanghai');
// phpinfo(); die;
// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
$inc = array(
	dirname(__FILE__).'/ext/url.php',			// base_url与site_url
	dirname(__FILE__).'/ext/constants.php',		// 常量
	dirname(__FILE__).'/ext/tools.php',			// toolkits
	dirname(__FILE__).'/ext/waf.php',			// waf
);
// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
require_once($yii);
// include self
// echo YII_PATH
foreach ($inc as $item) {
	require_once($item);
}
 
Yii::createWebApplication($config)->run();
