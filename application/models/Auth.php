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
        $layout='PHP_Company_Users';

        $request1['UserName'] = '"'.$username.'"';
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);die();
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                //echo $password.' - '.$result["data"][$i]["fieldData"]["Password"];die();
                if(password_verify($password, $result["data"][$i]["fieldData"]["Password"]))
                {
                    $return['id'] = $result["data"][$i]["fieldData"]["_RecordID"];
                    $return['user_name'] = $result["data"][$i]["fieldData"]["UserName"];
                    $return['full_name'] = $result["data"][$i]["fieldData"]["PT_FullName"];
                    $return['title'] = $result["data"][$i]["fieldData"]["PT_Title"];
                    $return['client_number'] = $result["data"][$i]["fieldData"]["PT_ClientNumber"];
                    $return['email'] = $result["data"][$i]["fieldData"]["UserEmail"];
                    $return['id_company'] = $result["data"][$i]["fieldData"]["_kf_Company_ID"];
                    $return['company_name'] = $result["data"][$i]["fieldData"]["PHP_Company::Name"];
                    $return['company_web'] = $result["data"][$i]["fieldData"]["PHP_Company::WebSite"];
                    $return['id_privileges'] = $result["data"][$i]["fieldData"]["_kf_PrivilegeSet_ID"];
                    $return['menu'] = $result["data"][$i]["fieldData"]["UserMenu"];
                    $return['BEACONAccess'] = $result["data"][$i]["fieldData"]["PHP_Company::_zct_BEACON_Services"];
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
        $layout='PHP_Company_Users';

        $request1['UserEmail'] = '"'.$email.'"';
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $return['id'] = $result["data"][$i]["fieldData"]["_RecordID"];
                $return['user_name'] = $result["data"][$i]["fieldData"]["UserName"];
                $return['_kf_SecurityQuestion_SN'] = $result["data"][$i]["fieldData"]["_kf_SecurityQuestion_SN"];
            }
        }

        return $return;
    }

    function ValidateAnswer($email, $answer)
    {
        $layout='PHP_Company_Users';

        $request1['UserEmail'] = '"'.$email.'"';
        $request1['SecurityAnswer'] = '"'.$answer.'"';
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $return['id'] = $result["data"][$i]["fieldData"]["_RecordID"];
                $return['user_name'] = $result["data"][$i]["fieldData"]["UserName"];
                $return['_kf_SecurityQuestion_SN'] = $result["data"][$i]["fieldData"]["_kf_SecurityQuestion_SN"];
            }
        }

        return $return;
    }

    function SaveToken($id_usuario, $token)//
    {
        $layout='PHP_Company_Users';//echo $id_usuario;

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
        $layout='PHP_Company_Users';

        $request1['TokenForgotPassword'] = '"'.$token.'"';
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $return['id'] = $result["data"][$i]["fieldData"]["_RecordID"];
                $return['user_name'] = $result["data"][$i]["fieldData"]["UserName"];
            }
        }

        return $return;
    }

    function SaveNewPass($data)
    {
        $layout='PHP_Company_Users';

        $id=$data['id'];
        $record['Password'] = $data['pass'];//new pass
        $record['TokenForgotPassword'] = '';//clean the token
        $data['data'] = $record;//var_dump($data);die();

        $result = $this->fm->editRecord($id, $data, $layout);//
        $return['error']=$this->error($result);

        return $return;
    }

    function ResetNewPass($data)
    {
        $layout='PHP_Company_Users';

        $request1['UserName'] = '"'.$data['user'].'"';
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            if(password_verify($data['pass'], $result["data"][0]["fieldData"]["Password"]))
            {
                $id = $result["data"][0]["fieldData"]["_RecordID"];
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
        $layout='PHP_Company_Users';//var_dump($data);die();

        $record['UserName'] = $data['email'];
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