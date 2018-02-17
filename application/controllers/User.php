<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
    }

    public function index($view="user/ListMyProfile", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->load->helper('General_Helper');
            $data['session']=GetSessionVars();
            $data['language']=LoadLanguage();
            $data['profile_type']=ProfileType($data['session']['rol']);

            $this->load->view($view, $data);
        }
        else
        {
            print 'NO_LOGGED';
        }
    }
	
	function SaveAccount()
    {
		if($this->session->userdata('logged_user_ehhs'))
        {
            $i=0;
            foreach($_POST as $field_name => $value)
            {
                if(substr($field_name,0,3)!='pk_' && $field_name!='table' && $field_name!='type' && $field_name!='sec1' && $field_name!='sec2' && $field_name!='sec3') {
                    $fields[$i] = $field_name;
                    $value = $this->security->xss_clean($value);
                    $value = html_escape($value);
                    $datas[$field_name] = password_hash($value, PASSWORD_DEFAULT);
                    $i++;
                    //$asignacion = "\$" . $field_name . "='" . $value . "';";
                    //eval($asignacion);
                }
                elseif($field_name=='sec1' || $field_name=='sec2' || $field_name=='sec3')
				{
                    $fields[$i] = $field_name;
					$datas[$field_name]=$value;
					$i++;
				}
				elseif($field_name=='table')
                    $table=$value;
                elseif($field_name=='type')
                    $type=$value;
				elseif(substr($field_name,0,3)=='pk_')
				{
					$datas['id']=$value;
					$field_id=substr($field_name,3);
				}
            }
            //print $table;die();
			$this->load->model('M_Main');
            $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

            print $result['error_msg'];
        }
        else
        {
            print 'NO_LOGGED';
        }
    }
	
	function SaveProfile()
    {
		if($this->session->userdata('logged_user_ehhs'))
        {
            $i=0;
            foreach($_POST as $field_name => $value)
            {
                if(substr($field_name,0,3)!='pk_' && $field_name!='table' && $field_name!='type' && $field_name!='random')
				{
                    $fields[$i] = $field_name;
					$datas[$field_name]=$value;
					$i++;
				}
				elseif($field_name=='random')
                    $random=$value;
				elseif($field_name=='table')
                    $table=$value;
                elseif($field_name=='type')
                    $type=$value;
				elseif(substr($field_name,0,3)=='pk_')
				{
					$datas['id']=$value;
					$field_id=substr($field_name,3);
				}
            }
            //print $table;die();
			$this->load->model('M_Main');
            $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

			if($type=='INSERT')
			{
				if(isset($result['data']['last_id']) && $result['data']['last_id']!='')
				{
					$id=$result['data']['last_id'];
					$photo_name='photo_'.$id.'.jpg';
					
					$file="./assets/upload/temp_photo/". $random .'/photo_1.jpg';
					$newfile = "./assets/upload/person_photo/".$photo_name;

					if (!rename($file, $newfile)) {
						echo "failed to copy $file...\n";
					}else
					$this->DeleteFile($random, 'photo_1.jpg', 'NO');
					
					print $id;
				}
				else
				print 'LAST_ID_EMPTY';
			}
			elseif($type=='UPDATE')
			{
				if($result['error_code']==0)
				{
					$id=$datas['id'];
					
					if($random!='no')
					{
						$photo_name='photo_'.$id.'.jpg';
						
						$file="./assets/upload/temp_photo/". $random .'/photo_1.jpg';
						$newfile = "./assets/upload/person_photo/".$photo_name;

						if (!rename($file, $newfile)) {
							echo "FAILED_COPY";
						}
						else
						$this->DeleteFile($random, 'photo_1.jpg', 'NO');
						
						
					}
					print $id;
				}
				else
				print $result['error_msg'].' LAST_ID_EMPTY';
			}
        }
        else
        {
            print 'NO_LOGGED';
        }
	}
	
	function GetStateByZIP()
	{
		header('Content-Type: application/json');
		$zip=$this->input->post('zip');
		$result=$this->M_User->GetStateByZIP($zip);
		
		if($result['error_msg']=='0')
			echo json_encode(array('msg' => 'OK', 'city' => $result['data']->city, 'state' => $result['data']->state, 'country' => $result['data']->country, 'id_zip' => $result['data']->id_zip));
		else
			echo json_encode(array('msg' => $result['error_msg']));
	}
	
	function UploadFile()
    {
        $status = "";
        $msg = "";
		
		$this->load->helper('General_Helper');
        $data['session']=GetSessionVars();

        $file = 'multiple_fileupload';
        $random = $this->input->post('random');

        if(!file_exists('./assets/upload/temp_photo/'.$random))mkdir('./assets/upload/temp_photo/'.$random);

        if ($status != "error")
        {
            $config['upload_path'] = './assets/upload/temp_photo/'.$random.'/';
            $config['allowed_types'] = 'jpg';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = false;
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = FALSE;
            $config['file_name'] = 'photo_'.$data['session']['id_user'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                //$url=base_url()."assets/upload/temp_photo/". $random .'/'. $file;
                //$url=str_replace('http','ftp',base_url()."/assets/upload/temp_photo/" . $file);
                //$this->Tick->UploadDocs($id_doc, $url, $name_language.$ext, $id_ticket, $id_interpreter);
                //$data = $this->upload->data();
                $status = "success";
                $msg = "File uploaded";
            }

            $file_name=$this->upload->data('file_name');
            $file_size=$this->upload->data('file_size');
            //if(file_exists("./assets/upload/temp_photo/".$name_language.$ext))unlink("./assets/upload/temp_photo/".$name_language.$ext);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg, 'file_name' => $file_name, 'file_size' => round($file_size,0)));
    }

    function DeleteFile($random_folder='', $name='', $no='')
    {
        if($name=='')$name = $this->input->post('name');
        if($random_folder=='')$random_folder = $this->input->post('folder');

        $folder="./assets/upload/temp_photo/".$random_folder;

        if(file_exists($folder.'/'.$name))
			unlink($folder.'/'.$name);
        
		if(count(scandir($folder))==2)
            rmdir($folder);

        if($no=='')echo 'DELETED';
    }

	function SaveEmployment()
    {
        $field_id='';
        $type='INSERT';

        $consent_name1=$this->input->post('consent_name1');
        $consent_name2=$this->input->post('consent_name2');
        $consent_name3=$this->input->post('consent_name3');
        $sign1=$this->input->post('sign1');
        $sign2=$this->input->post('sign2');
        $sign3=$this->input->post('sign3');

        $id_person=$this->input->post('id_person');
        $completed_percent=$this->input->post('completed_percent');

        $form_name=$this->input->post('form_name');
        $form_sign=$this->input->post('form_sign');
        $date=date('YYYY-mm-dd');

        //--------------EMPLOYEE---------------

        $table='employee';

        $fields=array();
        $fields[]='completed_percent';
        $fields[]='id_person';

        $datas=array();
        $datas['completed_percent']=$completed_percent;
        $datas['id_person']=$id_person;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //--------------EMPLOYEE---------------

        //----------------FORM-----------------

        $table='form';

        if(isset($result['data']['last_id']) && $result['data']['last_id']!='')
        {
            $id_employee=$result['data']['last_id'];
        }
        else
            print 'LAST_ID_EMPTY';

        $fields=array();
        $fields[]='form_name';
        $fields[]='form_sign';
        $fields[]='date';
        $fields[]='id_employee';

        $datas=array();
        $datas['form_name']=$form_name;
        $datas['form_sign']=$form_sign;
        $datas['date']=$date;
        $datas['id_employee']=$id_employee;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //----------------FORM-----------------

        //---------------CONSENT---------------

        $table='consent';

        if(isset($result['data']['last_id']) && $result['data']['last_id']!='')
        {
            $id_form=$result['data']['last_id'];
        }
        else
            print 'LAST_ID_EMPTY';

        $fields=array();
        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas=array();
        $datas['consent_name']=$consent_name1;
        $datas['sign']=$sign1;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        $fields=array();
        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas=array();
        $datas['consent_name']=$consent_name2;
        $datas['sign']=$sign2;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        $fields=array();
        $fields[]='consent_name';
        $fields[]='sign';
        $fields[]='id_form';

        $datas=array();
        $datas['consent_name']=$consent_name3;
        $datas['sign']=$sign3;
        $datas['id_form']=$id_form;

        $this->load->model('M_Main');
        $result=$this->M_Main->Execute($type, $fields, $datas, $table, $field_id);

        //---------------CONSENT---------------

        print $id_employee;
    }
	
	
	
	
	
	
	
	

    function GoListUser($msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;

        if($this->session->userdata('logged_user_ehhs'))
        {
            $session_data = $this->session->userdata('logged_user_ehhs');

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

    function ListMyProfileRewards($active_fade)
    {
        $view='user/ListMyProfileRewards';
        $data['view']=$view;
        $data['active_fade']=$active_fade;

        if($this->session->userdata('logged_user_ehhs'))
        {
            $session_data = $this->session->userdata('logged_user_ehhs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $data['data']['rewards']=$this->M_User->GetRewards($data);

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

        if($this->session->userdata('logged_user_ehhs'))
        {
            $session_data = $this->session->userdata('logged_user_ehhs');

            $sess_array = array(
                'id' => $session_data['id'],
                'user_name' => $session_data['user_name'],
                'bd_FirstName' => $session_data['bd_FirstName'],
                'bd_LastName' => $session_data['bd_LastName'],
                'email' => $session_data['email'],
                '__zkp_Client_Rec' => $session_data['__zkp_Client_Rec'],
                'PersonalContactInformationStatus' => '1',
            );
            $this->session->unset_userdata('logged_user_ehhs');
            $this->session->set_userdata('logged_user_ehhs', $sess_array);
        }

        echo $result['error_msg'];
    }

    function GetPrimaryKeyByRecordID()
    {
        $primary_key=$this->M_User->GetPrimaryKeyByRecordID($this->input->post('recordID'));
        if($primary_key['error']=='0')
            echo $primary_key['data'][0]['primary_key'];
    }

    function GoPersonalInfo($msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;

        if($this->session->userdata('logged_user_ehhs'))
        {
            $session_data = $this->session->userdata('logged_user_ehhs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];
            $data['PersonalContactInformationStatus'] = $session_data['PersonalContactInformationStatus'];

            $data['personal_info'] = $this->M_User->GetPersonalInfoSetting();
            $this->load->view('user/PersonalInfo', $data);
        }
    }

    function GoPersonalInfoWoutLogin()
    {
        $data['personal_info']=$this->M_User->GetPersonalInfoSetting();
        $this->load->view('user/PersonalInfoWoutLogin', $data);
    }

    function GetViewWoutLogin()
    {
        $view_url1 = $_POST['view_url1'];
        $view_url2 = $_POST['view_url2'];
        $this->load->view($view_url1);
        $this->load->view($view_url2);
    }
}