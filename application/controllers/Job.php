<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_Job');
    }

    function index($view="invoice/ListInvoice", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        if($this->session->userdata('logged_user_ehhs'))
        {
            $session_data = $this->session->userdata('logged_user_ehhs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            //$data['data']['user']=$this->M_Invoice->GetProfileUserByUserID($data);

            $this->load->view($view, $data);
        }
        else
        {
            print 1;
        }
    }

    function GetInvoiceLine()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $id_invoice = $this->input->post('id_invoice');
            $anchor = $this->input->post('anchor');
            $cat = $this->input->post('cat');

            if ($id_invoice != '')
            {
                $result = $this->M_Invoice->GetInvoiceLine($id_invoice, $anchor, $cat);

                if ($result['error_msg'] == '0')
                {
                    //$data['invoice_detail']=$result['data'];
                    $this->load->view('invoice/InvoiceLine', $result);
                } else
                    print $result['error_msg'];
            }
        }
        else
        {
            print '<div class="text-center"><h3>Your session is expired.</h3></div>';
        }
    }

}