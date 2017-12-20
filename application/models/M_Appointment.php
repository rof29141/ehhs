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

    function GetAllAppointmentByPatient($id_patient)//history
    {
        $layout='PHP_Appointment';

        $request1['_zfk_ClientRec'] = $id_patient;
        $request1['APT_Date'] = '<'. date('m/d/Y');

        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';
        $sort1['fieldName'] = 'APT_Date';
        $sort1['sortOrder'] = 'descend';
        $sort2['fieldName'] = 'APT_Time';
        $sort2['sortOrder'] = 'descend';
        $sort = array ($sort1, $sort2);
        $criteria['sort'] = $sort;
        //print json_encode($criteria);
        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
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
                $field['ProviderRec'] = $result["data"][$i]["fieldData"]["ProviderRec"];
                $field['_kf_ServiceID'] = $result["data"][$i]["fieldData"]["_kf_ServiceID"];
                $field['Active'] = $result["data"][$i]["fieldData"]["Active?"];
                $field['RecordID'] = $result["data"][$i]["fieldData"]["RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }
        //var_dump($return);
        return $return;
    }

    function GetPendingAppointmentByPatient($id_patient)
    {
        $layout='PHP_Appointment';
        date_default_timezone_set('America/New_York');

        $request1['_zfk_ClientRec'] = $id_patient;
        $request1['Active?'] = '=='. 1;
        $request1['TokenConfirmApp'] = '*';
        $request1['z_sc_TimestampStartCalc'] = '>='.date("m/d/Y H:i:s");

        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';
        $sort1['fieldName'] = 'APT_Date';
        $sort1['sortOrder'] = 'ascend';
        $sort2['fieldName'] = 'APT_Time';
        $sort2['sortOrder'] = 'ascend';
        $sort = array ($sort1, $sort2);
        $criteria['sort'] = $sort;
        //print json_encode($criteria);
        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
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
                $field['ProviderRec'] = $result["data"][$i]["fieldData"]["ProviderRec"];
                $field['_kf_ServiceID'] = $result["data"][$i]["fieldData"]["_kf_ServiceID"];
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
        date_default_timezone_set('America/New_York');

        $request1['_zfk_ClientRec'] = $id_patient;
        $request1['Active?'] = '=='. 1;
        //$request1['TokenConfirmApp'] = '=';
        //$request1['z_sc_TimestampStartCalc'] = '>='.date("m/d/Y H:i:s");
        $request1['z_sc_TimestampStartCalc'] = '>='.date("m/d/Y H:i:s");

        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';
        $sort1['fieldName'] = 'APT_Date';
        $sort1['sortOrder'] = 'ascend';
        $sort2['fieldName'] = 'APT_Time';
        $sort2['sortOrder'] = 'ascend';
        $sort = array ($sort1, $sort2);
        $criteria['sort'] = $sort;
        //print json_encode($criteria);
        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
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
                $field['ProviderRec'] = $result["data"][$i]["fieldData"]["ProviderRec"];
                $field['_kf_ServiceID'] = $result["data"][$i]["fieldData"]["_kf_ServiceID"];
                $field['ReminderEmail'] = $result["data"][$i]["fieldData"]["ReminderEmail"];
                $field['ReminderMsg'] = $result["data"][$i]["fieldData"]["ReminderMsg"];
                $field['ReminderContactBy'] = $result["data"][$i]["fieldData"]["ReminderContactBy"];
                $field['ReminderSent'] = $result["data"][$i]["fieldData"]["ReminderSent"];
                $field['RecordID'] = $result["data"][$i]["fieldData"]["RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }
        //var_dump($return);
        return $return;
    }

    function GetNextAppointmentByRecordID($recordID)
    {
        $layout='PHP_Appointment';
        date_default_timezone_set('America/New_York');

        $request1['RecordID'] = $recordID;

        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '1';
        $criteria['offset'] = '1';
        //print json_encode($criteria);
        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
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
                $field['ProviderRec'] = $result["data"][$i]["fieldData"]["ProviderRec"];
                $field['_kf_ServiceID'] = $result["data"][$i]["fieldData"]["_kf_ServiceID"];
                $field['RecordID'] = $result["data"][$i]["fieldData"]["RecordID"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }
        //var_dump($return);
        return $return;
    }

    function GetAppointmentByRecordID($recordID)
    {
        $layout='PHP_Appointment';
        date_default_timezone_set('America/New_York');

        $request1['RecordID'] = $recordID;

        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '1';
        $criteria['offset'] = '1';
        //print json_encode($criteria);
        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
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
                $field['ProviderRec'] = $result["data"][$i]["fieldData"]["ProviderRec"];
                $field['_kf_ServiceID'] = $result["data"][$i]["fieldData"]["_kf_ServiceID"];
                $field['ReminderMsg'] = $result["data"][$i]["fieldData"]["ReminderMsg"];
                $field['bd_user_email'] = $result["data"][$i]["fieldData"]["PHP_Patients::bd_user_email"];
                $field['bd_FirstName'] = $result["data"][$i]["fieldData"]["PHP_Patients::bd_FirstName"];
                $field['bd_LastName'] = $result["data"][$i]["fieldData"]["PHP_Patients::bd_LastName"];
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