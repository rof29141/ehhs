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

        $request1['FirstName'] = "*";//echo $data['id'];
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

        $request1['Service'] = "*";//echo $data['id'];
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
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['__kp_PRIMARY_KEY'] = $result["data"][$i]["fieldData"]["__kp_PRIMARY_KEY"];
                $field['Service'] = $result["data"][$i]["fieldData"]["Service"];
                $field['GroupService'] = $result["data"][$i]["fieldData"]["GroupService"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetDoctorByID($id_doctor)
    {
        $layout='PHP_Doctors';

        $request1['_zpk_Staff_Rec'] = $id_doctor;//echo $data['id'];
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

        $request1['__kp_PRIMARY_KEY'] = $id_service;//echo $data['id'];
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
                $field['Service'] = $result["data"][$i]["fieldData"]["Service"];
                $field['GroupService'] = $result["data"][$i]["fieldData"]["GroupService"];

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

        $request1['_kf_ServiceID'] = $id_service;//echo $data['id'];
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

    function Execute($type='', $fields='', $datas='', $layout='')
    {
        if($type=='INSERT')
        {
            foreach ($fields as $field)
            {
                if($field!='id'){
                    $record[$field] = $datas[$field];
                    //echo $field.' = '.$record[$field].'   ';
                }
            }

            $data['data'] = $record;//echo json_encode($data);

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

            $data['data'] = $record;//echo json_encode($data);//.' layout: '.$layout. ' id: '.$datas['id'].'  ';//die();

            $result = $this->fm->editRecord($datas['id'], $data, $layout);//var_dump($result);
            $return['error']=$this->error($result);
        }

        if($type=='D')
        {
            //$myfm = new MacTutorREST ('','', $layout,'');

            $id_eliminated='';
            $id_not_eliminated='';
            $errors=0;
            $var = explode("-",$datas['ids']);

            if(count($var) != 0)
            {
                for ($i = 0; $i < count($var); next($var), $i++)
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
        {//echo 'criterio'.$data['criteria'];//die();
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
}
?>