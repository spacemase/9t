<?php
/**
 * config.php stores site-wide configuration settings, functions & file references
 *
 * require_once '/home/a5001834/9t_include/config.php' ;
 *
 * Less efficient, but prettier, you might use the document root env variable:
 * require_once $_SERVER['DOCUMENT_ROOT'] . '/9t_include/config.php' ;
 *
 * However this doesn't work on many servers.  I avoid attempting to change the INC path, as it doesn't work if
 * PHP is setup as a CGI (faster, more secure) instead of an Apache Module, which allows INC paths & PHP config via .htaccess.
 *
 * @package Nine Thermidor (9t)
 * @author Mason Jensen <mason.jensen@hotmail.com>
 * @version 1.0 2009/07/31
 * @link http://www.spacemase.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see common.php
 * @see conn_inc.php
 */
if( !isset( $PageTitle ) ) { $PageTitle = 'Nine Thermidor' ; }
define( 'HIDE_ALL_ERRORS', FALSE ) ;  # FALSE = CURRENTLY ALLOWING VISIBILITY OF SITE ERRORS
# more on error logging (and directory search): http://phr34k.com/secure/archives/category/php

/**
 * This buffers our page to be prevent header errors.
 * Call before INC files or ANY html!
 */
ob_start() ;

include_once 'common.php' ;
#include_once 'conn_inc.php' ;

/**
 * Set default date/time for this website.
 *
 * <code>
 *   date_default_timezone_set('UTC');
 * </code>
 */
date_default_timezone_set( 'America/Los_Angeles' ) ;

/**
 * Email of site support
 */
define( 'SUPPORT_EMAIL', 'mason.jensen@hotmail.com' ) ;

/**
 * Prefix to add uniqueness to mysql table names.  Maintains some sort of uniqueness to limit hackability, plus 
 * helps prevent collisions with other applications.  In order to use the prefix, add it to any tables & SQL statements.  
 */
define( 'PREFIX', '9t_' ) ;

/**
 * Path to PHP include files, which should be placed in a
 * folder outside the web root, with a permission of 0700 (recursive).
 */
define( 'INCLUDE_PATH', '/home/a5001834/public_html/9t_include/' ) ;

/**
 * Path to virtual 'root' of your application for file & upload reference
 */
define( 'IMAGE_PATH', '/home/a5001834/public_html/9t_images/' ) ;

/**
 * Path to virtual 'root' of your application for file & upload reference
 */
define( 'PHYSICAL_PATH', '/home/a5001834/public_html/9t/' ) ;

/**
 * Path to virtual 'root' of your application for JS & CSS files
 */
define( 'VIRTUAL_PATH', 'http://www.spacemase.com/9t/' ) ;

/**
 * If using default file system to save session data, identifies path to session storage folder. 
 * Folder should exist outside of the web root and have permissions set to 0700
 */
ini_set( 'session.save_path', '/home/a5001834/public_html/sessions' ) ;

/**
 * Save session data to db - part of nmSession package
 */  
//ini_set('session.use_trans_sid', false); # Turns off querystring session handling - off by default by PHP 4.3.4
//require_once 'session_db_inc.php'; # Session database handling include file
//session_set_save_handler('session_open', 'session_close', 'session_read', 'session_write', 'session_eliminate', 'session_clean');

/**
 * Pager class
 */
#include_once 'pager.php' ;

/**
 * Table Editor
 */
#define( 'TABLE_EDITOR', 'nmEdit.php' ) ;

/**
 * Admin login page
 */
define( 'ADMIN_LOGIN', VIRTUAL_PATH . 'admin_login.php' ) ;

/**
 * Admin login validation page
 */
define( 'ADMIN_VALIDATE', INCLUDE_PATH . 'admin_validate.php' ) ;

/**
 * Administrative (dashboard) page
 */
define( 'ADMIN_DASHBOARD', VIRTUAL_PATH . 'admin.php' ) ;

/**
 * Administrative logout file
 */
define( 'ADMIN_LOGOUT', INCLUDE_PATH . 'admin_logout.php' ) ;

/**
 * Add administrators here
 */
define( 'ADMIN_ADD', 'admin_add.php' ) ;

/**
 * Reset admin passwords here
 */
define( 'ADMIN_RESET', 'admin_reset.php' ) ;

/**
 * Path to location where to (optionally) store log files
 *
 * We could store log files to capture PHP errors, hack attempts or 
 * benchmarking results.
 */
#define( 'LOG_PATH', '/home/a5001834/public_html/9t_log/' ) ;

/**
 * Error logging section.  
 *
 * If PHP errors are shut off, we can still view these errors via the error_log 
 * file.  To do this, create a folder outside the web root, with a permission of 0700 (recursive).
 * 
 * Using LOG_PATH and the ini_set command 'log_errors' is set to "1" (on) we can 
 * view errors live via the command line, and the 'tail' command:
 *
 * <code>
 * tail -f error_log
 * </code>
 *
 * This will allow you to view the latest errors added to the error_log file as they are added.
 */
#ini_set('log_errors', 1); # 1 turns on error logging, 0 shuts it off
#ini_set('error_log', LOG_PATH . 'error_log'); #places PHP errors into a folder at this location

/**
 * Replace default PHP error handler with ours.  If we over-ride the default error handler with 
 * our own.
 *
 * None of our error reporting settings will matter if 'display_errors' is off' in the PHP.INI file. 
 * To determine, view phpInfo().  If it is, we can only view error logs.
 */
#set_error_handler( 'myErrorHandler' ) ;

/**
 * We can undo our over-ride of the error handler by commenting the set_error_handler() line above 
 * and uncomment the following two lines of code.  
 * 
 * We can un-comment the lines below to either see default errors (1) or shut off visual errors completely (0). 
 * Shutting off all errors could be appropriate for a production enviroment.
 */
ini_set( 'error_reporting', E_ALL | E_STRICT ) ;
ini_set( 'display_errors', 1 ) ;  # 1 turns on error reporting, 0 shuts it off

/**
 * Overrides PHP's default error handler
 *
 * Inherits error info from default handler and allows us to display
 * custom error messages if these boolean constants are both true:
 *
 * 1 HIDE_ALL_ERRORS 
 * 2 HIDE_PAGE_ERRORS
 *
 * The first comes from this file, the second must be in the calling page
 *   
 * @param string $e_number error number provided by PHP error handler
 * @param string $e_message error message provided by PHP error handler
 * @param string $e_file file name provided by PHP error handler
 * @param string $e_line line number of error provided by PHP error handler
 * @param array $e_vars variables present at time of error 
 * @return void
 * @todo error logging, or emailing admin not implemented
 */
function myErrorHandler ($e_number, $e_message, $e_file, $e_line, $e_vars)
{
	static $counter = 0; # Will identify if myError() was called more than once
	$counter++;
	if (HIDE_ALL_ERRORS || HIDE_PAGE_ERRORS)
	{# Display generic error message, with support email from config file
		if($counter < 2) { printUserError($e_file,$e_line); } #only print one error message to user
	}else{# Show errors directly on page.  (troubleshooting purposes only!)
		printDeveloperError($e_file,$e_line,$e_message,$counter); 
	}
}# End myErrorHandler()

/**
 * Create an error code out of the file name and line number of our error
 *
 * Will make upper case, strip out the vowels and create an 
 * error of the file name (minus extension & vowels) + "x" + line number of error
 *
 * Will also replace any underscores with "x". This file would be:
 *
 * Example: CNFGxNCx41
 * 
 * The above would be the example for this file, plus an error at line 41
 * This allows a user to report an error that identifies it, without compromising site security
 *
 * @param string $myFile file name provided by PHP error handler
 * @param string $myLine line number of error provided by PHP error handler
 * @return string File name and line number of error disguised vaguely as an error code
 * @see printUserError() 
 * @todo none
 */
function createErrorCode($myFile,$myLine)
{
	$mySlash = strrpos($myFile,"/"); //find position of last slash in path
	$myFile = substr($myFile,$mySlash + 1);  //strip off all but file name
	$myFile = substr($myFile, 0, strripos($myFile, '.'));//remove extension
	$myFile = strtoupper($myFile); //change to upper case
	$vowels = array("A", "E", "I", "O", "U", "Y");  //array of vowels to remove
	$myFile = str_replace($vowels, "", $myFile); //remove vowels
	$myFile = str_replace("_", "x", $myFile); //replace underscore with "x"
	return $myFile . "x" . $myLine;  //CNFGNCx50
}# End createErrorCode()

/**
 * Prints a customized public error message
 *
 * Will use a custom error code created by calling 
 * createErrorCode() function, and display it to the user
 *  
 * @param string $myFile file name provided by PHP error handler
 * @param string $myLine line number of error provided by PHP error handler
 * @return void
 * @see createErrorCode()
 * @see printDeveloperError()  
 * @todo none
 */
function printUserError($myFile,$myLine)
{
	$errorCode = createErrorCode($myFile,$myLine); //Create error code out of file name & line number
	echo '<h2 align="center">Our page has encountered an error!</h2>';
	echo '<table align="center" width="50%" style="border:#F00 1px solid;"><tr><td align="center">';
	echo 'Please try again, or email support at <strong>' . SUPPORT_EMAIL . '</strong>,<br /> and let us know you are receiving ';
	echo 'the following Error Code: <strong>' . $errorCode . '</strong><br />';
	echo 'This will help us identify the problem, and fix it as quickly as possible.<br />';
	echo 'Thank you for your assistance and understanding!<br />';
	echo 'Sincerely,<br />Support Staff<br />';
	echo '<a href="index.php">Exit</a></td></tr></table>';
	if (file_exists(INCLUDE_PATH . 'footer_inc.php')) {include_once INCLUDE_PATH . 'footer_inc.php';}
	die(); #one error is enough!
}# End printUserError()

/**
 * Prints a customized developer error message
 *
 * This is what a developer will see when an error occurs
 *  
 * @param string $myFile file name provided by PHP error handler
 * @param string $myLine line number of error provided by PHP error handler
 * @param string $errorMsg error text provided by mysql_error() or developer, etc.
 * @param array|string $vars array dump of page variables, if available  
 * @return void
 * @see printUserError() 
 * @todo none
 */
function printDeveloperError($myFile,$myLine,$errorMsg,$counter)
{
	# Build the error message.
	echo '<div class="error">';  # No body or closing HTML allows multiple errors to show
	echo 'Error in file: <strong>\'' . $myFile . '\'</strong> on line: <font color="blue"><strong>' . $myLine . '</strong></font> '; 
	echo 'Error message: <font color="red"><strong>' . $errorMsg . '</strong></font><br /><br />';
	
	 #only print one instance of backtrace of debug data:
	if($counter < 2) { echo 'BackTrace: <font color="purple"><pre>' . print_r(debug_backtrace(),1) . '</pre></font><br /><br />'; }
	echo '</div><br />'; 
	
} #End printDeveloperError()
?>
