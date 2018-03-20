<?php
Class M_Main extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

	function Result($error_code=0, $error_msg=0, $result='')
    {
        $return['error_code']=$error_code;
        $return['error_msg']=$error_msg;
        $return['data']=$result;

        return $return;
    }
	
	function GetCompletedPercentByPersonID($id_person)
	{
		$return=array();
		
		$this -> db -> select('*');
        $this -> db -> from('employee');
        $this -> db -> where('id_person = ' . "'" . $id_person . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'NO_EMPLOYEE');

		return $return;
	}

	function GetCompletedPercentByEmployeeID($id_employee)
	{
		$this -> db -> select('*');
        $this -> db -> from('employee');
        $this -> db -> where('id_employee = ' . "'" . $id_employee . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'NO_EMPLOYEE');

		return $return;
	}

    function Execute($type='', $fields='', $datas='', $table='', $field_id='')
    {
        $return['data']='';

        if($type=='INSERT')
        {
            foreach ($fields as $field)
            {
                if($field!='id'){
                    $insert[$field] = $datas[$field];
                    //print $field.' = '.$record[$field].'   ';
                }
            }
			$sql = $this->db->set($insert)->get_compiled_insert($table);
			//echo $sql;
			
			$this->db->insert($table, $insert).'<br>';
			$insert_id['last_id'] = $this->db->insert_id();
			$return=$this->Result(0, 0, $insert_id);
        }

        if($type=='UPDATE')
        {
			//$query = $this->db->where($field_id, $datas['id'])->get($table);

			//if($query->num_rows() > 0)
			//{
				foreach ($fields as $field)
				{
                    if($field!='id'){
                        $update[$field] = $datas[$field];
                    }
				}

                $this->db->where($field_id, $datas['id']);
                $this->db->update($table, $update);

				//$this->db->update($table, $update, array($field_id => $datas['id']));print $field_id.' - '.$datas['id'];
                //echo $this->db->set($update, array($field_id => $datas['id']))->get_compiled_update($table);

				$return=$this->Result(0, 0);
			//}
			//else
				//$return=$this->Result(1, 'The record does not exist.');
		   
			return $return;
        }

        if($type=='DELETE')
        {
            //$myfm = new MacTutorREST ('','', $table,'');

            $id_eliminated='';
            $id_not_eliminated='';
            $errors=0;
            $var = explode("-",$datas['ids']);

            if(sizeof($var) != 0)
            {
                for ($i = 0; $i < sizeof($var); next($var), $i++)
                {
                    $id = current($var);//print $id.' - ';

                    $result = $this->fm->deleteRecord($id, $table);
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
            $compoundFind =& $fm->newCompoundFindCommand($table);
            $findreq1 =& $fm->newFindRequest($table);
            $findreq1->addFindCriterion("name", $data['criteria']);

            $findreq2 =& $fm->newFindRequest($table);
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

    function CkeckProfile($data)
	{
		$i=0;
		$return=array();
		
		$this -> db -> select('*');
        $this -> db -> from('person');

        if(isset($data['id_user']) && $data['id_user']!='')$this -> db -> where('id_user = ' . "'" . $data['id_user'] . "'");
        elseif(isset($data['id_person']) && $data['id_person']!='')$this -> db -> where('id_person = ' . "'" . $data['id_person'] . "'");

        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() != 1)
		{
			$return['NO_FILLED_PERSON'] = 1;
		}
			
       
		return $return;
	}
	
	function Logout()
    {
        $this->fm->logout();
    }
}
?>