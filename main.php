<?php
/**
 * main.php is the main front page for the site
 *
 * @package Nine Thermidor (9t)
 * @author Mason Jensen <mason.jensen@hotmail.com>
 * @version 1.0 2009/07/12
 * @link http://www.spacemase.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see config.php
 * @see header.php
 * @see footer.php
 */

$PageTitle = 'Nine Thermidor' ;

require_once '/home/a5001834/public_html/9t_include/config.php' ;
require_once INCLUDE_PATH . 'header.php' ;
?>

    <h1 style="font-size:60px">You are invited</h1><br />

    <center>
      <img src="<?php echo IMAGE_PATH ; ?>postcard.jpg"><br />
      <br />
      <img src="<?php echo IMAGE_PATH ; ?>postcardback.jpg"><br />
      <br />
      <em>Dearly Departed</em> and <em>Extended Family</em> at <a href="http://www.shiftstudio.org">SHIFT Studio</a> on September 3rd, 5-9pm.<br />
      <br /><br />
    </center>

<?php require_once INCLUDE_PATH . 'footer.php' ; ?>
