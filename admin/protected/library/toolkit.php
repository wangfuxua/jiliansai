<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of functionPatch
 *
 * @author phoebus
 */
class ToolKit {

	public function wordSpell($word) {
		echo preg_match("/^[\x7f-\xff]+$/", $word);
	}

	/**
	 * 分析字符串中的@目标
	 * @param  string $v 传入的字符串，如果有@，则匹配出@目标并添加上a标签
	 * @return string    处理后的字符串
	 */
	public function extractAt($v) {
		if (!$v)
			return 0;
		// 如果不包含@则直接返回
		if (strpos($v, '@') === false) {
			return $v;
		}
		$flag = '[::::]';
		$_v = $v;
		// email正则，开头只能是字母或数字
		$regm = "/[a-zA-Z0-9][a-zA-Z0-9_-]*@[a-zA-Z0-9][a-zA-Z0-9_-]*\.[a-zA-Z][a-zA-Z]*/";
		// 匹配出所有邮件，其值留用
		preg_match_all($regm, $v, $mail);
		$mail = $mail[0];
		// 如果存在邮件，则替换成指定字符
		if (!!$mail) {
			$_v = preg_replace($regm, $flag, $v);
		}
		$arr = explode('@', $_v);
		// 如果没有@，则直接返回
		if (count($arr) === 0) {
			return $v;
		}
		$sign = "/[^a-zA-Z0-9\x{4e00}-\x{9fa5}_-]/u";
		$at = $list = array();
		foreach ($arr as $k=>$item) {
			// 第一次表示在@之前，或者当前循环没有任何值，直接跳过
			if (0===$k || !$item) {
				$list[] = $item;
				continue;
			}
			if (preg_match($sign, $item)) {
				// 如果当前分段包含特殊字符，则以此字符为分界，取出之前的部分
				$tmp = preg_replace($sign, ',', $item);
				$tmp = strtok($tmp, ',');
			} else {
				// 如果当前分段没有特殊字符，表示整句都是at内容
				$tmp = $item;
			}
			$at[] = $tmp;
			// 生成链接
			$temp = "<a href=\"".base_url().'passport/gotouser/'.$tmp."\" class=\"img_evt\" />@{$tmp}</a>";
			// 将链接替换成原有文本
			$tmp = str_replace($tmp, $temp, $item);
			$list[] = $tmp;
		}
		// 打散成字符串
		$tmp = join($list);
		if (count($mail) > 0) {
			foreach ($mail as $item) {
				$tmp = str_replace($flag, $item, $tmp);
			}
		}
		$ret['val'] = $tmp;
		$ret['v'] = $v;
		$ret['at'] = $at;
		$ret['ats'] = join($at, ',');
		return $ret;
		Qii::dump($ret);
	}


	/**
	 * 检测目标链接
	 * @param  [str] $url [目标链接]
	 * @return [bool]      [返回值]
	 */
	public function checkTarget($url) {
		$flag = false;
		$header = @get_headers($url);
		//print_r(get_headers($url));
		//print_r(get_headers($url, 1));
		if (strstr($header[0], '200')) {
			$flag = true;
		}
		return $flag;
	}


	/**
	 * 验证IP是否有效
	 * @param  string $ip 传入IP
	 * @return bool     返回布尔
	 */
	public function validIP($ip) {
		$ip_segments = explode('.', $ip);

		// Always 4 segments needed
		if (count($ip_segments) != 4) {
			return FALSE;
		}
		// IP can not start with 0
		if ($ip_segments[0][0] == '0') {
			return FALSE;
		}
		// Check each segment
		foreach ($ip_segments as $segment) {
			// IP segments must be digits and can not be
			// longer than 3 digits or greater then 255
			if ($segment == '' OR preg_match("/[^0-9]/", $segment) OR $segment > 255 OR strlen($segment) > 3) {
				return FALSE;
			}
		}

		return TRUE;
	}


	/**
	 * 将字符串切分为单个的字符
	 *
	 * @param String $string
	 * @return Array
	 */
	public function cut_string($string) {
		mb_internal_encoding("UTF-8");
		$length = strlen($string);
		if ($length == 0)
			return array();
		$return = array();
		preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $info);
		return $info[0];
	}


	/**
	 * 创建文件夹
	 * @param  [str] $path [路径]
	 */
	public function createFolder($path) {
		if (!file_exists($path)) {
			$this->createFolder(dirname($path));
			mkdir($path, 0777);
		}
	}


	/**
	 * 分割字符串
	 * @param  [type] $str  [description]
	 * @param  [type] $lang [description]
	 * @return [type]       [description]
	 */
	public function substrPatch($str, $lang) {
		$tmpstr = "";
		for ($i=0, $j=0; $i<$lang;) {
			//if (!preg_match("/^[".chr(0xa1)."-".chr(0xff)."]+$/", mb_substr($str, $j, 3))) {
			if (ord(mb_substr($str, $j, 1)) > 0xa0) {
				//echo 'no.'.$i.':ch:'.mb_substr($str, $j, 3).'<br />';
				$tmpstr .= mb_substr($str, $j, 3);
				$i = $i + 2;
				$j = $j + 3;
			} else {
				//echo 'no.'.$i.':en:'.mb_substr($str, $j, 1).'<br />';
				$tmpstr .= mb_substr($str, $j, 1);
				$i++;
				$j++;
			}
		}
		return $tmpstr;
	}


	/**
	 * 生成随机字符串
	 * @param  integer $length 长度
	 * @param  string  $type   传参：w：大小写字母；wu：大写字母；wd：小写；wn：大小写字母和数字；n：数字；all：大小写字母、数字、特殊字符
	 * @return string          生成的字符串
	 */
	public function getRandomStr($length=10, $type='wn') {
		$chars_wu = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$chars_wd = "abcdefghijklmnopqrstuvwxyz";
		$chars_n = "123456789";
		$chars_s = "!@#$%^&*()-_[]{}<>~`+=, .;:/?|";

		// 根据不同的需求来做不同的组合
		if ('w' === $type) {
			$pool = $chars_wu . $chars_wd;
		} else if ('wu' === $type) {
			$pool = $chars_wu;
		} else if ('wd' === $type) {
			$pool = $chars_wd;
		} else if ('wn' === $type) {
			$pool = $chars_wu . $chars_wd . $chars_n;
		} else if ('n' === $type) {
			$pool = $chars_n;
		} else if ('all' === $type) {
			$pool = $chars_wu . $chars_wd . $chars_n . $chars_s;
		}

		$str = "";
		for ($i=0; $i<$length; $i++) {
			$pos = mt_rand(0, (strlen($pool) - 1));
			$str .= $pool{$pos};
		}
		
		return $str;
	}


	/**
	 * 获取用户操作系统
	 * @return string 具体对应的操作系统
	 */
	public function getServerOS() {
		$os = '';
		switch(PHP_OS) {
			case 'Linux': // Linux
			break;
			case 'WINNT': // winNT/win7
			break;
			case 'WIN32': // win32
			break;
			case 'Windows': // win
			break;
			case 'Unix': // unix
			break;
			case 'Darwin': // IOS
			break;
			case 'FreeBSD': // FreeBSD
			break;
			case 'CYGWIN_NT-5.1': // 
			break;
			case 'IRIX64': // IRIX64
			break;
			case 'OpenBSD': // OpenBSD
			break;
			case 'SunOS': // SunOS
			break;
			case 'NetBSD': // NetBSD
			break;
			case 'HP-UX': // hp unix
			break;
		}
	}


	/**
	 * 获取用户IP
	 * @return string 返回IP，如果没得到，则返回0.0.0.0
	 */
	public function getIP() {
		if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"]) {
			$ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
		} elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"]) {
			$ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
		} elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"]) {
			$ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
		} elseif (getenv("HTTP_X_FORWARDED_FOR")) {
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		} elseif (getenv("HTTP_CLIENT_IP")) {
			$ip = getenv("HTTP_CLIENT_IP");
		} elseif (getenv("REMOTE_ADDR")) {
			$ip = getenv("REMOTE_ADDR");
		} else {
			$ip = "0.0.0.0";
		}
		
		return $ip;
	}


	/**
	 * 获取用户ip
	 * @param  integer $fmt 如果是16表示返回16进制
	 * @return string       返回的ip
	 */
	public function getUserIP($fmt=16) {
		$onlineip = '';
		if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
			$onlineip = getenv('HTTP_CLIENT_IP');
		} elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
			$onlineip = getenv('HTTP_X_FORWARDED_FOR');
		} elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
			$onlineip = getenv('REMOTE_ADDR');
		} elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
			$onlineip = $_SERVER['REMOTE_ADDR'];
		}
		if (16 === $fmt)
			$onlineip = $this->ipConvert($onlineip);
		return $onlineip;
	}

	// 爬日志
	// http://zhumeng8337797.blog.163.com/blog/static/10076891420128273333918/
	/**
	 * ip地址的两种模式互相转换
	 * @param  string $base 输入现有IP地址（10进制或者16进制）
	 * @return string       输出另外一种进制类型
	 */
	public function ipConvert($base) {
		$base = trim($base);
		// 如果是10进制
		if (strpos($base, '.')) {
			$ret = '';
			$list = explode('.', $base);
			foreach ($list as $item) {
				$ret .= str_pad(dechex($item), 2, 0, STR_PAD_LEFT);
			}
			return strtoupper($ret);
		}

		$list = str_split($base, 2);
		$ret = array();
		foreach ($list as $item) {
			$ret[] = hexdec($item);
		}
		$ret = join($ret,'.');
		return $ret;
	}


	/**
	 * 切割字符串
	 * str		要切割的字符串
	 * start	开始位置
	 * end		结束位置
	 * option	切割方式
	 */
	public function interceptStr($str, $start, $end='', $option='') {
		$strarr = explode($start, $str);
		if (count($strarr) <= 1)
			return '';
		$tem = $strarr[1];
		if (empty($end)) {
			return $tem;
		} else {
			$strarr = explode($end, $tem);
			if ($option == 1)
				return $strarr[0];
			if ($option == 2)
				return $start.$strarr[0];
			if ($option == 3)
				return $strarr[0].$end;
			return $start.$strarr[0].$end;
		}
	}


	public function httpRequest($url, $data='',$timeout = 5) {
		if (!$url)
			return false;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		// 设置是否返回信息 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 设置超时时间
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		if (!!$data) {
			curl_setopt ($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
		//接受返回信息
		$curl_result = curl_exec($ch);
		if(curl_error($ch))
			return false;
		curl_close($ch);
		return $curl_result;
	}


    /**
     * 生成二维码
     * @return [filename]
     */
    public function httpGenerate($data, $level = "L", $size = "4") {
        include_once('./protected/library/phpqrcode/qrlib.php');
        if (empty($data)) {
            return -1;
            die;
        }
        //set it to writable location, a place for temp generated PNG files
        $PNG_TEMP_DIR = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 'attachment' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

        //html PNG location prefix
        $PNG_WEB_DIR = $_SERVER ['HTTP_HOST'] . '/attachment/temp/';

        //ofcourse we need rights to create temp dir
        if (!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);


        $filename = $PNG_TEMP_DIR . 'test.png';

        //processing form input
        //remember to sanitize user input in real-life solution !!!
        //  $errorCorrectionLevel = 'L';
        if (isset($level) && in_array($level, array('L', 'M', 'Q', 'H')))
            $errorCorrectionLevel = $level;

        // $matrixPointSize = 4;
        if (isset($size))
            $matrixPointSize = min(max((int) $size, 1), 10);

        if (isset($data)) {

            //it's very important!
            if (trim($data) == '')
                die('data cannot be empty! <a href="?">back</a>');

            // user data
            $filename = $PNG_TEMP_DIR . 'test' . md5($data . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
            $filename2 = 'test' . md5($data . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
            QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
            return base_url("attachment/temp/" . $filename2);
        } else {

            //default data
            return 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';
            QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        }
    }


}

?>
