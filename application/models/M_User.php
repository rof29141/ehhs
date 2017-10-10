<?php
Class M_User extends CI_Model
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

    function GetProfileUser($data)
    {
        $layout='PHP_Company_Users';

        $request1['_RecordID'] = $data['id'];//echo $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['PT_NameFirst'] = $result["data"][$i]["fieldData"]["PT_NameFirst"];
                $field['PT_NameLast'] = $result["data"][$i]["fieldData"]["PT_NameLast"];
                $field['PT_Title'] = $result["data"][$i]["fieldData"]["PT_Title"];
                $field['CompanyName'] = $result["data"][$i]["fieldData"]["PHP_Company::Name"];
                $field['_kf_SecurityQuestion_SN'] = $result["data"][$i]["fieldData"]["_kf_SecurityQuestion_SN"];
                $field['SecurityAnswer'] = $result["data"][$i]["fieldData"]["SecurityAnswer"];
                $field['UserEmail'] = $result["data"][$i]["fieldData"]["UserEmail"];
                $field['UserName'] = $result["data"][$i]["fieldData"]["UserName"];
                $field['_RecordID'] = $result["data"][$i]["fieldData"]["_RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetListUser()
    {
        $layout='PHP_Company_Users';

        $request1['_RecordID'] = "*";//echo $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10';
        $criteria['offset'] = '1';

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['id'] = $result["data"][$i]["fieldData"]["_RecordID"];
                $field['PT_FullName'] = $result["data"][$i]["fieldData"]["PT_FullName"];
                $field['PT_Title'] = $result["data"][$i]["fieldData"]["PT_Title"];
                $field['CompanyName'] = $result["data"][$i]["fieldData"]["PHP_Company::Name"];
                $field['PrivilegeName'] = $result["data"][$i]["fieldData"]["PHP_Privileges_Set::PrivilegeName"];
                $field['SecurityAnswer'] = $result["data"][$i]["fieldData"]["SecurityAnswer"];
                $field['UserEmail'] = $result["data"][$i]["fieldData"]["UserEmail"];
                $field['UserName'] = $result["data"][$i]["fieldData"]["UserName"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetUpdateUser($data)
    {
        $layout='PHP_Company_Users';

        $request1['_RecordID'] = $data['id'];//echo $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['PT_NameFirst'] = $result["data"][$i]["fieldData"]["PT_NameFirst"];
                $field['PT_NameLast'] = $result["data"][$i]["fieldData"]["PT_NameLast"];
                $field['PT_Title'] = $result["data"][$i]["fieldData"]["PT_Title"];
                $field['CompanyName'] = $result["data"][$i]["fieldData"]["PHP_Company::Name"];
                $field['_kf_SecurityQuestion_SN'] = $result["data"][$i]["fieldData"]["_kf_SecurityQuestion_SN"];
                $field['SecurityAnswer'] = $result["data"][$i]["fieldData"]["SecurityAnswer"];
                $field['UserEmail'] = $result["data"][$i]["fieldData"]["UserEmail"];
                $field['UserName'] = $result["data"][$i]["fieldData"]["UserName"];
                $field['_RecordID'] = $result["data"][$i]["fieldData"]["_RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

}
?>