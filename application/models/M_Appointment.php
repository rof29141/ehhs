<?php
Class M_Appointment extends CI_Model
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

    function GetAppointmentByPatient($id_patient)
    {
        $layout='PHP_Appointment';

        $request1['_zfk_ClientRec'] = $id_patient;

        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';
        //echo json_encode($criteria);
        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['__zpk_Appointment_Rec'] = $result["data"][$i]["fieldData"]["__zpk_Appointment_Rec"];
                $field['APT_Date'] = $result["data"][$i]["fieldData"]["APT_Date"];
                $field['APT_Time'] = $result["data"][$i]["fieldData"]["APT_Time"];
                $field['APT_TimeEnd'] = $result["data"][$i]["fieldData"]["APT_TimeEnd"];
                $field['APT_Title'] = $result["data"][$i]["fieldData"]["APT_Title"];
                $field['FirstName'] = $result["data"][$i]["fieldData"]["PHP_Doctor::FirstName"];
                $field['LastName'] = $result["data"][$i]["fieldData"]["PHP_Doctor::LastName"];
                $field['Photo'] = $result["data"][$i]["fieldData"]["PHP_Doctor::Photo"];
                $field['Service'] = $result["data"][$i]["fieldData"]["PHP_Service::Service"];
                $field['RecordID'] = $result["data"][$i]["fieldData"]["RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }
        //var_dump($return);
        return $return;
    }

    function GetNextAppointmentByPatient($id_patient)
    {
        $layout='PHP_Appointment';

        $request1['_zfk_ClientRec'] = $id_patient;
        $request1['APT_Date'] = '>='.date("m/d/Y");

        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';
        $sort1['fieldName'] = 'APT_Date';
        $sort1['sortOrder'] = 'ascend';
        $sort = array ($sort1);
        $criteria['sort'] = $sort;
        //echo json_encode($criteria);
        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['__zpk_Appointment_Rec'] = $result["data"][$i]["fieldData"]["__zpk_Appointment_Rec"];
                $field['TokenConfirmApp'] = $result["data"][$i]["fieldData"]["TokenConfirmApp"];
                $field['APT_Date'] = $result["data"][$i]["fieldData"]["APT_Date"];
                $field['APT_Time'] = $result["data"][$i]["fieldData"]["APT_Time"];
                $field['APT_TimeEnd'] = $result["data"][$i]["fieldData"]["APT_TimeEnd"];
                $field['APT_Title'] = $result["data"][$i]["fieldData"]["APT_Title"];
                $field['FirstName'] = $result["data"][$i]["fieldData"]["PHP_Doctor::FirstName"];
                $field['LastName'] = $result["data"][$i]["fieldData"]["PHP_Doctor::LastName"];
                $field['Photo'] = $result["data"][$i]["fieldData"]["PHP_Doctor::Photo"];
                $field['Service'] = $result["data"][$i]["fieldData"]["PHP_Service::Service"];
                $field['RecordID'] = $result["data"][$i]["fieldData"]["RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }
        //var_dump($return);
        return $return;
    }
}
?>