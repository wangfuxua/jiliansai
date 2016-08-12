<?php
/**
* IsLoginFilter class file
*
* 应用于需要判断登录的actions，若没有登录就直接跳转到登录action
*
* @author hail
* @package application.filters
*/

/*
// 控制器中使用：
class SiteController extends Controller {
	public function filters() {
		return array(
			array( 
				'application.filters.IsLoginFilter + setting',
				'login_controller'=>'site',
				'login_action'=>'login',
				),
			);
	}
}
*/
class IsLoginFilter extends CFilter {
	private $loginflag = "__ss_admin_flag";
	private $jumprule = array();



	private function checkUser($uid='') {
		$ctrl = Yii::app()->getController()->id;
		$act = Yii::app()->getController()->getAction()->id;
		
		if (!$uid) {
			switch ($ctrl) {
				// case 'lawyer':
				// Yii::app()->user->returnUrl = "/{$ctrl}/{$act}";
				// Yii::app()->getController()->redirect('/login');
				// break;
				case 'center':
				Yii::app()->user->returnUrl = "/{$ctrl}/{$act}";
				Yii::app()->getController()->redirect('/login');
				break;
				case 'passport':

				break;
			}
		} else {
			$sql = "SELECT * FROM `jls_admin_users` WHERE `id`='{$uid}'";
			$command = Yii::app()->db->createCommand($sql);
			$user = $command->queryRow();
			// 如果用户没有选择职业
			if ('passport' != $ctrl) {
				if (!$user) {
					Yii::app()->user->returnUrl = "/{$ctrl}/{$act}";
					Yii::app()->getController()->redirect('/passport/changeclass');
				}
				if (1 == $user['status']) {
					if ('center' != $ctrl) {
						$sql = "SELECT * FROM `jls_admin_users` WHERE `id`='{$uid}'";
						$command = Yii::app()->db->createCommand($sql);
						$usero = $command->queryRow();

					}

				}
			}
			
		}
	}
}