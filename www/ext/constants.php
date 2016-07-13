<?php

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
// define('FILE_READ_MODE', 0644);
// define('FILE_WRITE_MODE', 0666);
// define('DIR_READ_MODE', 0755);
// define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

// define('FOPEN_READ',							'rb');
// define('FOPEN_READ_WRITE',						'r+b');
// define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
// define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
// define('FOPEN_WRITE_CREATE',					'ab');
// define('FOPEN_READ_WRITE_CREATE',				'a+b');
// define('FOPEN_WRITE_CREATE_STRICT',				'xb');
// define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


defined('DOMAIN') or define('DOMAIN', '');
defined('ROOT') or define('ROOT', '.');
defined('PREVIEW') or define('PREVIEW', 'http://');
defined('LAWYER') or define('LAWYER', 'http://127.0.0.10');
defined('LINES') or define('LINES', 'https://www.maijinwang.com');
defined('SYSBK') or define('SYSBK', 'https://sys.maijinwang.com');
defined('tjprice') or define('tjprice',5);	// 普通提金费
defined('tjprice2') or define('tjprice2',10);	// 3g提金费
defined('TJPRICE3') or define('TJPRICE3',35);	// 迷你金提金费
defined('TJPRICE4') or define('TJPRICE4',50);	// 金钞提金费
defined('TJPRICE5') or define('TJPRICE5',5*0.7);	// 原料金提金费
defined('codekey') or define('codekey','majin1014');
defined('SITELOCAL') or define('SITELOCAL', 'preview');
/* End of file constants.php */
