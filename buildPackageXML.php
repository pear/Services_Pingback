<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 foldmethod=marker */
// $Id$

require_once 'PEAR/PackageFileManager2.php';
require_once 'PEAR/PackageFileManager/Cvs.php';

$pkg = new PEAR_PackageFileManager2;

$options = array(
    'simpleoutput'      => true,
    'baseinstalldir'    => '/',
    'packagedirectory'  => dirname(__FILE__),
    'pathtopackagefile' => basename(__FILE__),
    'filelistgenerator' => 'Cvs',
    'dir_roles'         => array(
        'docs'          => 'doc',
        'data'          => 'data'
    ),
    'ignore'            => array(
        'package.xml',
        'package2.xml',
        '*.tgz',
        basename(__FILE__)
    )
);

$pkg->setOptions($options);

$summary = <<<EOT
A Pingback User-Agent class.
EOT;

$desc = <<<EOT
A package implemented of Pingback in PHP, able to sending and receiving a pingback.
EOT;

$notes = <<<EOT
* Fixed bug #9506: Use HTTP_Request to know if an URI is valid (patch by Pablo Fischer <pfischer@php.net>)
EOT;

// Some hard-coded stuffs.
$pkg->setPackage('Services_Pingback');
$pkg->setSummary($summary);
$pkg->setDescription($desc);
$pkg->setChannel('pear.php.net');
$pkg->setAPIVersion('0.2');
$pkg->setReleaseVersion('0.2.1');
$pkg->setReleaseStability('alpha');
$pkg->setAPIStability('alpha');
$pkg->setNotes($notes);
$pkg->setPackageType('php');
$pkg->setLicense('BSD License', 'http://www.opensource.org/licenses/bsd-license.php');

// Add maintainers.
$pkg->addMaintainer('lead', 'firman', 'Firman Wandayandi', 'firman@php.net');
$pkg->addMaintainer('lead', 'freq', 'Farid Sadudin', 'farid.santi@gmail.com');

// Core dependencies.
$pkg->setPhpDep('4.3.0');
$pkg->setPearinstallerDep('1.4.0');

// Add package dependencies.
$pkg->addPackageDepWithChannel(
    'required', 'XML_RPC', 'pear.php.net', '1.0.3RC1'
);
$pkg->addPackageDepWithChannel(
    'required', 'HTTP_Request', 'pear.php.net', '1.2.4'
);
$pkg->addPackageDepWithChannel(
    'required', 'Net_URL', 'pear.php.net', '1.0.14'
);

// Add some replacements.
$pkg->addGlobalReplacement('package-info', '@package_version@', 'version');

// Generate file contents.
$pkg->generateContents();

// Writes a package.xml.
$e = $pkg->writePackageFile();

// Some errors occurs.
if (PEAR::isError($e)) {
    throw new Exception('Unable to write package file. Got message: ' . $e->getMessage());
}

/*
 * Local variables:
 * mode: php
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * End:
 */
?>