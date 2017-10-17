<?php
Class M_Dashboard extends CI_Model
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

    function GetAppointment($next, $hr_start, $hr_end_day, $id_doctor)
    {
        $layout='PHP_Appointment';
        $request1['ProviderRec'] = $id_doctor;
        $request1['APT_Date'] = $next;
        $request1['APT_Time'] = '>='.$hr_start;
        $request1['APT_TimeEnd'] = '<='.$hr_end_day;
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';

        $sort1['fieldName'] = 'APT_Date';
        $sort1['sortOrder'] = 'ascend';
        $sort2['fieldName'] = 'APT_Time';
        $sort2['sortOrder'] = 'ascend';
        $sort = array ($sort1, $sort2);
        $criteria['sort'] = $sort;//echo json_encode($criteria);

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

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetAppointmentBy($id_service, $id_doctor, $date, $time)
    {
        $layout='PHP_Appointment';

        $request1['_kf_ServiceID'] = $id_service;
        $request1['ProviderRec'] = $id_doctor;
        $request1['APT_Date'] = $date;
        $request1['APT_Time'] = $time;

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

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }
        //var_dump($return);
        return $return;
    }

    function GetAppointmentSettings($id_service)
    {
        $layout='PHP_Web_Appointment_Setting';

        $request1['_kf_ServiceID'] = '"'.$id_service.'"';//echo $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';//echo json_encode($criteria);

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['__kp_PRIMARY_KEY'] = $result["data"][$i]["fieldData"]["__kp_PRIMARY_KEY"];
                $field['QtyWeeksRepeat'] = $result["data"][$i]["fieldData"]["QtyWeeksRepeat"];
                $field['HrStart'] = $result["data"][$i]["fieldData"]["HrStart"];
                $field['HrEnd'] = $result["data"][$i]["fieldData"]["HrEnd"];
                $field['AppDays'] = $result["data"][$i]["fieldData"]["AppDays"];
                $field['UnitTime'] = $result["data"][$i]["fieldData"]["UnitTime"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function ValidaTokenApp($token)
    {
        $layout='PHP_Appointment';

        $request1['TokenConfirmApp'] = '"'.$token.'"';
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $return['__zpk_Appointment_Rec'] = $result["data"][$i]["fieldData"]["__zpk_Appointment_Rec"];
                $return['APT_Date'] = $result["data"][$i]["fieldData"]["APT_Date"];
                $return['APT_Time'] = $result["data"][$i]["fieldData"]["APT_Time"];
                $return['APT_TimeEnd'] = $result["data"][$i]["fieldData"]["APT_TimeEnd"];
                $return['APT_Title'] = $result["data"][$i]["fieldData"]["APT_Title"];
                $return['FirstName'] = $result["data"][$i]["fieldData"]["PHP_Doctor::FirstName"];
                $return['LastName'] = $result["data"][$i]["fieldData"]["PHP_Doctor::LastName"];
                $return['Photo'] = $result["data"][$i]["fieldData"]["PHP_Doctor::Photo"];
                $return['Service'] = $result["data"][$i]["fieldData"]["PHP_Service::Service"];
                $return['RecordID'] = $result["data"][$i]["fieldData"]["RecordID"];
            }
        }

        return $return;
    }
}
?>