<?php
class MT_Language
{
    public function __construct()
    {

    }

    function LoadLanguage()
    {
        $my_instance =& get_instance();

        if($my_instance->session->userdata('language'))
        {
            $session_lang = $my_instance->session->userdata('language');
            $language = $session_lang['lang'];
        }
        else
            $language='english';

        //echo $language;//die();

        $my_instance->lang->load('form_label', $language);
        $data=$my_instance->lang->language;//var_dump($data);
        return $data;
    }
}
?>