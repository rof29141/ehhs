<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function GetSessionVars()
{
    $data='';
    $my_instance =& get_instance();

    if($my_instance->session->userdata('language'))
    {
        $session_lang = $my_instance->session->userdata('language');
        $data['caption_language'] = $session_lang['lang'];
    }
    else
        $data['caption_language']='english';

    $data['section_auth'] = '/authentication/Login.php';

    if($my_instance->session->userdata('logged_user_ehhs'))
    {
        $session_data = $my_instance->session->userdata('logged_user_ehhs');

        $data['id'] = $session_data['id'];
        $data['user_name'] = $session_data['user_name'];
        $data['bd_FirstName'] = $session_data['bd_FirstName'];
        $data['bd_LastName'] = $session_data['bd_LastName'];
        $data['email'] = $session_data['email'];
        $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];
        $data['PersonalContactInformationStatus'] = $session_data['PersonalContactInformationStatus'];
        $data['next_app_date'] = $session_data['next_app_date'];

        $data['privilegies'] = 'worker';

        $data['section_auth'] = '';

        $data['email_from'] = EMAIL_FROM;
        $data['email_from_name'] = EMAIL_FROM_NAME;
        $data['email_test_to'] = EMAIL_FROM_TO;
        $data['email_test_staff_to'] = EMAIL_FROM_STAFF_TO;
    }

    return $data;
}