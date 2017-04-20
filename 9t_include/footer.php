<?php
/**
 * footer.php provides the right panel and footer for site pages
 *
 * @package Nine Thermidor (9t)
 * @author Mason Jensen <mason.jensen@hotmail.com>
 * @version 1.0 2009/07/12
 * @link http://www.spacemase.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see template.php
 * @see header.php
 */
?>
<!-- footer include starts here -->
  </div>

  <div id="footer">
    Today is <?php jdtofrench(unixtojd(DateTime::getTimestamp()));?><br />
    <a href="<?php echo VIRTUAL_PATH;?>main.php">Home</a> | 
    <a href="<?php echo VIRTUAL_PATH;?>publication.php">Pox Party</a> | 
    <a href="<?php echo VIRTUAL_PATH;?>dadascope.php">Dadascope</a> | 
    <a href="<?php echo VIRTUAL_PATH;?>nietzsche.php">What Would Nietzsche do?</a> | 
    <a href="<?php echo VIRTUAL_PATH;?>projects.php">Projects</a> | 
    <a href="<?php echo VIRTUAL_PATH;?>reviews.php">Reviews</a> | 
    <a href="<?php echo VIRTUAL_PATH;?>about.php">About</a> | 
    <a href="<?php echo VIRTUAL_PATH;?>contact.php">Contact</a>
  </div>

  <div id="copyright">
    &copy;NineThermidor <?php echo date('Y') ; ?>
  </div>

</div>

</body>
</html>
