<?php
Class Auth extends CI_Model
{
    private $fm;

    function  __construct()
    {
        parent::__construct();
        $this->load->model('MacTutorREST');
        $this->fm = new MacTutorREST ();
    }

    function error($result)
    {
        if (array_key_exists("errorCode", $result) && array_key_exists("errorMessage", $result))
        {
            return 'Something is wrong: (' . $result ["errorCode"] . ') ' . $result ["errorMessage"] . "\n";
        }
        elseif (array_key_exists("errorMessage", $result))
        {
            return 'Something is wrong: ' . $result ["errorMessage"] . "\n";
        }
        else
            return 0;
    }

    function Login($username, $password)
	{
        $layout='PHP_Patients';

        $request1["bd_user_name"] = '=='.$username;
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//print json_encode($criteria);
		json_encode($result);//die();
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);

            for($i=0;$i<$cant;$i++)
            {
                $return['email'] = $result["data"][$i]["fieldData"]["bd_user_email"];
                if($result["data"][$i]["fieldData"]["Activate_Status"]==1)
                {
                    //print $password.' - '.$result["data"][$i]["fieldData"]["bd_pwd"];die();
                    if (password_verify($password, $result["data"][$i]["fieldData"]["bd_pwd"]))
                    {
                        $return['id'] = $result["data"][$i]["fieldData"]["RecordID"];
                        $return['user_name'] = $result["data"][$i]["fieldData"]["bd_user_name"];
                        $return['bd_FirstName'] = $result["data"][$i]["fieldData"]["bd_FirstName"];
                        $return['bd_LastName'] = $result["data"][$i]["fieldData"]["bd_LastName"];
                        $return['email'] = $result["data"][$i]["fieldData"]["bd_user_email"];
                        $return['__zkp_Client_Rec'] = $result["data"][$i]["fieldData"]["__zkp_Client_Rec"];
                        $return['PersonalContactInformationStatus'] = $result["data"][$i]["fieldData"]["PersonalContactInformationStatus"];
                        $return['next_app_date'] = date('M j, Y h:i A', strtotime($result["data"][$i]["fieldData"]['_zcd_Next_Appt_Date']));
                        $return['next_app_date1'] = $result["data"][$i]["fieldData"]['_zcd_Next_Appt_Date'];
                    } else
                    {
                        $return['error'] = 'WRONG_PASS';
                    }
                }
                else
                    $return['error'] = 'ACTIVATE';
            }
        }
        else {$return['error']='WRONG_ID';}
        //var_dump($return);die();
        return $return;
	}

    function ValidateEmail($email)
    {
        $layout='PHP_Patients';

        $request1['bd_user_email'] = '=='.$email;
        $query = array ($request1);
        $criteria['query'] = $query;//print json_encode($criteria);

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);

            for($i=0;$i<$cant;$i++)
            {
                $return['id'] = $result["data"][$i]["fieldData"]["RecordID"];
                $return['user_name'] = $result["data"][$i]["fieldData"]["bd_user_name"];
                $return['Sec1'] = $result["data"][$i]["fieldData"]["Sec1"];
                $return['Sec2'] = $result["data"][$i]["fieldData"]["Sec2"];
                $return['Sec3'] = $result["data"][$i]["fieldData"]["Sec3"];
                $return['Activate_Status'] = $result["data"][$i]["fieldData"]["Activate_Status"];
            }
        }

        return $return;
    }

    function ValidateUserID($user)
    {
        $layout='PHP_Patients';

        $request1['bd_user_name'] = '=='.$user;
        $query = array ($request1);
        $criteria['query'] = $query;//print json_encode($criteria);

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);

            for($i=0;$i<$cant;$i++)
            {
                $return['id'] = $result["data"][$i]["fieldData"]["RecordID"];
                $return['user_name'] = $result["data"][$i]["fieldData"]["bd_user_name"];
                $return['Sec1'] = $result["data"][$i]["fieldData"]["Sec1"];
                $return['Sec2'] = $result["data"][$i]["fieldData"]["Sec2"];
                $return['Sec3'] = $result["data"][$i]["fieldData"]["Sec3"];
            }
        }

        return $return;
    }

    function ValidateSecAnswers($data)
    {
        $layout='PHP_Patients';

        if($data['user_email']=='user')
            $request1['bd_user_name'] = '=='.$data['search'];
        elseif($data['user_email']=='email')
            $request1['bd_user_email'] = '=='.$data['search'];

        $query = array ($request1);
        $criteria['query'] = $query;//print json_encode($criteria);

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);

            for($i=0;$i<$cant;$i++)
            {
                //echo $data['ans1'].'       /////      '.$result["data"][$i]["fieldData"]["Ans1"];
                if (password_verify($data['ans1'], $result["data"][$i]["fieldData"]["Ans1"]))
                {
                    if (password_verify($data['ans2'], $result["data"][$i]["fieldData"]["Ans2"]))
                    {
                        if (password_verify($data['ans3'], $result["data"][$i]["fieldData"]["Ans3"]))
                        {
                            $return['user'] = $result["data"][$i]["fieldData"]["bd_user_name"];
                            $return['pass'] = rand(10000, 99999);

                            $data['id'] = $result["data"][$i]["fieldData"]["RecordID"];
                            $data['pass'] = password_hash($return['pass'], PASSWORD_DEFAULT);

                            $this->SaveNewPass($data);

                            $return['data'] = 'OK';
                        }
                        else
                            $return['error'] = 'ANW3_WRONG';
                    }
                    else
                        $return['error'] = 'ANW2_WRONG';
                }
                else
                    $return['error'] = 'ANW1_WRONG';

            }
        }

        return $return;
    }

    function CheckExistUserID($user_id)
    {
        $layout='PHP_Patients';

        $request1['bd_user_name'] = '=='.$user_id;
        $query = array ($request1);
        $criteria['query'] = $query;//print json_encode($criteria);

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        return $return;
    }

    function CheckExistEmail($email)
    {
        $layout='PHP_Patients';

        $request1['bd_user_email'] = '=='.$email;
        $query = array ($request1);
        $criteria['query'] = $query;//print json_encode($criteria);

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        return $return;
    }

    function CheckExistUser($data)
    {
        $layout='PHP_Patients';

        $request1['bd_FirstName'] = $data['first'];// can not be equal exactly
        $request1['bd_LastName'] = $data['last'];// can not be equal exactly
        $request1['bd_DateOfBirth'] = $data['birth'];// can not be equal exactly

        $query = array ($request1);
        $criteria['query'] = $query;//print json_encode($criteria);

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        return $return;
    }

    function ValidateAnswer($email, $answer)
    {
        $layout='PHP_Patients';

        $request1['bd_user_email'] = '"=='.$email.'"';
        $request1['SecurityAnswer'] = '"=='.$answer.'"';
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);

            for($i=0;$i<$cant;$i++)
            {
                $return['id'] = $result["data"][$i]["fieldData"]["RecordID"];
                $return['user_name'] = $result["data"][$i]["fieldData"]["bd_user_name"];
                $return['_kf_SecurityQuestion_SN'] = $result["data"][$i]["fieldData"]["_kf_SecurityQuestion_SN"];
            }
        }

        return $return;
    }

    function SaveToken($id_usuario, $token)//
    {
        $layout='PHP_Patients';//print $id_usuario.' - '.$token;

        $record['TokenForgotPassword'] = $token;
        $data['data'] = $record;

        $result = $this->fm->editRecord($id_usuario, $data, $layout);//var_dump($result);
        $return['error']=$this->error($result);
        $return['id']=$id_usuario;
        $return['token']=$token;

        return $return;
    }

    function ValidaToken($token)
    {
        $layout='PHP_Patients';

        $request1['TokenForgotPassword'] = '=='.$token;
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);

            for($i=0;$i<$cant;$i++)
            {
                $return['id'] = $result["data"][$i]["fieldData"]["RecordID"];
                $return['user_name'] = $result["data"][$i]["fieldData"]["bd_user_name"];
            }
        }

        return $return;
    }

    function SaveNewPass($data)
    {
        $layout='PHP_Patients';

        $id=$data['id'];
        $record['bd_pwd'] = $data['pass'];//new pass
        $record['TokenForgotPassword'] = '';//clean the token
        $data['data'] = $record;//var_dump($data);die();

        $result = $this->fm->editRecord($id, $data, $layout);//var_dump($result);die();
        $return['error']=$this->error($result);

        return $return;
    }

    function ActivateAccount($token)
    {
        $layout='PHP_Patients';

        $request1['TokenForgotPassword'] = '=='.$token;
        $query = array ($request1);
        $criteria['query'] = $query;//echo json_encode($criteria);

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);

            for($i=0;$i<$cant;$i++)
            {
                $id = $result["data"][$i]["fieldData"]["RecordID"];

                $record['Activate_Status'] = '1';
                $record['TokenForgotPassword'] = '';//clean the token
                $data['data'] = $record;//var_dump($data);die();

                $result = $this->fm->editRecord($id, $data, $layout);//
                $return['error']=$this->error($result);
            }
        }

        return $return;
    }

    function ResetNewPass($data)
    {
        $layout='PHP_Patients';

        $request1["bd_user_name"] = '=='.$data['user'];
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            if(password_verify($data['pass'], $result["data"][0]["fieldData"]["bd_pwd"]))
            {
                $id = $result["data"][0]["fieldData"]["RecordID"];
                $record['bd_pwd'] = $data['newpass'];//new pass
                $data['data'] = $record;//var_dump($data);die();

                $result = $this->fm->editRecord($id, $data, $layout);//
                $return['error']=$this->error($result);
            }
            else {$return['error']='Password incorrect.';}
        }
        else {$return['error']='User incorrect.';}

        return $return;
    }

    function CreateAccount($data)
    {
        $layout='PHP_Patients';//var_dump($data);die();

        $record["bd_FirstName"] = $data['first'];
        $record["bd_LastName"] = $data['last'];
        $record["bd_DateOfBirth"] = $data['birth'];
        $record["bd_Cell"] = $data['cell'];
        $record["bd_user_email"] = $data['email'];
        $record["bd_user_name"] = $data['user'];
        $record["bd_pwd"] = $data['pass'];
        $record["Sec1"] = $data['sec1'];
        $record["Sec2"] = $data['sec2'];
        $record["Sec3"] = $data['sec3'];
        $record['Ans1'] =  $data['ans1'];
        $record['Ans2'] =  $data['ans2'];
        $record['Ans3'] =  $data['ans3'];
        $data['data'] = $record;

        $result = $this->fm->createRecord ($data, $layout);
        $return['error']=$this->error($result);

        return $return;
    }

    function Logout()
    {
        $this->fm->logout();
    }
}
?>