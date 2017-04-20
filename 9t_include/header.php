<?php
/**
 * header.php provides the initial HTML, banner, and left panel for site files
 *
 * @package Nine Thermidor (9t)
 * @author Mason Jensen <mason.jensen@hotmail.com>
 * @version 1.0 2009/07/12
 * @link http://www.spacemase.com/  
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see template.php
 * @see footer.php
 */
if ( !isset( $PageTitle ) ) $PageTitle = "Nine Thermidor" ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?=$PageTitle;?></title>
  <meta name="author" content="Mason Jensen" />
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta http-equiv="content-script-type" content="text/javascript;charset=utf-8" />
  <meta http-equiv="content-style-type" content="text/css;charset=utf-8" />
  <meta http-equiv="Cache-Control" content="no-cache" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="-1" />
  <script><![CDATA[
    //this disallows hijacking into someone else's frame
    if (top.location != self.location){top.location=self.location;}

    function external_links()
    {
      if ( !document.getElementsByTagName ) return ;
      var anchors = document.getElementsByTagName( "a" ) ;
      for ( var i=0; i<anchors.length; i++ )
      {
        var anchor = anchors[i] ;
        if ( anchor.getAttribute( "href" ) && anchor.getAttribute( "rel" ) == "external" )
          anchor.target = "_blank" ;
      }
    }
    //this allows links to open in new windows in strict xhtml dtd
    window.onload = external_links ;
  //]]></script>

  <link type="text/css" href="<?php echo VIRTUAL_PATH;?>styles.css" rel="stylesheet" />
  <!-- <style type="text/css" media="screen">@import url("inc_9t/styles.css");</style> -->
  <link rel="shortcut icon" href="<?php echo VIRTUAL_PATH;?>favicon.ico" type="image/vnd.microsoft.icon" />
</head>
<body>

<div id="container">

  <div id="header">
    <h1>Nine Thermidor</h1>
  </div>

  <div id="MainMenu">
    <div id="tab">
      <ul>
        <li><a href="<?php echo VIRTUAL_PATH;?>main.php"><span>Home</span></a></li>
        <li><a href="<?php echo VIRTUAL_PATH;?>publication.php"><span>Pox Party</span></a></li>
        <li><a href="<?php echo VIRTUAL_PATH;?>dadascope.php"><span>Dadascope</span></a></li>
        <li><a href="<?php echo VIRTUAL_PATH;?>nietzsche.php"><span>What Would Nietzsche do?</span></a></li>
        <li><a href="<?php echo VIRTUAL_PATH;?>projects.php"><span>Projects</span></a></li>
        <li><a href="<?php echo VIRTUAL_PATH;?>reviews.php"><span>Reviews</span></a></li>
        <li><a href="<?php echo VIRTUAL_PATH;?>about.php"><span>About</span></a></li>
        <li><a href="<?php echo VIRTUAL_PATH;?>contact.php"><span>Contact</span></a></li>
      </ul>
    </div>
  </div>

  <div id="content">
<!-- end of header include file -->
