<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
    }

    public function index($view="dashboard/Dashboard", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        if($this->session->userdata('logged_user'))
        {
            $session_data = $this->session->userdata('logged_user');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['full_name'] = $session_data['full_name'];
            $data['title'] = $session_data['title'];
            $data['client_number'] = $session_data['client_number'];
            $data['email'] = $session_data['email'];

            $this->load->view($view, $data);
        }
        else
        {
            echo 1;
        }
    }

    public function UploadFile($script = '', $parameters='')
    {
       // $file_element_name = $this->input->post('fileName');echo $file_element_name;die();
        $file_element_name = 'fileupload';

        $file = str_replace(' ','_',$_FILES[$file_element_name]["name"]);

        $name=substr($file, 0,strpos($file, '.'));
        $ext=substr($file, strpos($file, '.'));

        $config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt|pdf|php|zip';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = false;
        $config['overwrite'] = TRUE;
        $config['file_name'] = $name;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file_element_name))
        {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        else
        {
            $url=base_url()."assets/upload/" . $name.$ext;
            //$url=str_replace('http','ftp',base_url()."/assets/upload/" . $file);
            //$this->M_Dashboard->UploadDocs($script, $url, $name.$ext, $parameters);
            //$data = $this->upload->data();
            $status = "success";
            $msg = "File uploaded";
        }
        //if(file_exists("./assets/upload/".$name.$ext))unlink("./assets/upload/".$name.$ext);

        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function DeleteFile()
    {
        $exist_file=0;
        $file_element_name = $this->input->post('name');
        $folder = $this->input->post('folder');

        if(file_exists("./assets/upload/".$folder . $file_element_name))unlink("./assets/upload/".$folder. '/' . $file_element_name);

        $dir = opendir('./assets/upload/'.$folder); //ruta actual
        while ($file = readdir($dir)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (!is_dir($file))//verificamos si es o no un directorio
            {
                if(strpos($file, '.')!='.')
                {
                    $exist_file=1;
                    echo $file;
                }
            }
        }

        if($exist_file==0 && $folder!='') rmdir('./assets/upload/'.$folder);
    }
}