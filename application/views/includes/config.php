<?php
$directory = realpath(dirname(__FILE__));
$document_root = realpath($_SERVER['DOCUMENT_ROOT']);

$base_url = base_url();
if(strpos($directory, $document_root)===0)
{
    $base_url .= str_replace(DIRECTORY_SEPARATOR, '/', substr($directory, strlen($document_root)));
}

defined("CTR_URL") ? null : define("CTR_URL", base_url());
defined("ASSETS_URL") ? null : define("ASSETS_URL", base_url('assets'));
defined("VIEW_URL") ? null : define("VIEW_URL", APPPATH."views/");

$project='EHHS';
$src_logo=ASSETS_URL.'/images/logo.png';//large logo
$src_logo1=ASSETS_URL.'/images/logo1.png';//short logo
$src_favico=ASSETS_URL.'/images/icon.ico';
?>





