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

    function GetTemplateEvents()
    {
        $layout='PHP_Template_Appointment';

        $request1['Title'] = "*";//echo $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['__kp_PRIMARY_KEY'] = $result["data"][$i]["fieldData"]["__kp_PRIMARY_KEY"];
                $field['Title'] = $result["data"][$i]["fieldData"]["Title"];
                $field['Start'] = $result["data"][$i]["fieldData"]["Start"];
                $field['End'] = $result["data"][$i]["fieldData"]["End"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetAppointment($next, $hr_start, $hr_end_day)
    {
        $layout='PHP_Appointment';
//echo $next.' - '.$final_day;
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


}
?>