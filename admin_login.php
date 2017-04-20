<?php
/**
 * admin_login.php entry point (form) page to administrative area
 * Works with admin_validate.php to process administrator login requests.
 * Forwards user to admin.php, upon successful login.
 *
 * @package Nine Thermidor (9t)
 * @author Mason Jensen <mason.jensen@hotmail.com>
 * @version 1.0 2009/08/30
 * @link http://www.spacemase.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see admin_validate.php
 * @see admin.php
 * @see admin_logout.php
 * @see admin_only.php
 */
$PageTitle = 'Nine Thermidor | Administrative Login' ;
require_once '/home/a5001834/public_html/9t_include/config.php' ;
$feedback = '' ;  # initialize feedback

if ( isset( $_GET['msg'] ) )
{
  switch ( $_GET['msg'] )
  {
    case 1:
      $feedback = 'You have successfully logged out!' ;
      break ;
    case 2:
      $feedback = 'Your login or password are incorrect. Please try again or email support.' ;
      break ;
    case 3:
      $feedback = 'You failed to enter your email or password. Please try again.' ;
      break ;
    case 4:
      $feedback = 'An error has occurred during login. Please advise support you received error DMNLGNx' . __LINE__ ;
      break ;
    case 5:
      $feedback = 'Your login information has timed out. Please login again.' ;
      break ;
    default:
      $feedback = '' ;
  }
}

if ( $feedback != '')
{ // Fill out feedback HTML
  $feedback = '<div align="center"><h4><font color="red">' . $feedback . '</font></h4></div>' ;
}

include_once INCLUDE_PATH . 'header.php' ;
?>
  <div align="center"><h3>Admin Login</h3></div>
  <?php echo $feedback; #feedback, if any, provided here ?>
  <table align="center">
    <form action="<? print ADMIN_VALIDATE;?>" method="post">
      <tr><td align="right">Email:</td><td><input type="text" size="25" maxlength="60" name="em" /></td></tr>
      <tr><td align="right">Password:</td><td><input type="password" size="25" maxlength="25" name="pw" /></td></tr>
      <tr><td align="center" colspan="2"><input type="submit" value="login"></td></tr>
    </form>
  </table>
<?php
include_once INCLUDE_PATH . 'footer.php' ;
?>
