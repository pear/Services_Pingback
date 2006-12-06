<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 foldmethod=marker */

/**
 * Source blog.
 */

if (isset($_REQUEST['source'])) {
    highlight_file(__FILE__);
    die;
}

$targetURI = 'http://' .$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/target.php';
//$targetURI = 'http://localhost/tests/blog/wordpress/?p=1';
?>
<!DOCTYPE html public "-//W3C//DTD XHTML 1.0 Strict//EN"
          "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <title>Service_Pingback Test Source</title>
</head>
<body>
<p>Try to send pingback call to <a href="<?php print $targetURI ?>"><?php print $targetURI ?></a>
   and see what happen.</p>
</body>
</html>
<?php

/*
 * Local variables:
 * mode: php
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * End:
 */
?>
