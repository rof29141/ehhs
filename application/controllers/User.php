<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
    }

    function index($view="user/ListMyProfile", $msg="", $success="", $warning="", $error="")
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
            $data['profile_type']=ProfileType($data['session']);

            if($data['session']['rol']=='worker')
            {
                $data['all_forms']=$this->M_User->GetAllFormsByPersonID($data['session']['id_person']);
            }
            elseif($data['session']['rol']=='patient')
            {
                $this->load->model('M_Client');
                $data['client']=$this->M_Client->GetClientByPersonID($data['session']['id_person']);
            }

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
				if(array_key_exists('last_id', $result['data']))
				{
					$id=$result['data']['last_id'];
					$photo_name='photo_'.$id.'.jpg';
					
					$file="./assets/upload/temp_photo/". $random .'/photo_1.jpg';
					$newfile = "./assets/upload/person_photo/".$photo_name;

					if (!rename($file, $newfile)) {
						echo "failed to copy $file...\n";
					}else
					$this->DeleteFile($random, 'photo_1.jpg', 'NO');

                    $this->load->helper('General_Helper');
                    UpdateSessionVars('id_person',$id);

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
            $config['file_name'] = 'photo_1';

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
}