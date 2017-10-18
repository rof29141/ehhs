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

$project='Advanced Cosmetic Surgery';
$src_logo=ASSETS_URL.'/images/logo.png';//large logo
$src_logo1=ASSETS_URL.'/images/logo1.png';//short logo
$src_favico=ASSETS_URL.'/images/favicon/favicon.ico';

$email_from = 'dispatch-system@tekexperts.com';
$email_from_name = 'Advanced Cosmetic Surgery';
$email_test_to = 'raydel@mactutor.net';
$email_test_staff_to = 'raydel@mactutor.net';

$sess_array = array(
    'email_from' => $email_from,
    'email_from_name' => $email_from_name,
    'email_test_to' => $email_test_to,
    'email_test_staff_to' => $email_test_staff_to
);

$this->session->set_userdata('param_email_acs', $sess_array);
?>