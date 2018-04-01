<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Care extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('M_Employee');
    }

    function GoAddCare()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->helper('General_Helper');
            $data['session'] = GetSessionVars();//die();
            $data['language'] = LoadLanguage();
            $data['profile_type'] = ProfileType($data['session']);

            $data['go_view'] = 'care/AddCare';
            $data['go_back'] = $this->input->post('go_back');

            $data['id_client']=$this->input->post('id_client');

            $this->load->model('M_Client');
            $data['client']=$this->M_Client->GetAllActiveClients();

            if ($data['go_view'] != '')
                $this->load->view($data['go_view'], $data);
        }
        else
        {
            print 'NO_LOGGED';
        }
    }

    function ApproveRejectCare()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->model('M_Main');
            $i=0;
            foreach($_POST as $field_name => $value)
            {
                if($field_name!='table' && $field_name!='type' && $field_name!='field_id' && $field_name!='id') {
                    $fields[$i] = $field_name;
                    $value = $this->security->xss_clean($value);
                    $value = html_escape($value);
                    $datas[$field_name] = $value;

                    $i++;
                }
                elseif($field_name=='table')
                    $table=$value;
                elseif($field_name=='type')
                    $type=$value;
                elseif($field_name=='field_id')
                    $field_id=$value;
            }

            $data['ids'] = $this->input->post('id');
            $var = explode("-", $data['ids']);

            if(sizeof($var) != 0)
            {
                $cant=sizeof($var);

                for($i=0;$i<$cant; next($var), $i++)
                {
                    $datas['id'] = current($var);

                    if (isset($datas['id']))
                    {
                        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);
                        if($result['error_msg']=='0' && $type=='INSERT')
                            print $result['data']['last_id'];
                        elseif($result['error_msg']=='0' && $type=='UPDATE')
                            print $datas['id'];
                        else
                            print $result['error_msg'];
                    }
                    else
                    {
                        print 'EMPTY_ID';
                    }
                }
            }
            else
            {
                print 'EMPTY_TABLE';
            }
        }
        else
        {
            print 'NO_LOGGED';
        }
    }
}