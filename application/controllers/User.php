<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
    }

    public function index($view="user/ListMyProfileRewards", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        if($this->session->userdata('logged_user_acs'))
        {
            $session_data = $this->session->userdata('logged_user_acs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $this->load->view($view, $data);
        }
        else
        {
            print 1;
        }
    }

    function GoListUser($msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;

        if($this->session->userdata('logged_user_acs'))
        {
            $session_data = $this->session->userdata('logged_user_acs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $this->load->view('user/ListUser', $data);
        }
        else
        {
            print 1;
        }
    }

    function GoPersonalInfo($msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;

        if($this->session->userdata('logged_user_acs'))
        {
            $session_data = $this->session->userdata('logged_user_acs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $data['personal_info']=$this->M_User->GetPersonalInfoSetting();
        }
        $this->load->view('user/PersonalInfo', $data);
    }

    function ListMyProfileRewards($active_fade)
    {
        $view='user/ListMyProfileRewards';
        $data['view']=$view;
        $data['active_fade']=$active_fade;

        if($this->session->userdata('logged_user_acs'))
        {
            $session_data = $this->session->userdata('logged_user_acs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $this->load->model('M_Main');
            $data['data']['rewards']=$this->M_Main->GetRewards($data);

            $this->load->view($view, $data);
        }
        else
        {
            print 1;
        }
    }

    function SavePersonalInfo()
    {
        foreach($_POST as $field_name => $value)
        {
            if($field_name=='id_pers_info')
            {
                $id_pers_info = $value;

            }
            elseif($field_name=='id_patient')
            {
                $id_patient = $value;
            }

            if(isset($id_pers_info) && isset($id_patient))
                break;
        }

        foreach($_POST as $field_name => $value)
        {
            //cbx_636344309577-6363443097513='on';cbx_636344309577-6363443223018='on';inp_6364445598914='ffffgrfrfrgr';

            if(substr($field_name, 0, 4)=='rad_')
            {
                $id_question=substr($field_name, 4);
                $id_answer=$value;

                $result=$this->M_User->SavePersonalInfo($id_patient, $id_pers_info, $id_question, $id_answer, '', '');

            }
            elseif(substr($field_name, 0, 4)=='cbx_')
            {
                $var = explode("-",substr($field_name, 4));

                if(count($var) != 0)
                {
                    $id_question=$var[0];
                    $id_answer_multiple='';

                    foreach($_POST as $field_name_cbx => $value_cbx)
                    {
                        if(substr($field_name_cbx, 0, 4)=='cbx_')
                        {
                            $var_cbx = explode("-",substr($field_name_cbx, 4));

                            if(count($var_cbx) != 0)
                            {
                                if($var_cbx[0]==$id_question)
                                {
                                    if ($id_answer_multiple=='')
                                        $id_answer_multiple = $var_cbx[1];
                                    else
                                        $id_answer_multiple = $id_answer_multiple.','.$var_cbx[1];
                                }
                            }
                        }
                    }

                    $result=$this->M_User->SavePersonalInfo($id_patient, $id_pers_info, $id_question, '', $id_answer_multiple, '');
                }
            }
            elseif (substr($field_name, 0, 4)=='inp_')
            {
                $id_question = substr($field_name, 4);
                $text = $value;
                $result=$this->M_User->SavePersonalInfo($id_patient, $id_pers_info, $id_question, '', '', $text);
            }

            //echo $field_name . "='" . $value . "';";

        }

        echo $result['error'];
    }

    function GetPrimaryKeyByRecordID()
    {
        $primary_key=$this->M_User->GetPrimaryKeyByRecordID($this->input->post('recordID'));
        if($primary_key['error']=='0')
            echo $primary_key['data'][0]['primary_key'];
    }
}