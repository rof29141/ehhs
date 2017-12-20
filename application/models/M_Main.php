<?php
Class M_Main extends CI_Model
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

    function GetDoctors()
    {
        $layout='PHP_Doctors';

        $request1['FirstName'] = "*";//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
            {
                $field['_zpk_Staff_Rec'] = $result["data"][$i]["fieldData"]["_zpk_Staff_Rec"];
                $field['FirstName'] = $result["data"][$i]["fieldData"]["FirstName"];
                $field['LastName'] = $result["data"][$i]["fieldData"]["LastName"];
                $field['Title'] = $result["data"][$i]["fieldData"]["Title"];
                $field['Photo'] = $result["data"][$i]["fieldData"]["Photo"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetServices()
    {
        $layout='PHP_Service';

        $request1['Service'] = "*";//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';

        $sort1['fieldName'] = 'GroupService';
        $sort1['sortOrder'] = 'ascend';
        $sort2['fieldName'] = 'Service';
        $sort2['sortOrder'] = 'ascend';
        $sort = array ($sort1, $sort2);
        $criteria['sort'] = $sort;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
            {
                $field['__kp_PRIMARY_KEY'] = $result["data"][$i]["fieldData"]["__kp_SERVICE_ID"];
                $field['Service'] = $result["data"][$i]["fieldData"]["Service"];
                $field['GroupService'] = $result["data"][$i]["fieldData"]["GroupService"];
                $field['Description'] = $result["data"][$i]["fieldData"]["Description"];
                $field['ACS_ServiceValueList'] = $result["data"][$i]["fieldData"]["ACS_ServiceValueList"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetDoctorByID($id_doctor)
    {
        $layout='PHP_Doctors';

        $request1['_zpk_Staff_Rec'] = $id_doctor;//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
            {
                $field['_zpk_Staff_Rec'] = $result["data"][$i]["fieldData"]["_zpk_Staff_Rec"];
                $field['FirstName'] = $result["data"][$i]["fieldData"]["FirstName"];
                $field['LastName'] = $result["data"][$i]["fieldData"]["LastName"];
                $field['Title'] = $result["data"][$i]["fieldData"]["Title"];
                $field['Photo'] = $result["data"][$i]["fieldData"]["Photo"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetServiceByID($id_service)
    {
        $layout='PHP_Service';

        $request1['__kp_SERVICE_ID'] = $id_service;//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
            {
                $field['__kp_PRIMARY_KEY'] = $result["data"][$i]["fieldData"]["__kp_SERVICE_ID"];
                $field['Service'] = $result["data"][$i]["fieldData"]["Service"];
                $field['GroupService'] = $result["data"][$i]["fieldData"]["GroupService"];
                $field['ACS_ServiceValueList'] = $result["data"][$i]["fieldData"]["ACS_ServiceValueList"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetDoctorsByService($id_service)
    {
        $array_dist=array();
        $layout='PHP_Service_Doctor';

        $request1['_kf_ServiceID'] = '=='.$id_service;//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
        $criteria['offset'] = '1';

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            $cant=sizeof($result["data"]);
            
            for($i=0;$i<$cant;$i++)
            {
                if(!in_array($result["data"][$i]["fieldData"]["_kf_DoctorID"], $array_dist))
                {
                    $array_dist[$i] = $result["data"][$i]["fieldData"]["_kf_DoctorID"];

                    $field['__kp_PRIMARY_KEY'] = $result["data"][$i]["fieldData"]["__kp_PRIMARY_KEY"];
                    $field['_kf_DoctorID'] = $result["data"][$i]["fieldData"]["_kf_DoctorID"];
                    $field['FirstName'] = $result["data"][$i]["fieldData"]["PHP_Doctor::FirstName"];
                    $field['LastName'] = $result["data"][$i]["fieldData"]["PHP_Doctor::LastName"];
                    $field['Title'] = $result["data"][$i]["fieldData"]["PHP_Doctor::Title"];
                    $field['Photo'] = $result["data"][$i]["fieldData"]["PHP_Doctor::Photo"];

                    $fields[$i] = $field;
                }
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetRewards($data)
    {
        $layout='PHP_Rewards';

        $request1['ACSClientID'] = $data['__zkp_Client_Rec'];//print $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;
        $criteria['range'] = '10000';
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

        $field['ACSClientID'] = 2;
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

        $return['data']=$fields;

        return $return;
    }

    function Execute($type='', $fields='', $datas='', $layout='')
    {
        if($type=='INSERT')
        {
            foreach ($fields as $field)
            {
                if($field!='id'){
                    $record[$field] = $datas[$field];
                    //print $field.' = '.$record[$field].'   ';
                }
            }

            $data['data'] = $record;//print json_encode($data);

            $result = $this->fm->createRecord($data, $layout);//var_dump($result);
            $return['error']=$this->error($result);
        }

        if($type=='UPDATE')
        {
            foreach ($fields as $field)
            {
                if($field!='id'){
                    $record[$field] = $datas[$field];
                }
            }

            $data['data'] = $record;//print json_encode($data);//.' layout: '.$layout. ' id: '.$datas['id'].'  ';//die();

            $result = $this->fm->editRecord($datas['id'], $data, $layout);//var_dump($result);
            $return['error']=$this->error($result);
        }

        if($type=='DELETE')
        {
            //$myfm = new MacTutorREST ('','', $layout,'');

            $id_eliminated='';
            $id_not_eliminated='';
            $errors=0;
            $var = explode("-",$datas['ids']);

            if(sizeof($var) != 0)
            {
                for ($i = 0; $i < sizeof($var); next($var), $i++)
                {
                    $id = current($var);//print $id.' - ';

                    $result = $this->fm->deleteRecord($id, $layout);
                    $error=$this->error($result);

                    if($error=='0')
                    {
                        if($id_eliminated=='')
                            $id_eliminated=$id;
                        else
                            $id_eliminated.='-'.$id;
                    }
                    else
                    {
                        if($id_not_eliminated=='')
                            $id_not_eliminated=$id;
                        else
                            $id_not_eliminated.='-'.$id;

                        if($errors==0)
                            $errors=$error;
                        else
                            $errors.=' - '.$error;
                    }
                }
            }

            $return['error']=$errors;
            $return['id_eliminated']=$id_eliminated;
            $return['id_not_eliminated']=$id_not_eliminated;
        }

        if($type=='S')
        {//print 'criterio'.$data['criteria'];//die();
            $compoundFind =& $fm->newCompoundFindCommand($layout);
            $findreq1 =& $fm->newFindRequest($layout);
            $findreq1->addFindCriterion("name", $data['criteria']);

            $findreq2 =& $fm->newFindRequest($layout);
            $findreq2->addFindCriterion("email", $data['criteria']);
            /*
            foreach ($fields as $field)
            {
                $findreq->addFindCriterion($field, $data['criteria']);
                $compoundFind->add(1,$findreq);
            }
            */


            $compoundFind->add(1, $findreq1);
            $compoundFind->add(2, $findreq2);
            $result = $compoundFind->execute();
            $this->error($result);

            $records = $result->getRecords();
            $count = $result->getFoundSetCount();

            for ($i=0;$i<$count;$i++)
            {
                $data[$i]['id'] = $records[$i]->getField('id');
                $data[$i]['name'] = $records[$i]->getField('name');
                $data[$i]['email'] = $records[$i]->getField('email');
            }
            if($count > 0)
                return $data;
            else
                return false;
        }

        return $return;
    }

    function Logout()
    {
        $this->fm->logout();
    }
}
?>