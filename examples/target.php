<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 foldmethod=marker */

/**
 * Target blog.
 */

if (isset($_REQUEST['source'])) {
    highlight_file(__FILE__);
    die;
}

$pingbackURI = 'http://' .$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/receive.php';
?>
<!DOCTYPE html public "-//W3C//DTD XHTML 1.0 Strict//EN"
          "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
  <link rel="pingback" href="<?php print $pingbackURI ?>" />
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <title>Services_Pingback Test Target</title>
</head>
<body>
<p>What's up there, is it anyone link to me?</p>
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
