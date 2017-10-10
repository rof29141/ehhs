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

    function GetNav($data)//NOT USED
    {
        $layout='PHP_BEACON_Customized';

        $request1['_kf_PrivilegeSet_ID'] = $data['id_privileges'];
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
                $field['id_module'] = $result["data"][$i]["fieldData"]["_kf_Module_ID"];
                $field['id_access'] = $result["data"][$i]["fieldData"]["_kf_Access_SN"];
                $field['label'] = $result["data"][$i]["fieldData"]["PHP_BEACON_Modules_Customized::Module_Label"];
                $field['name'] = $result["data"][$i]["fieldData"]["PHP_BEACON_Modules_Customized::Module_Name"];
                $field['url'] = $result["data"][$i]["fieldData"]["PHP_BEACON_Modules_Customized::Module_URL"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }
        else
        {
            $layout='PHP_BEACON_Defaults';

            $request1['_kf_PrivilegeSet_ID'] = $data['id_privileges'];
            $query = array ($request1);
            $criteria['query'] = $query;

            $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
            $return['error']=$this->error($result);

            if($return['error']=='0')
            {
                for($i=0;$i<count($result["data"]);$i++)
                {
                    $field['id_module'] = $result["data"][$i]["fieldData"]["_kf_Module_ID"];
                    $field['id_access'] = $result["data"][$i]["fieldData"]["_kf_Access_SN"];
                    $field['label'] = $result["data"][$i]["fieldData"]["PHP_BEACON_Modules_Default::Module_Label"];
                    $field['name'] = $result["data"][$i]["fieldData"]["PHP_BEACON_Modules_Default::Module_Name"];
                    $field['url'] = $result["data"][$i]["fieldData"]["PHP_BEACON_Modules_Default::Module_URL"];

                    $fields[$i] = $field;
                }

                $return['fields']=$fields;
            }
        }

        return $return;
    }

    function GetVLSecQuestion()
    {
        $layout='PHP_VL_SecQuestion';

        $request1['Security_Questions'] = "*";//echo $data['id'];
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
                $field['_zhk_RecordSerialNumber'] = $result["data"][$i]["fieldData"]["_zhk_RecordSerialNumber"];
                $field['Security_Questions'] = $result["data"][$i]["fieldData"]["Security_Questions"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetVLFilingType()
    {
        $layout='PHP_VL_Filing_Type';

        $request1['FilingType'] = "*";//echo $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['_zhk_RecordSerialNumber'] = $result["data"][$i]["fieldData"]["_zhk_RecordSerialNumber"];
                $field['FilingType'] = $result["data"][$i]["fieldData"]["FilingType"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetState()
    {
        $layout='PHP_State';

        $request1['CountryCode'] = "*";//echo $data['id'];
        $query = array ($request1);
        $criteria['query'] = $query;

        $result = $this->fm->findRecords($criteria, $layout);//var_dump($result);
        $return['error']=$this->error($result);

        if($return['error']=='0')
        {
            for($i=0;$i<count($result["data"]);$i++)
            {
                $field['__kp_STATE_ID'] = $result["data"][$i]["fieldData"]["__kp_STATE_ID"];
                $field['StateCode'] = $result["data"][$i]["fieldData"]["StateCode"];
                $field['StateName'] = $result["data"][$i]["fieldData"]["StateName"];
                $field['CountryCode'] = $result["data"][$i]["fieldData"]["CountryCode"];
                $field['CountryName'] = $result["data"][$i]["fieldData"]["PHP_Countries::CountryName"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetCountry()
    {
        $layout='PHP_Contries';

        $request1['CountryCode'] = "*";//echo $data['id'];
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
                $field['__kp_COUNTRY_ID'] = $result["data"][$i]["fieldData"]["__kp_COUNTRY_ID"];
                $field['CountryCode'] = $result["data"][$i]["fieldData"]["CountryCode"];
                $field['CountryName'] = $result["data"][$i]["fieldData"]["CountryName"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetEntityType()
    {
        $layout='PHP_Entity_Type';

        $request1['EntityType'] = "*";//echo $data['id'];
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
                $field['__kp_ENTITYTYPE_ID'] = $result["data"][$i]["fieldData"]["__kp_ENTITYTYPE_ID"];
                $field['EntityType'] = $result["data"][$i]["fieldData"]["EntityType"];
                $field['Status'] = $result["data"][$i]["fieldData"]["Status"];

                $fields[$i] = $field;
            }

            $return['data']=$fields;
        }

        return $return;
    }

    function GetVLStatus()
    {
        $layout='PHP_VL_Status';

        $request1['ActiveInactive'] = "*";//echo $data['id'];
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
                $field['_zhk_RecordSerialNumber'] = $result["data"][$i]["fieldData"]["_zhk_RecordSerialNumber"];
                $field['ActiveInactive'] = $result["data"][$i]["fieldData"]["ActiveInactive"];

                $fields[$i] = $field;
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

            $data['data'] = $record;//echo json_encode($data).' layout: '.$layout. ' id: '.$datas['id'].'  ';//die();

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