<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 foldmethod=marker */

/**
 * Services_Pingback send example.
 */

if (isset($_REQUEST['source'])) {
    highlight_file(__FILE__);
    die;
}


// Load Services_Pingback
require_once 'Services/Pingback.php';

// Setting up URIs
$selfURI = 'http://' .$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$sourceURI = 'http://' .$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/source.php';
$targetURI = 'http://' .$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/target.php';

// let's assume that we don't know this pingback URI, to test
// Services_Pingback::autoDiscover() method.
$pingbackURI = 'http://' .$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/receive.php';

$options = array(
    'debug' => true
);

$data = array(
    'sourceURI' => $sourceURI,
    'targetURI' => $targetURI
);

$pingback = new Services_Pingback($data, $options);

print '<h2>Services_Pingback Example</h2>' . "\n" .
      'Sources: ' .
      '<a href="' . $selfURI . '?source" target="_blank">send.php</a> | ' .
      '<a href="' . $pingbackURI . '?source" target="_blank">receive.php</a> | ' .
      '<a href="' . $sourceURI . '?source" target="_blank">source.php</a> | ' .
      '<a href="' . $targetURI . '?source" target="_blank">target.php</a>' .
      '<hr />' . "\n" .
      '<strong>source URI</strong>: <a href="' . $sourceURI . '" target="_blank">' . $sourceURI . "</a><br />\n" .
      '<strong>target URI</strong>: <a href="' . $targetURI . '" target="_blank">' . $targetURI . "</a><br />\n";

print '<strong>------------------------- Sending Pingback --------------------------</strong>' . "<br />\n";
$res = $pingback->send();

print '<strong>------------------------- Received Response -------------------------</strong>' . "<br />\n";
if (PEAR::isError($res)) {
    $response = $res->getMessage();
} else {
    $response = $res;
}
print '<strong>Response</strong>: ' . $response;

/*
 * Local variables:
 * mode: php
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * End:
 */
?>
