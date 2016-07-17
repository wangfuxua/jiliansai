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
class ChineseSpell {

/**
* @var array $chineseSpellList 拼音编码对应表
* @access private
*/
private $chineseSpellList = array(
	'A'=>-20319,'Ai'=>-20317,'An'=>-20304,'Ang'=>-20295,'Ao'=>-20292,'Ba'=>-20283,'Bai'=>-20265,'Ban'=>-20257,'Bang'=>-20242,'Bao'=>-20230,'Bei'=>-20051,'Ben'=>-20036,'Beng'=>-20032,'Bi'=>-20026,'Bian'=>-20002,'Biao'=>-19990,'Bie'=>-19986,'Bin'=>-19982,'Bing'=>-19976,'Bo'=>-19805,'Bu'=>-19784,'Ca'=>-19775,'Cai'=>-19774,'Can'=>-19763,'Cang'=>-19756,'Cao'=>-19751,'Ce'=>-19746,'Ceng'=>-19741,'Cha'=>-19739,'Chai'=>-19728,'Chan'=>-19725,'Chang'=>-19715,'Chao'=>-19540,'Che'=>-19531,'Chen'=>-19525,'Cheng'=>-19515,'Chi'=>-19500,'Chong'=>-19484,'Chou'=>-19479,'Chu'=>-19467,'Chuai'=>-19289,'Chuan'=>-19288,'Chuang'=>-19281,'Chui'=>-19275,'Chun'=>-19270,'Chuo'=>-19263,'Ci'=>-19261,'Cong'=>-19249,'Cou'=>-19243,'Cu'=>-19242,'Cuan'=>-19238,'Cui'=>-19235,'Cun'=>-19227,'Cuo'=>-19224,'Da'=>-19218,'Dai'=>-19212,'Dan'=>-19038,'Dang'=>-19023,'Dao'=>-19018,'De'=>-19006,'Deng'=>-19003,'Di'=>-18996,'Dian'=>-18977,'Diao'=>-18961,'Die'=>-18952,'Ding'=>-18783,'Diu'=>-18774,'Dong'=>-18773,'Dou'=>-18763,'Du'=>-18756,'Duan'=>-18741,'Dui'=>-18735,'Dun'=>-18731,'Duo'=>-18722,'E'=>-18710,'En'=>-18697,'Er'=>-18696,'Fa'=>-18526,'Fan'=>-18518,'Fang'=>-18501,'Fei'=>-18490,'Fen'=>-18478,'Feng'=>-18463,'Fo'=>-18448,'Fou'=>-18447,'Fu'=>-18446,'Ga'=>-18239,'Gai'=>-18237,'Gan'=>-18231,'Gang'=>-18220,'Gao'=>-18211,'Ge'=>-18201,'Gei'=>-18184,'Gen'=>-18183,'Geng'=>-18181,'Gong'=>-18012,'Gou'=>-17997,'Gu'=>-17988,'Gua'=>-17970,'Guai'=>-17964,'Guan'=>-17961,'Guang'=>-17950,'Gui'=>-17947,'Gun'=>-17931,'Guo'=>-17928,'Ha'=>-17922,'Hai'=>-17759,'Han'=>-17752,'Hang'=>-17733,'Hao'=>-17730,'He'=>-17721,'Hei'=>-17703,'Hen'=>-17701,'Heng'=>-17697,'Hong'=>-17692,'Hou'=>-17683,'Hu'=>-17676,'Hua'=>-17496,'Huai'=>-17487,'Huan'=>-17482,'Huang'=>-17468,'Hui'=>-17454,'Hun'=>-17433,'Huo'=>-17427,'Ji'=>-17417,'Jia'=>-17202,'Jian'=>-17185,'Jiang'=>-16983,'Jiao'=>-16970,'Jie'=>-16942,'Jin'=>-16915,'Jing'=>-16733,'Jiong'=>-16708,'Jiu'=>-16706,'Ju'=>-16689,'Juan'=>-16664,'Jue'=>-16657,'Jun'=>-16647,'Ka'=>-16474,'Kai'=>-16470,'Kan'=>-16465,'Kang'=>-16459,'Kao'=>-16452,'Ke'=>-16448,'Ken'=>-16433,'Keng'=>-16429,'Kong'=>-16427,'Kou'=>-16423,'Ku'=>-16419,'Kua'=>-16412,'Kuai'=>-16407,'Kuan'=>-16403,'Kuang'=>-16401,'Kui'=>-16393,'Kun'=>-16220,'Kuo'=>-16216,'La'=>-16212,'Lai'=>-16205,'Lan'=>-16202,'Lang'=>-16187,'Lao'=>-16180,'Le'=>-16171,'Lei'=>-16169,'Leng'=>-16158,'Li'=>-16155,'Lia'=>-15959,'Lian'=>-15958,'Liang'=>-15944,'Liao'=>-15933,'Lie'=>-15920,'Lin'=>-15915,'Ling'=>-15903,'Liu'=>-15889,'Long'=>-15878,'Lou'=>-15707,'Lu'=>-15701,'Lv'=>-15681,'Luan'=>-15667,'Lue'=>-15661,'Lun'=>-15659,'Luo'=>-15652,'Ma'=>-15640,'Mai'=>-15631,'Man'=>-15625,'Mang'=>-15454,'Mao'=>-15448,'Me'=>-15436,'Mei'=>-15435,'Men'=>-15419,'Meng'=>-15416,'Mi'=>-15408,'Mian'=>-15394,'Miao'=>-15385,'Mie'=>-15377,'Min'=>-15375,'Ming'=>-15369,'Miu'=>-15363,'Mo'=>-15362,'Mou'=>-15183,'Mu'=>-15180,'Na'=>-15165,'Nai'=>-15158,'Nan'=>-15153,'Nang'=>-15150,'Nao'=>-15149,'Ne'=>-15144,'Nei'=>-15143,'Nen'=>-15141,'Neng'=>-15140,'Ni'=>-15139,'Nian'=>-15128,'Niang'=>-15121,'Niao'=>-15119,'Nie'=>-15117,'Nin'=>-15110,'Ning'=>-15109,'Niu'=>-14941,'Nong'=>-14937,'Nu'=>-14933,'Nv'=>-14930,'Nuan'=>-14929,'Nue'=>-14928,'Nuo'=>-14926,'O'=>-14922,'Ou'=>-14921,'Pa'=>-14914,'Pai'=>-14908,'Pan'=>-14902,'Pang'=>-14894,'Pao'=>-14889,'Pei'=>-14882,'Pen'=>-14873,'Peng'=>-14871,'Pi'=>-14857,'Pian'=>-14678,'Piao'=>-14674,'Pie'=>-14670,'Pin'=>-14668,'Ping'=>-14663,'Po'=>-14654,'Pu'=>-14645,'Qi'=>-14630,'Qia'=>-14594,'Qian'=>-14429,'Qiang'=>-14407,'Qiao'=>-14399,'Qie'=>-14384,'Qin'=>-14379,'Qing'=>-14368,'Qiong'=>-14355,'Qiu'=>-14353,'Qu'=>-14345,'Quan'=>-14170,'Que'=>-14159,'Qun'=>-14151,'Ran'=>-14149,'Rang'=>-14145,'Rao'=>-14140,'Re'=>-14137,'Ren'=>-14135,'Reng'=>-14125,'Ri'=>-14123,'Rong'=>-14122,'Rou'=>-14112,'Ru'=>-14109,'Ruan'=>-14099,'Rui'=>-14097,'Run'=>-14094,'Ruo'=>-14092,'Sa'=>-14090,'Sai'=>-14087,'San'=>-14083,'Sang'=>-13917,'Sao'=>-13914,'Se'=>-13910,'Sen'=>-13907,'Seng'=>-13906,'Sha'=>-13905,'Shai'=>-13896,'Shan'=>-13894,'Shang'=>-13878,'Shao'=>-13870,'She'=>-13859,'Shen'=>-13847,'Sheng'=>-13831,'Shi'=>-13658,'Shou'=>-13611,'Shu'=>-13601,'Shua'=>-13406,'Shuai'=>-13404,'Shuan'=>-13400,'Shuang'=>-13398,'Shui'=>-13395,'Shun'=>-13391,'Shuo'=>-13387,'Si'=>-13383,'Song'=>-13367,'Sou'=>-13359,'Su'=>-13356,'Suan'=>-13343,'Sui'=>-13340,'Sun'=>-13329,'Suo'=>-13326,'Ta'=>-13318,'Tai'=>-13147,'Tan'=>-13138,'Tang'=>-13120,'Tao'=>-13107,'Te'=>-13096,'Teng'=>-13095,'Ti'=>-13091,'Tian'=>-13076,'Tiao'=>-13068,'Tie'=>-13063,'Ting'=>-13060,'Tong'=>-12888,'Tou'=>-12875,'Tu'=>-12871,'Tuan'=>-12860,'Tui'=>-12858,'Tun'=>-12852,'Tuo'=>-12849,'Wa'=>-12838,'Wai'=>-12831,'Wan'=>-12829,'Wang'=>-12812,'Wei'=>-12802,'Wen'=>-12607,'Weng'=>-12597,'Wo'=>-12594,'Wu'=>-12585,'Xi'=>-12556,'Xia'=>-12359,'Xian'=>-12346,'Xiang'=>-12320,'Xiao'=>-12300,'Xie'=>-12120,'Xin'=>-12099,'Xing'=>-12089,'Xiong'=>-12074,'Xiu'=>-12067,'Xu'=>-12058,'Xuan'=>-12039,'Xue'=>-11867,'Xun'=>-11861,'Ya'=>-11847,'Yan'=>-11831,'Yang'=>-11798,'Yao'=>-11781,'Ye'=>-11604,'Yi'=>-11589,'Yin'=>-11536,'Ying'=>-11358,'Yo'=>-11340,'Yong'=>-11339,'You'=>-11324,'Yu'=>-11303,'Yuan'=>-11097,'Yue'=>-11077,'Yun'=>-11067,'Za'=>-11055,'Zai'=>-11052,'Zan'=>-11045,'Zang'=>-11041,'Zao'=>-11038,'Ze'=>-11024,'Zei'=>-11020,'Zen'=>-11019,'Zeng'=>-11018,'Zha'=>-11014,'Zhai'=>-10838,'Zhan'=>-10832,'Zhang'=>-10815,'Zhao'=>-10800,'Zhe'=>-10790,'Zhen'=>-10780,'Zheng'=>-10764,'Zhi'=>-10587,'Zhong'=>-10544,'Zhou'=>-10533,'Zhu'=>-10519,'Zhua'=>-10331,'Zhuai'=>-10329,'Zhuan'=>-10328,'Zhuang'=>-10322,'Zhui'=>-10315,'Zhun'=>-10309,'Zhuo'=>-10307,'Zi'=>-10296,'Zong'=>-10281,'Zou'=>-10274,'Zu'=>-10270,'Zuan'=>-10262,'Zui'=>-10260,'Zun'=>-10256,'Zuo'=>-10254
	);

	/**
	 * 取汉字所有拼音
	 * @param string $chinese 要转换的汉字
	 * @param string $delimiter 分隔符
	 * @param int $length 返回的长度
	 * @return string
	 */
	public function getFullSpell($chinese, $delimiter = ' ', $length = 0) {
		$chinese = $this->checkAndSetChar($chinese);
		$spell = $this->getChineseSpells($chinese, $delimiter);
		if ($length) {
			$spell = substr($spell, 0, $length);
		}
		return $spell;
	}

	/**
	 * 取汉字第一个拼音
	 * @param string $chinese 要转换的汉字
	 * @param int $length 返回的长度
	 * @return string
	 */
	public function getFirstSpell($chinese, $delimiter = ' ', $length = 0) {
		$chinese = $this->checkAndSetChar($chinese);
		$spell = $this->getChineseSpells($chinese, $delimiter, 1);
		if ($length) {
			$spell = substr($spell, 0, $length);
		}
		return $spell;
	}

	private function checkAndSetChar($str) {
		if (!$this->isUTF8($str)) {
			return $str;
		}
		return $this->utf82gb($str);
	}

	/**
	 * 取一个汉字码对应的拼音
	 * @param int $num 汉字码
	 * @param string $blank 空白字符
	 * @return string
	 */
	private function getChineseSpell($num, $first, $blank = '') {
		if ( $num>0 && $num<160 ) {
			return chr($num);
		} elseif ($num<-20319||$num>-10247) {
			return $blank;
		} else {
			foreach ($this->chineseSpellList as $spell => $code) {
				if ($code > $num) break;
				$result = $spell;
				if (!!$first)
					$result = substr($result, 0, $first);
			}
			return $result;
		}
	}

	/**
	 * 取汉字拼音
	 * @param string $chinese 要转换的汉字
	 * @param string $delimiter 分隔符
	 * @param int $first 要返回第几个字母，默认0是所有
	 * @return string
	 */
	private function getChineseSpells($chinese, $delimiter = ' ', $first=0) {
		$result = array();
		for ($i=0; $i<strlen($chinese); $i++) {
			$p = ord(substr($chinese,$i,1));
			if ($p>160) {
				$q = ord(substr($chinese,++$i,1));
				$p = $p*256 + $q - 65536;
			}
			$result[] = $this->getChineseSpell($p, $first);
		}
		return implode($delimiter, $result);
	}

	/**
	 * 判断字符串是不是UTF8编码
	 * @param  string  $string 要判断的字符串
	 * @return boolean       返回真假
	 */
	private function isUTF8($string) {
		if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$string) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$string) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$string) == true) {
			return true;
		} else {
			return false;
		}
	}


	/**
	 * 将utf8字体转换成gb
	 * @param  string $utfstr 要转换的汉字
	 * @return string         转换后的gb汉字
	 */
	private function utf82gb($utfstr){ // UTF-8汉字转GBK汉字
		if(function_exists('iconv')){ return iconv('utf-8','gbk',$utfstr); }
		global $UC2GBTABLE;
		$okstr = "";
		if(trim($utfstr)=="") return $utfstr;
		if(empty($UC2GBTABLE)){
			$filename = dirname(__FILE__) . "/gb2312-utf8.table";
			$fp = fopen($filename,"r");
			while($l = fgets($fp,15))
				{ $UC2GBTABLE[hexdec(substr($l, 7, 6))] = hexdec(substr($l, 0, 6));}
			fclose($fp);
		}
		$okstr = "";
		$ulen = strlen($utfstr);
		for($i=0;$i<$ulen;$i++)
		{
			$c = $utfstr[$i];
			$cb = decbin(ord($utfstr[$i]));
			if(strlen($cb)==8){ 
				$csize = strpos(decbin(ord($cb)),"0");
				for($j=0;$j < $csize;$j++){
					$i++; $c .= $utfstr[$i];
				}
				$c = utf82u($c);
				if(isset($UC2GBTABLE[$c])){
					$c = dechex($UC2GBTABLE[$c]+0x8080);
					$okstr .= chr(hexdec($c[0].$c[1])).chr(hexdec($c[2].$c[3]));
				}
				else
					{ $okstr .= "&#".$c.";";}
			}
			else $okstr .= $c;
		}
		$okstr = trim($okstr);
		// echo $okstr; exit;
		return $okstr;
	}

}
?>