<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 foldmethod=marker */

/**
 * Services_Pingback receive example.
 */

if (isset($_REQUEST['source'])) {
    highlight_file(__FILE__);
    die;
}

// Load Services_Pingback.
require_once 'Services/Pingback.php';

// Receive pingback call.
$pingback = new Services_Pingback;

// Turn on debug mode.
# $pingback->setOptions(array('debug' => true));

$pingback->receive();


print "\n" . '------------------------ Context -------------------------' . "\n";
print '<!--' . "\n";
$context = $pingback->getSourceContext();
foreach ($context as $key => $value) {
    print "$key = $value\n";
}
print '-->' . "\n";
print '------------------------ Context -------------------------' . "\n";

/*
 * Local variables:
 * mode: php
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * End:
 */
?>
