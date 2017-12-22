<?php
Class M_User extends CI_Model
{
    private $fm;

    function __construct()
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
        $layout='PHP_Patients';

        $request1['RecordID'] = $data['id'];//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<sizeof($result["data"]);$i++)
            {
                $field['bd_FirstName'] = $result["data"][$i]["fieldData"]["bd_FirstName"];
                $field['bd_LastName'] = $result["data"][$i]["fieldData"]["bd_LastName"];
                $field['bd_user_email'] = $result["data"][$i]["fieldData"]["bd_user_email"];
                $field['bd_user_name'] = $result["data"][$i]["fieldData"]["bd_user_name"];
                $field['bd_DateOfBirth'] = $result["data"][$i]["fieldData"]["bd_DateOfBirth"];
                $field['bd_Phone'] = $result["data"][$i]["fieldData"]["bd_Phone"];
                $field['bd_ZipCode'] = $result["data"][$i]["fieldData"]["bd_ZipCode"];
                $field['RecordID'] = $result["data"][$i]["fieldData"]["RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetPersonalInfo($data)
    {
        $layout='PHP_Patients';

        $request1['RecordID'] = $data['id'];//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
            {
                $field['bd_Salutation'] = $result["data"][$i]["fieldData"]["bd_Salutation"];
                $field['bd_FirstName'] = $result["data"][$i]["fieldData"]["bd_FirstName"];
                $field['bd_MiddleInitial'] = $result["data"][$i]["fieldData"]["bd_MiddleInitial"];
                $field['bd_LastName'] = $result["data"][$i]["fieldData"]["bd_LastName"];
                $field['bd_Address1'] = $result["data"][$i]["fieldData"]["bd_Address1"];
                $field['bd_Address2'] = $result["data"][$i]["fieldData"]["bd_Address2"];
                $field['bd_City'] = $result["data"][$i]["fieldData"]["bd_City"];
                $field['bd_State'] = $result["data"][$i]["fieldData"]["bd_State"];
                $field['bd_Country'] = $result["data"][$i]["fieldData"]["bd_Country"];
                $field['bd_ZipCode'] = $result["data"][$i]["fieldData"]["bd_ZipCode"];
                $field['bd_Phone'] = $result["data"][$i]["fieldData"]["bd_Phone"];
                $field['bd_Cell'] = $result["data"][$i]["fieldData"]["bd_Cell"];


                $field['bd_OtherPhone'] = $result["data"][$i]["fieldData"]["bd_OtherPhone"];

                $field['bd_Email1'] = $result["data"][$i]["fieldData"]["bd_Email1"];

                $field['bd_DateOfBirth'] = $result["data"][$i]["fieldData"]["bd_DateOfBirth"];
                $field['bd_SocialSecurity'] = $result["data"][$i]["fieldData"]["bd_SocialSecurity"];
                $field['bd_Sex'] = $result["data"][$i]["fieldData"]["bd_Sex"];
                $field['bd_MaritalStatus'] = $result["data"][$i]["fieldData"]["bd_MaritalStatus"];
                $field['bd_PreferredReminderContact_Type'] = $result["data"][$i]["fieldData"]["bd_PreferredReminderContact_Type"];
                $field['bd_PreferredReminderContact'] = $result["data"][$i]["fieldData"]["bd_PreferredReminderContact"];
                $field['bd_EmployStatus'] = $result["data"][$i]["fieldData"]["bd_EmployStatus"];
                $field['bd_Wrk_Name'] = $result["data"][$i]["fieldData"]["bd_Wrk_Name"];
                $field['bd_Wrk_Address'] = $result["data"][$i]["fieldData"]["bd_Wrk_Address"];
                $field['bd_Wrk_ZipCode'] = $result["data"][$i]["fieldData"]["bd_Wrk_ZipCode"];
                $field['bd_Wrk_City'] = $result["data"][$i]["fieldData"]["bd_Wrk_City"];
                $field['bd_Wrk_State'] = $result["data"][$i]["fieldData"]["bd_Wrk_State"];
                $field['bd_Wrk_Country'] = $result["data"][$i]["fieldData"]["bd_Wrk_Country"];
                $field['bd_Wrk_Phone'] = $result["data"][$i]["fieldData"]["bd_Wrk_Phone"];
                $field['bd_StudentStatus'] = $result["data"][$i]["fieldData"]["bd_StudentStatus"];

                $field['bd_Wrk_Extension'] = $result["data"][$i]["fieldData"]["bd_Wrk_Extension"];
                $field['bd_Occupation'] = $result["data"][$i]["fieldData"]["bd_Occupation"];

                $field['bd_PatientReferral'] = $result["data"][$i]["fieldData"]["bd_PatientReferral"];
                $field['bd_ICE_Name1'] = $result["data"][$i]["fieldData"]["bd_ICE_Name1"];
                $field['bd_ICE_Relationship1'] = $result["data"][$i]["fieldData"]["bd_ICE_Relationship1"];
                $field['bd_ICE_Phone1'] = $result["data"][$i]["fieldData"]["bd_ICE_Phone1"];

                $field['Patient_FU_Concerns_Checklist_jem'] = $result["data"][$i]["fieldData"]["Patient_FU_Concerns_Checklist_jem"];

                $field['bd_user_email'] = $result["data"][$i]["fieldData"]["bd_user_email"];
                $field['bd_user_name'] = $result["data"][$i]["fieldData"]["bd_user_name"];

                $field['RecordID'] = $result["data"][$i]["fieldData"]["RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetListUser()
    {
        $layout='PHP_Patients';

        $request1['RecordID'] = "*";//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10';
        $criteria['offset'] = '1';

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<sizeof($result["data"]);$i++)
            {
                $field['id'] = $result["data"][$i]["fieldData"]["RecordID"];
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
        $layout='PHP_Patients';

        $request1['RecordID'] = $data['id'];//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<sizeof($result["data"]);$i++)
            {
                $field['PT_NameFirst'] = $result["data"][$i]["fieldData"]["PT_NameFirst"];
                $field['PT_NameLast'] = $result["data"][$i]["fieldData"]["PT_NameLast"];
                $field['PT_Title'] = $result["data"][$i]["fieldData"]["PT_Title"];
                $field['CompanyName'] = $result["data"][$i]["fieldData"]["PHP_Company::Name"];
                $field['_kf_SecurityQuestion_SN'] = $result["data"][$i]["fieldData"]["_kf_SecurityQuestion_SN"];
                $field['SecurityAnswer'] = $result["data"][$i]["fieldData"]["SecurityAnswer"];
                $field['UserEmail'] = $result["data"][$i]["fieldData"]["UserEmail"];
                $field['UserName'] = $result["data"][$i]["fieldData"]["UserName"];
                $field['RecordID'] = $result["data"][$i]["fieldData"]["RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetPersonalInfoSetting()
    {
        $layout='PHP_Personal_Info_Template';

        $request1['Template_Status'] = "==". 1;//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '1';
        $criteria['offset'] = '1';

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<sizeof($result["data"]);$i++)
            {
                $field['__kp_PERSONAL_INFO_TEMP_ID'] = $result["data"][$i]["fieldData"]["__kp_PERSONAL_INFO_TEMP_ID"];
                $field['json'] = $result["data"][$i]["fieldData"]["Json"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetPrimaryKeyByRecordID($recordID)
    {
        $layout='PHP_Patients';

        $request1['RecordID'] = $recordID;//echo $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '1';
        $criteria['offset'] = '1';

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['primary_key'] = $result["data"][$i]["fieldData"]["__zkp_Client_Rec"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function SavePersonalInfo($id_patient, $id_survey, $id_question, $id_answer, $id_answer_multiple, $text)
    {
        $layout = 'PHP_Personal_Info';

        $record['_kf_PHP_Personal_Info_Temp_ID'] = $id_survey;
        $record['_kf_Answers'] = $id_answer;
        $record['_kf_Question'] = $id_question;
        $record['_kf_Patient_ID'] = $id_patient;
        $record['_zft_MultipleAnswerIDs'] = $id_answer_multiple;
        $record['AnswerText'] = $text;
        $data['data'] = $record;//print json_encode($data);

        $result = $this->fm->createRecord($data, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        return $return;
    }

    function GetRewards($data)
    {
        $layout='PHP_Rewards';

        $request1['ACSClientID'] = $data['__zkp_Client_Rec'];//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '1';
        $criteria['offset'] = '1';

        $result = $this->fm->findRecords($criteria, $layout);//echo json_encode($criteria);var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);

            for($i=0;$i<$cant;$i++)
            {
                $field['ACSClientID'] = $result["data"][$i]["fieldData"]["ACSClientID"];
                $field['MemberSerial'] = $result["data"][$i]["fieldData"]["MemberSerial"];
                $field['SalesOrderNo'] = $result["data"][$i]["fieldData"]["SalesOrderNo"];
                $field['InvoiceNo'] = $result["data"][$i]["fieldData"]["InvoiceNo"];
                $field['SubscriptionStatus'] = $result["data"][$i]["fieldData"]["SubscriptionStatus"];
                $field['SubscribedOn'] = $result["data"][$i]["fieldData"]["SubscribedOn"];
                $field['SubscriptionExpiryDate'] = $result["data"][$i]["fieldData"]["SubscriptionExpiryDate"];
                $field['RewardAvailableTotal'] = $result["data"][$i]["fieldData"]["RewardAvailableTotal"];
                $field['OrderClosedBy'] = $result["data"][$i]["fieldData"]["OrderClosedBy"];
                $field['RewardTotalEarned'] = $result["data"][$i]["fieldData"]["RewardTotalEarned"];
                $field['RewardTotalRedeemed'] = $result["data"][$i]["fieldData"]["RewardTotalRedeemed"];
                $field['RewardTotalExpired'] = $result["data"][$i]["fieldData"]["RewardTotalExpired"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        /*$field['ACSClientID'] = 2;
        $field['MemberSerial'] = '928457';
        $field['SalesOrderNo'] = '928475';
        $field['InvoiceNo'] = '983475';
        $field['SubscriptionStatus'] = '1';
        $field['SubscribedOn'] = '09/09/2017';
        $field['SubscriptionExpiryDate'] = '09/09/2018';
        $field['RewardAvailableTotal'] = '375';
        $field['OrderClosedBy'] = 'Jeremy Ojeda';
        $field['RewardTotalEarned'] = '550';
        $field['RewardTotalRedeemed'] = '150';
        $field['RewardTotalExpired'] = '25';

        $fields[0] = $field;

        $return['data']=$fields;*/

        return $return;
    }
}
?>