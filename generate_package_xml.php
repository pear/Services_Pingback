<?php
require_once('PEAR/PackageFileManager.php');

$pkg = new PEAR_PackageFileManager;

$packagedir = dirname(__FILE__);
$self = basename(__FILE__);

$desc = "A package implemented of Pingback in PHP, able to sending and receiving a pingback.";

$options = array(
    'doctype'           => 'D:\Net\www\htdocs\PEAR\PEAR\data\PEAR\package.dtd',
    'package'           => 'Services_Pingback',
    'license'           => 'BSD License',
    'baseinstalldir'    => '',
    'version'           => '0.2.0dev2',
    'packagedirectory'  => $packagedir,
    'pathtopackagefile' => $packagedir,
    'state'             => 'devel',
    'filelistgenerator' => 'file',
    'notes'             => 'Initial release of Services_Pingback',
    'summary'           => 'A Pingback User-Agent class.',
    'description'       => $desc,
    'ignore'            => array(
                            'package.xml',
                            '*.tgz',
                            $self
                           )
);

$e = $pkg->setOptions($options);
if (PEAR::isError($e)) {
    echo $e->getMessage();
    die;
}

// hack until they get their shit in line with docroot role
$pkg->addRole('tpl', 'php');
$pkg->addRole('png', 'php');
$pkg->addRole('gif', 'php');
$pkg->addRole('jpg', 'php');
$pkg->addRole('css', 'php');
$pkg->addRole('js', 'php');
$pkg->addRole('ini', 'php');
$pkg->addRole('inc', 'php');
$pkg->addRole('afm', 'php');
$pkg->addRole('pkg', 'doc');
$pkg->addRole('cls', 'doc');
$pkg->addRole('proc', 'doc');
$pkg->addRole('txt', 'doc');
$pkg->addRole('sh', 'script');

$pkg->addMaintainer('firman', 'lead', 'Firman Wandayandi', 'firman@php.net');

$pkg->addDependency('XML_RPC', '1.0.3RC1', 'ge', 'pkg');
$pkg->addDependency('Net_URL', '1.0.14', 'ge', 'pkg');
$pkg->addDependency('HTTP_Request', '1.2.4', 'ge', 'pkg');
$pkg->addDependency('PHP', '4.3.0', 'ge', 'php');

$pkg->addReplacement('Services/Pingback.php', 'package-info',
                     '@package_version@', 'version');

$e = $pkg->writePackageFile();
if (PEAR::isError($e)) {
    echo $e->getMessage();
}
?>
