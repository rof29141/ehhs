<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
    }

    function index($msg='', $success='', $warning='', $error='')
    {
        if($this->session->userdata('logged_token'))
        {
            $sess_array = $this->session->userdata('logged_token');

            $token = $sess_array['token'];
            if($token=='')$error='We have a problem with the connection to the server. '.$error;
        }
        if($msg=='ACTIVATE')
        {$data['msg']='';$data['warning']='<h3>Thank you for Signing Up!</h3> <h5>Please check your email to activate your account.</h5>';}

        if(!isset($data['msg']))$data['msg']=$msg;
        if(!isset($data['success']))$data['success']=$success;
        if(!isset($data['warning']))$data['warning']=$warning;
        if(!isset($data['error']))$data['error']=$error;//echo$error;die();

        $this->load->view('authentication/Login', $data);
    }

    function CreateAccount()
    {
        $data=array(
            'email'=>$this->input->post('email'),
            'user'=>$this->input->post('user'),
            'pass'=>password_hash($this->input->post('txt_pass'), PASSWORD_DEFAULT),
            'rol'=>$this->input->post('rol'),
            'sec1'=>$this->input->post('sec1'),
            'sec2'=>$this->input->post('sec2'),
            'sec3'=>$this->input->post('sec3'),
            'ans1'=>password_hash($this->input->post('ans1'), PASSWORD_DEFAULT),
            'ans2'=>password_hash($this->input->post('ans2'), PASSWORD_DEFAULT),
            'ans3'=>password_hash($this->input->post('ans3'), PASSWORD_DEFAULT)
        );//echo json_encode($data);

        $result=$this->Auth->CreateAccount($data);

        if($result['error_msg']=='0')
        {
            $this->ValidateEmail($this->input->post('email'),'activate');
            echo 'CREATED';
        }
        else
            echo $result['error_msg'];
    }

    function Verify()
    {
        $msg='';
        $success='';
        $warning='';
        $error='';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'Email', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');

        if($this->form_validation->run()==1)
        {
            $result = $this->CheckDatabase($this->input->post('pass'));//var_dump($result);

            if ($result['error_msg']=='0')
            {
                print 'LOGGED';
            } 
			elseif($result['error_msg']=='ACTIVATE')
			{
                print $result['data']->email;
            }
			else 
			{
                print $result['error_msg'];
            }
        }
        else
        {
            $error='Invalid user or password.';

            $this->index($msg, $success, $warning, $error);
        }
    }

    function CheckDatabase($password)
    {
        $id_person='';
        $username = $this->input->post('user');
        $result = $this->Auth->Login($username, $password);//echo $result['data']->email;//var_dump($result);

        if($result['error_msg']=='0')
        {
            $result_person = $this->Auth->GetPersonByUserId($result['data']->id_user);//echo $result['data']->email;//var_dump($result);

            if($result_person['error_msg']=='0')
            {
                $id_person=$result_person['data']->id_person;
            }
        }

        if ($result['error_msg']=='0')
        {
            $sess_array = array(
                'id_user' => $result['data']->id_user,
                'user' => $result['data']->user,
                'email' => $result['data']->email,
                'rol' => $result['data']->rol,
                'id_person' => $id_person
            );

            $this->session->set_userdata('logged_user_ehhs', $sess_array);
        }
        elseif ($result['error_msg']=='ACTIVATE')
        {
            $this->ValidateEmail($result['data']->email,'activate_yet');
            //print $return;
			//$result['error_msg'] = 'Sorry, your account doesn\'t have been activate yet. Please check your inbox.';
        }

        return $result;
    }

    function ValidateEmail($email='',$send='')
    {
        $empty='';

        if($email=='')$email = strip_tags($_POST['email']);
        if($send=='')$send = $_POST['send'];

        if ($email != '')
        {
            $result = $this->Auth->ValidateEmail($email);//var_dump($result);
            //print $result['error_msg'];die();

            if ($result['error_msg']=='0')
            {//print var_dump($result['result']);//die();
                $from_email = EMAIL_FROM;
                $from_name = EMAIL_FROM_NAME;
                $email_to = $email;
                $reply_to_email = '';
                $reply_to_name = '';
                $attachments = './assets/images/logo.png';

                if($send=='pass')
                {
                    $id = $result['data']->id_user;
                    $result = $this->generarLinkTemporal($id);//print '$token: '.$token;die();

                    if ($result['token'])
                    {
                        $token = $result['token'];

                        $subject = "Recover Password";
                        $link = base_url('Main?c=Authentication&f=Restore&p1=' . $token.'&v=main-view');
                        $body = '
                            <html>
                                <head>
                                    <title>Recover Password</title>'
                                    .EMAIL_STYLE.
                                '</head>
                                <body>
                                    <h1>Password Reset Request</h1>
                                    <p>Please click on the button below to reset the password for your account:</p>
                                    <p><a href="' . $link . '"><button class="btn btn-success">Reset password</button></a></p>
                                    <p>If you received this email in error, please delete.</p>
                                    <p>Thanks,</p>'
                                    .EMAIL_SIGNATURE.
                                '</body>
                            </html>';

                        $this->load->library('MT_Mail');
                        $obj_mail = new MT_Mail();

                        $obj_mail->EnviarEmail($from_email, $from_name, $email_to, $reply_to_email, $reply_to_name, $subject, $body, $attachments);
                    }
                }
                elseif ($send=='user')
                {
                    $subject = "Recover Username";
                    $body = '
                            <html>
                                <head>
                                    <title>Recover Username</title>
                                </head>
                                <body>
                                    <h1>Username</h1>
                                    <p>Your Username for '.COMPANY.'\'s website is:</p>
                                        <p><h2><strong>'. $result['data']->user .'</strong></h2></p>
                                    <p>If you think you received this email in error, please delete.</p>
                                    <p>Thanks,</p>'
                                    .EMAIL_SIGNATURE.
                                '</body>
                            </html>';

                    $this->load->library('MT_Mail');
                    $obj_mail = new MT_Mail();

                    print $obj_mail->EnviarEmail($from_email, $from_name, $email_to, $reply_to_email, $reply_to_name, $subject, $body, $attachments);
                }
                elseif ($send=='sec_question_continue')
                {
                    $this->load->model('M_Main');
                    $result_vl['vl']=$this->M_Main->GetVLSecQuestion();
                    //var_dump($result_vl['vl']);//
                    ?>

                    <div class="fields">
                        <strong>Security Question</strong>
                        <select disabled="disabled" class="form-control my_select2" id="_kf_SecurityQuestion_SN" name="_kf_SecurityQuestion_SN">
                            <?php for ($i=0;$i<sizeof($result_vl['vl']['data']);$i++){?>
                            <option  <?php if(isset($result['_kf_SecurityQuestion_SN'])){if($result['_kf_SecurityQuestion_SN']==$result_vl['vl']['data'][$i]['_zhk_RecordSerialNumber']){?> selected <?php }}?>value="<?php print $result_vl['vl']['data'][$i]['_zhk_RecordSerialNumber'];?>"><?php print $result_vl['vl']['data'][$i]['Security_Questions'];?></option>
                        <?php }?>
                        </select>
                    </div>

                    <?php
                }
                elseif ($send=='activate')
                {
                    $activate_status = $result['data']->activate_status;
					if($activate_status==1)
					{
						return 'ACTIVATED';
					}
					else
					{
						$id = $result['data']->id_user;
						$result = $this->generarLinkTemporal($id);//print '$token: '.$token;die();

						if ($result['token'])
						{
							$token = $result['token'];

							$subject = "Activate Your Account";
							$link = base_url('Main?c=Authentication&f=Activate&p1='. $token.'&p2='. $email.'&v=main-view');
							$body = '
								<html>
									<head>
										<title>Activate Your Account</title>'
										.EMAIL_STYLE.
									'</head>
									<body>
										<h1>Thank you for signing up!</h1>
										<p>Please click on the button below to activate your account.</p>
										<p><a href="' . $link . '"><button class="btn btn-success">Activate your account</button></a></p>
										<p>If you received this email in error, please delete.</p>
										<p>Thanks,</p>'
										.EMAIL_SIGNATURE.
									'</body>
								</html>';

							$this->load->library('MT_Mail');
							$obj_mail = new MT_Mail();

							$obj_mail->EnviarEmail($from_email, $from_name, $email_to, $reply_to_email, $reply_to_name, $subject, $body, $attachments);
						}
					}
                }
                elseif ($send=='activate_yet')
                {
                    $id = $result['data']->id_user;
                    $result = $this->generarLinkTemporal($id);//print '$token: '.$token;die();

                    if ($result['token'])
                    {
                        $token = $result['token'];

                        $subject = "Activate Your Account";
                        $link = base_url('Main?c=Authentication&f=Activate&p1='. $token.'&p2='. $email.'&v=main-view');//echo $link;
                        $body = '
                            <html>
                                <head>
                                    <title>Your account doesn\'t have been activate yet</title>'
                                    .EMAIL_STYLE.
                                '</head>
                                <body>
                                    <h1>Attempted login - Your account is not yet active</h1>
                                    <p>Please click on the button below to activate your account.</p>
                                    <p><a href="' . $link . '"><button class="btn btn-success">Activate</button></a></p>
                                    <p>If you received this email in error, please delete.</p>
                                    <p>Thanks,</p>'
                                    .EMAIL_SIGNATURE.
                                '</body>
                            </html>';

                        $this->load->library('MT_Mail');
                        $obj_mail = new MT_Mail();

                        $obj_mail->EnviarEmail($from_email, $from_name, $email_to, $reply_to_email, $reply_to_name, $subject, $body, $attachments);
                    }
                }
                elseif ($send=='recover')
                {
                    if($result["data"]->sec1!='' && $result["data"]->sec2!='' && $result["data"]->sec3!='')
                    $this->load->view('authentication/SecurityQuestions', $result);
                    else
                    {
                        print 'SEC_EMPTY';
                    }
                }
                elseif($send=='user_pass')
                {
                    $id = $result['id'];
                    $result = $this->generarLinkTemporal($id);//print '$token: '.$token;die();

                    if ($result['token'])
                    {
                        $token = $result['token'];

                        $subject = "Credentials to Recover Your Account";
                        $link = base_url('/Authentication/Restore/' . $token);
                        $body = '
                            <html>
                                <head>
                                    <title>Recover Account</title>'
                            .EMAIL_STYLE.
                            '</head>
                                <body>
                                    <h1>You respond well the 3 security questions</h1>
                                    <p>Your Username for '.COMPANY.'\'s website is:</p>
                                    <p><h2><strong>'. $result["user_name"] .'</strong></h2></p>
                                    <p>Please click on the button below to reset the password for your account:</p>
                                    <p><a href="' . $link . '"><button class="btn btn-success">Reset password</button></a></p>
                                    <p>If you received this email in error, please delete.</p>
                                    <p>Thanks,</p>'
                            .EMAIL_SIGNATURE.
                            '</body>
                            </html>';

                        $this->load->library('MT_Mail');
                        $obj_mail = new MT_Mail();

                        $obj_mail->EnviarEmail($from_email, $from_name, $email_to, $reply_to_email, $reply_to_name, $subject, $body, $attachments);
                    }
                }

            }
            else{print 'WRONG';}

        }
        else{print 'EMPTY';}
    }

    function ValidateUserID($user='',$type='')
    {
        if($user=='')$user = strip_tags($_POST['user']);
        if($type=='')$type = $_POST['type'];

        if ($user != '')
        {
            $result = $this->Auth->ValidateUserID($user);//var_dump($result);
            //print $result['error_msg'];die();

            if ($result['error_msg']=='0')
            {
                if ($type=='recover')
                {
                    if($result["data"]->sec1!='' && $result["data"]->sec2!='' && $result["data"]->sec3!='')
                        $this->load->view('authentication/SecurityQuestions', $result);
                    else
						print 'SEC_EMPTY';
                    
                }
            }
            else
				print 'WRONG';
        }
        else
			print 'EMPTY';
    }

    function ValidateSecAnswers($user_email='',$search='', $ans1='',$ans2='',$ans3='')
    {
        if($user_email=='')$data['user_email'] = $this->input->post('user_email');
        if($search=='')$data['search'] = $this->input->post('search');
        if($ans1=='')$data['ans1'] = strip_tags($this->input->post('ans1'));
        if($ans2=='')$data['ans2'] = strip_tags($this->input->post('ans2'));
        if($ans3=='')$data['ans3'] = strip_tags($this->input->post('ans3'));


        if($data['user_email'] != '' && $data['search'] != '' && $data['ans1'] != '' && $data['ans2'] != '' && $data['ans3'] != '')
        {
            $result = $this->Auth->ValidateSecAnswers($data);//var_dump($result);
            //print $result['error_msg'];die();
            if(isset($result['data']) && $result['data']=='OK')
            {
                print 'Username: '.$result['user'].'<br>Temporary Password: '.$result['pass'];
            }
            elseif($result['error']!='0')
                print $result['error'];
        }
        else
            print 'EMPTY';
    }

    function GenerarLinkTemporal($idusuario)
    {
        $cadena = $idusuario.rand(1,9999999).date('Y-m-d');
        $token = md5(md5(md5($cadena)));

        $result = $this->Auth->SaveToken($idusuario, $token);
        $result['token']=$token;

        return $result;
    }

    function Restore($token='')
    {
        $data['token']=$token;//print $token;die();

        $result=$this->Auth->ValidaToken($token);//var_dump($result);

        if ($result['error_code']=='0')
        {
            $data['id'] = $result['data']->id_user;
            $data['section_auth'] = '/authentication/RestorePass.php';
            $this->load->view('dashboard/Dashboard', $data);
        }
        else
        {
            $data['error']='Sorry, the token is expired.';
			$data['section_auth'] = '/authentication/Login.php';
			redirect('Main/Main');
        }
    }

    function Activate($token='', $email='')
    {
        $data['section_auth'] = '/authentication/Login.php';
		$data['token']=$token;//print $token;die();
        
        $result=$this->Auth->ActivateAccount($token);//var_dump($result);

		if ($result['error_msg']=='0')
        {
            $data['success']='Thank you for activate your account.';
        }
        else
        {
            $return=$this->ValidateEmail($email, 'activate');
			if($return=='ACTIVATED')
			$data['success']='Your account was activated.';
			else
			$data['error']='Sorry, the token is expired. Please, check your inbox. Has been sent an email to: '.$email;
        }
		
		$this->load->helper('General_Helper');
        $data['session']=GetSessionVars();
        $data['language']=LoadLanguage();
        $data['profile_type']=ProfileType($data['session']);
		
		$this->load->view('dashboard/Dashboard', $data);
    }

    function SaveNewPass()
    {
        $data=array(
            'pass'=>password_hash($this->input->post('txt_pass'), PASSWORD_DEFAULT),
            'token'=>$this->input->post('inp_token'),
            'id'=>$this->input->post('inp_id')
        );//var_dump($data);die();

        $result=$this->Auth->SaveNewPass($data);

        $msg='';
        $success='';
        $warning='';
        $error='';

        if($result['error_msg']=='0')
            print 'OK';
        else
            print $result['error_msg'];
    }

    function GoForgotUser($email='')
    {
        $data['email']=$email;
        $this->load->view('authentication/ForgotUser', $data);
    }

    function GoLogin()
    {
        $this->load->helper('General_Helper');
        $data['session']=GetSessionVars();
        $data['language']=LoadLanguage();
        $data['profile_type']=ProfileType($data['session']);
        $this->load->view('authentication/Login', $data);
    }

    function GoForgotPassword($email='')
    {
        $data['email']=$email;
		$this->load->view('authentication/ForgotPassword', $data);
    }

    function GoResetPassword()
    {
        $this->load->view('authentication/ResetPassword');
    }

    function GoSignUp()
    {
        $this->load->view('authentication/SignUp');
    }

    function GoRecoverAccount()
    {
        $this->load->view('authentication/RecoverAccount');
    }

    function CheckExistUserID()
    {
        $user_id=$this->input->post('user_id');

        $result=$this->Auth->ValidateUserID($user_id);

        if($result['error_msg']=='0')
        {
            echo 'EXIST';
        }
        else
            echo 'NO_EXIST';
    }

    function CheckExistEmail()
    {
        $email=$this->input->post('email');
        $result=$this->Auth->ValidateEmail($email);

        if($result['error_msg']=='0')
        {
            echo 'EXIST';
        }
        else
            echo 'NO_EXIST';
    }

    function ResetNewPass()
    {
        $data=array(
            'newpass'=>password_hash($this->input->post('txt_pass'), PASSWORD_DEFAULT),
            'pass'=>$this->input->post('password'),
            'user'=>$this->input->post('user')
        );

        $result=$this->Auth->ResetNewPass($data);

        $msg='';
        $success='';
        $warning='';
        $error='';

        if($result['error_msg']=='0')
            print 'OK';
        elseif($result['error_msg']=='0')
            print 'OK';
		elseif($result['error_msg']=='WRONG_PASS')
            print 'Your password is wrong';
		elseif($result['error_msg']=='ACTIVATE')
            print 'You have to activate your account first.';
		elseif($result['error_msg']=='WRONG_ID')
            print 'Your username is wrong.';
    }

    function Logout()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $this->session->unset_userdata('logged_user_ehhs');
            $this->Auth->Logout();
        }

        redirect('Dashboard/GoDashboard');
    }
}
?>