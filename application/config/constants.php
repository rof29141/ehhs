<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

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
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define('COMPANY', 'Esperanza Home Health Services, Inc.');
define('ADDRESS', '2700 N. Macdill Ave, Suite: 211, Tampa, FL, 33607');
define('EMAIL_FROM', 'no-reply@esperanzaehhs.com');
define('EMAIL_FROM_NAME', 'EHHS');
define('EMAIL_FROM_TO', 'rof29141@gmail.com');
define('EMAIL_FROM_STAFF_TO', 'rof29141@gmail.com');
$line_height='5px';
define('EMAIL_SIGNATURE', '<p style="line-height: '.$line_height.'; font-weight: bold;">Esperanza Home Health Services, Inc.</p>' .
							'<p style="line-height: '.$line_height.';">2700 N. Macdill Ave</p>' .
							'<p style="line-height: '.$line_height.';">Tampa, FL, 33607</p>' .
							'<p style="line-height: '.$line_height.';">Suite: 211</p>' .
							'<p style="line-height: '.$line_height.';">Phone: 813-374-0214 or 813-298-569</p>' .
							'<p style="line-height: '.$line_height.';">Fax: 813-374-029</p>' .
							'<br>' .
							'<a href="351face.com"><img src="cid:img_cid_0" alt="Esperanza Home Health Services, Inc." /></a>');
								
define('EMAIL_STYLE','<style>.btn.btn-success {padding: 10px 16px;padding-right: 16px;padding-left: 16px;font-size: 18px;line-height: 1.33;border-radius: 6px;border: 1px solid #63a042;background-color: #76b852;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.14), inset 0 1px 0 rgba(255, 255, 255, 0.2);text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);-webkit-transition: all 0.2s linear;-moz-transition: all 0.2s linear;-ms-transition: all 0.2s linear;-o-transition: all 0.2s linear;transition: all 0.2s linear;color: #fff;}.btn-success:hover{color: #fff;background-color: #3276b1;border-color: #285e8e;}</style>');