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

//	public function filter($filterChain) {
//		Yii::app()->user->id = 0;
//		Yii::app()->user->name = '来宾用户';
//		$flag = 0;
//		// 判断flag键值是否存在
//		if (!array_key_exists($this->loginflag, $_COOKIE)) {
//			//$this->checkUser();
//			$filterChain->run();
//			die;
//		}
//
//		$flag = $_COOKIE[$this->loginflag];
//
//		// $sql = "SELECT t1.*,t2.role FROM `admin_user` t1,`admin_role` t2 WHERE t1.role_id=t2.id  AND t1.flag='{$flag}'";
//		$sql = "SELECT * FROM `jls_admin_users` WHERE a.`flag`='{$flag}'";
//		// echo $sql; die;
//		$command = Yii::app()->db->createCommand($sql);
//		$login = $command->queryRow();
//		// print_r($login); die;
//
//		if (empty($login)) {
//			//$this->checkUser();
//			$filterChain->run();
//			die;
//		}
//
//		Yii::app()->user->id = $login['uid'];
//		Yii::app()->user->name = $login['username'];
//		Yii::app()->user->behaviors['role'] = $login['role'];
//
//		// $user = User::model()->find('uid=:uid', array(':uid'=>$login->uid));
//
//		/*$sql = "SELECT * FROM `admin_user` WHERE `uid`='{$login['uid']}'";
//		$command = Yii::app()->db->createCommand($sql);
//		$user = $command->queryRow();
//
//		if (isset($user)) {
//			Yii::app()->user->name = !!$user['name'] ? $user['name'] : $login['phone'];
//			Yii::app()->user->behaviors['isname'] = !!$user['name'] ? 1 : 0;
//			Yii::app()->user->behaviors['status'] = $user['status'];
//		}*/
//		// Yii::app()->user->username = $user->username;
//		// die;
//
//		//$this->checkUser($login['uid']);
//		$filterChain->run();
//	}

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
			$sql = "SELECT * FROM `jls_admin_users` WHERE `uid`='{$uid}'";
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
						$sql = "SELECT * FROM `jls_admin_users` WHERE `uid`='{$uid}'";
						$command = Yii::app()->db->createCommand($sql);
						$usero = $command->queryRow();

					}

				}
			}
			
		}
	}
}