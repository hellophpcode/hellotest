<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
define('GOOGLE_CLIENT_ID','812340236386-pqospdvrod9mju6egd56o10qbbccndgc.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'lOhUK5OQn_8ASXvEIR1SCtqy');
define('GOOGLE_API_KEY', 'AIzaSyCb7rD0iHkJT9BbEHBGImd1aSJJ_n7oLO8');
define('GOOGLE_REDIRECT_URI','http://calendar.cwsdev3.biz/calendar/');
define('ASSETS_PATH','/calendar/assets/');
define('ASSETS_PATH_IMAGE', ASSETS_PATH.'images/');
define('ASSETS_PATH_CSS', ASSETS_PATH.'css/');
define('ASSETS_PATH_JS', ASSETS_PATH.'js/');

/* End of file constants.php */
/* Location: ./application/config/constants.php */