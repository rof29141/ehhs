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

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);die();
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                //echo $password.' - '.$result["data"][$i]["fieldData"]["Password"];die();
                if(password_verify($password, $result["data"][$i]["fieldData"]["bd_pwd"]))
                {
                    $return['id'] = $result["data"][$i]["fieldData"]["RecordID"];
                    $return['user_name'] = $result["data"][$i]["fieldData"]["bd_user_name"];
                    $return['bd_FirstName'] = $result["data"][$i]["fieldData"]["bd_FirstName"];
                    $return['bd_LastName'] = $result["data"][$i]["fieldData"]["bd_LastName"];
                    $return['email'] = $result["data"][$i]["fieldData"]["bd_user_email"];
                    $return['__zkp_Client_Rec'] = $result["data"][$i]["fieldData"]["__zkp_Client_Rec"];
                }
                else {$return['error']='Password incorrect.';}
            }
        }
        else {$return['error']='User ID incorrect.';}
//var_dump($return);die();
        return $return;
	}

    function ValidateEmail($email)
    {
        $layout='PHP_Patients';

        $request1['bd_user_email'] = '"'.$email.'"';
        $query = array ($request1);
        $criteria['query'] = $query;//echo json_encode($criteria);

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $return['id'] = $result["data"][$i]["fieldData"]["RecordID"];
                $return['user_name'] = $result["data"][$i]["fieldData"]["bd_user_name"];
            }
        }

        return $return;
    }

    function ValidateAnswer($email, $answer)
    {
        $layout='PHP_Patients';

        $request1['bd_user_email'] = '"'.$email.'"';
        $request1['SecurityAnswer'] = '"'.$answer.'"';
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
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
        $layout='PHP_Patients';//echo $id_usuario;

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

        $request1['TokenForgotPassword'] = '"'.$token.'"';
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
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

        $result = $this->fm->editRecord($id, $data, $layout);//
        $return['error']=$this->error($result);

        return $return;
    }

    function ResetNewPass($data)
    {
        $layout='PHP_Patients';

        $request1["bd_user_name"] = '"'.$data['user'].'"';
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            if(password_verify($data['pass'], $result["data"][0]["fieldData"]["Password"]))
            {
                $id = $result["data"][0]["fieldData"]["RecordID"];
                $record['Password'] = $data['newpass'];//new pass
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

        $record["bd_user_name"] = $data['email'];
        $record['Password'] =  $data['password'];
        $data['data'] = $record;

        $result = $this->fm->createRecord ($data, $layout);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {$return['msg']='Account created.';$return['error']='';}

        return $return;
    }

}
?>