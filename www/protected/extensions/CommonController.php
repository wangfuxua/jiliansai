<?php

class CommonController extends CController {
	// public $layout='column2';
	public $title = "";
	public $style = null;
	public $script = null;
	public $alink = null;
	public $tool = null;
	public $br = '<br />';
	public $per_page = 20;
	public $userid = null;
	public $isme = null;
	public $amodel = null;
	public $ubid = null;
	public $usid = null;
	public $bid = null;
	public $sid = null;
        public $sfuser = "ZJDM(BJ)";  
	public $sfpwd = "dHQP3ECfyeNKJMMZ";  
        public $specifications = array('20','50','100');
        


	public function init() {
		parent::init();
		$this->userid = Yii::app()->request->getParam('u') ? Yii::app()->request->getParam('u') : Yii::app()->request->getParam('uid');
		$this->userid = $this->userid ? $this->userid : Yii::app()->user->id;
		$this->isme = $this->userid=Yii::app()->user->id ? 1 : 0;



	}

	public function filters() {
		return array(
			array(
				'application.library.IsLoginFilter',
				),
			);
	}

	/**
	 * 获取头像
	 * @param  string $uid  user id
	 * @param  string $size s/m/b
	 * @return string       头像路径
	 */
	public function getAvatarPath($uid, $size='') {
		if (!$uid)
			return '';
		$dir1 = substr($uid, 0, 3);
		$dir2 = substr($uid, 3, 2);
		$path = "attachment/header/{$dir1}/{$dir2}/{$uid}";
		
		if ("s" == $size) {
			$ret =  $path."_s.jpg";
			if (!$this->checkTarget(base_url($ret)))
				$ret = "images/header/header_s.gif";
		} else if ("m" == $size) {
			$ret =  $path."_m.jpg";
			if (!$this->checkTarget(base_url($ret)))
				$ret = "images/header/header_m.gif";
		} else if ("b" == $size) {
			$ret =  $path."_b.jpg";
			if (!$this->checkTarget(base_url($ret)))
				$ret = "images/header/header_b.gif";
		} else {
			$ret['header_s'] = $path."_s.jpg";
			$ret['header_m'] = $path."_m.jpg";
			$ret['header_b'] = $path."_b.jpg";
			if (!$this->checkTarget(base_url($ret['header_b']))) {
				$ret['header_s'] = "images/header/header_s.gif";
				$ret['header_m'] = "images/header/header_m.gif";
				$ret['header_b'] = "images/header/header_b.gif";
			}
		}
		return $ret;
	}

	/**
	 * 检测目标链接
	 * @param  [str] $url [目标链接]
	 * @return [bool]      [返回值]
	 */
	private function checkTarget($url) {
		$flag = false;
		$header = @get_headers($url);
		if (strstr($header[0], '200')) {
			$flag = true;
		}
		return $flag;
	}

	/**
	 * 当view层渲染之前执行，拼写js与css
	 * @param  string $actionName [actionName]
	 * @return [type]         [description]
	 */
	protected function beforeRender($actionName) {
		if (!!$s = $this->style) {
			if (!!is_array($s)) {
				foreach ($s as $item) {
					$this->buildIncludeJS($item, 'css');
				}
			} else {
				$this->buildIncludeJS($s, 'css');
			}
		}
		if (!!$s = $this->script) {
			if (!!is_array($s)) {
				foreach ($s as $item) {
					$this->buildIncludeJS($item, 'js');
				}
			} else {
				$this->buildIncludeJS($s, 'js');
			}
		}
		return true;
	}

	/**
	 * 根据传参插入JS与CSS
	 * @param  string $file 文件名
	 * @param  string $ext  扩展名。js; css
	 * @return bool
	 */
	private function buildIncludeJS($file, $ext='css') {
		$path = 'css'===$ext ? 'styles/' : 'js/';
		if (stristr($file, 'http')) {
			if ('css' == $ext) {
				Yii::app()->clientScript->registerCssFile($file);
			} else {
				Yii::app()->clientScript->registerScriptFile($file);
			}
			return true;
		}
		if ('css' == $ext) {
			Yii::app()->clientScript->registerCssFile(base_url($path.($file).".{$ext}"));
		} else {
			Yii::app()->clientScript->registerScriptFile(base_url($path.($file).".{$ext}"));
		}
		return true;
	}

}
