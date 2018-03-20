<?php
Class M_Survey extends CI_Model
{
    function  __construct()
    {
        parent::__construct();
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
        $table='PHP_Patients';

        $request1['RecordID'] = $data['id'];//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $table);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
            {
                $field['bd_FirstName'] = $result["data"][$i]["fieldData"]["bd_FirstName"];
                $field['bd_LastName'] = $result["data"][$i]["fieldData"]["bd_LastName"];
                $field['bd_user_email'] = $result["data"][$i]["fieldData"]["bd_user_email"];
                $field['bd_user_name'] = $result["data"][$i]["fieldData"]["bd_user_name"];
                $field['bd_DateOfBirth'] = $result["data"][$i]["fieldData"]["bd_DateOfBirth"];
                $field['bd_ZipCode'] = $result["data"][$i]["fieldData"]["bd_ZipCode"];
                $field['bd_Phone'] = $result["data"][$i]["fieldData"]["bd_Phone"];
                $field['RecordID'] = $result["data"][$i]["fieldData"]["RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function Save($datas='')
    {//die();
        $table='PHP_Surveys';

        $record['_kf_Patient_ID'] = $datas['__zkp_Client_Rec'];
        $record['Contact_Method'] = $datas['contact_method'];
        $data['data'] = $record;

        $result = $this->fm->createRecord($data, $table);//var_dump($result);
        $return['error'] = $this->error($result);

        if($return['error']=='0')
        {
            $recordID=$result['recordId'];


            $request1['RecordID'] = $recordID;//print $data['id'];
            $query = array ($request1);
            $criteria['query'] = $query;

            $result = $this->fm->findRecords($criteria, $table);//var_dump($result);
            $return['error']=$this->error($result);

            if($return['error']=='0')
            {
                $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
                {
                    $surveyID = $result["data"][$i]["fieldData"]["__kp_SURVEY_ID"];
                }

                if($surveyID)
                {
                    $table = 'PHP_Surveys_Lines';

                    foreach ($datas as $key => $value)
                    {
                        if ($key != 'contact_method' && $key != '__zkp_Client_Rec')
                        {
                            $record1['Question'] = $key;
                            $record1['Answer_Rate'] = $value;
                            $record1['_kf_Survey_ID'] = $surveyID;
                            $data1['data'] = $record1;
                            //print json_encode($data1);

                            $result = $this->fm->createRecord($data1, $table);//var_dump($result);
                            $return['error'] = $this->error($result);
                        }
                    }
                }
                else
                    $return['error']='Survey ID is empty.';

            }
            else
                $return['error']='Record ID is empty.';
        }

        return $return;
    }
}
?>