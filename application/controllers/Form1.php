<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form1 extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        //$this->load->model('M_Survey');
    }

    function index($view="form1/Form1", $msg="", $success="", $warning="", $error="")
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
            print 1;
        }
    }

    function UploadFile()
    {
        $status = "";
        $msg = "";

        $file = 'multiple_fileupload';
        $random = $this->input->post('random');

        if(!file_exists('./assets/upload/'.$random))mkdir('./assets/upload/'.$random);

        if ($status != "error")
        {
            $config['upload_path'] = './assets/upload/'.$random.'/';
            $config['allowed_types'] = 'gif|jpg|png|doc|txt|pdf|zip|docx|pages';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = false;
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = FALSE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                $url=base_url()."assets/upload/". $random .'/'. $file;
                //$url=str_replace('http','ftp',base_url()."/assets/upload/" . $file);
                //$this->Tick->UploadDocs($id_doc, $url, $name_language.$ext, $id_ticket, $id_interpreter);
                //$data = $this->upload->data();
                $status = "success";
                $msg = "File uploaded";
            }

            $file_name=$this->upload->data('file_name');
            $file_size=$this->upload->data('file_size');
            //if(file_exists("./assets/upload/".$name_language.$ext))unlink("./assets/upload/".$name_language.$ext);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg, 'file_name' => $file_name, 'file_size' => round($file_size,0)));
    }

    function DeleteFile()
    {
        $name = $this->input->post('name');
        $random_folder = $this->input->post('folder');

        $folder="./assets/upload/".$random_folder;

        if(file_exists($folder.'/'.$name))
        {
            unlink($folder.'/'.$name);
            if(count(scandir($folder))==2)
                rmdir($folder);

            echo 'DELETED';
        }
    }
}