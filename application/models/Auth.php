<?php
Class Auth extends CI_Model
{
    function  __construct()
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

    function Login($username, $password)
	{
        $this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where('user = ' . "'" . $username . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
			if($query->row()->activate_status==1)
			{

                if($query->row()->status==1)
                {
                    if(password_verify($password, $query->row()->pass))
                        $return=$this->Result(0, 0, $query->row());
                    else
                        $return=$this->Result(1, 'WRONG_PASS');
                }
                else
                    $return=$this->Result(1, 'INACTIVE', $query->row());
			}
			else
			$return=$this->Result(1, 'ACTIVATE', $query->row());
        }
        else
        $return=$this->Result(1, 'WRONG_ID');
       
        return $return;
	}

	function GetPersonByUserId($id_user)
	{
        $this -> db -> select('*');
        $this -> db -> from('person');
        $this -> db -> where('id_user = ' . "'" . $id_user . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1)
        {
			$return=$this->Result(0, 0, $query->row());
        }
        else
        $return=$this->Result(1, 'PERSON_EMPTY');

        return $return;
	}

    function ValidateEmail($email)
    {
        $this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where('email = ' . "'" . $email . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'WRONG_EMAIL');
       
		return $return;
    }

    function ValidateUserID($user)
    {
        $this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where('user = ' . "'" . $user . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'WRONG_ID');
       
		return $return;
    }

    function ValidateSecAnswers($data)
    {
        $this -> db -> select('*');
        $this -> db -> from('user');
		
        if($data['user_email']=='user')
			$this -> db -> where('user = ' . "'" . $data['search'] . "'");
        elseif($data['user_email']=='email')
            $this -> db -> where('email = ' . "'" . $data['search'] . "'");
			
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();
		
		if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row) 
			{
                if (password_verify($data['ans1'], $query->row()->ans1))
                {
                    if (password_verify($data['ans2'], $query->row()->ans2))
                    {
                        if (password_verify($data['ans3'], $query->row()->ans3))
                        {
							$return['user'] = $query->row()->user;
                            $return['pass'] = rand(10000, 99999);

                            $data['id'] = $query->row()->id_user;
                            $data['pass'] = password_hash($return['pass'], PASSWORD_DEFAULT);

                            $this->SaveNewPass($data);

                            $return['data'] = 'OK';
						}
                        else
                            $return['error'] = 'ANW3_WRONG';
                    }
                    else
                        $return['error'] = 'ANW2_WRONG';
                }
                else
                    $return['error'] = 'ANW1_WRONG';
            }
            
			return $return;
        }
    }

    function SaveToken($id_usuario, $token)//
    {
        $query = $this->db->where('id_user', $id_usuario)->get('user');

        if($query->num_rows() > 0)
        {
            $update_account = array(
                'token'=>$token
            );

            $this->db->update('user', $update_account, array('id_user' => $id_usuario));

            $return=$this->Result(0, 0, $query->row());
        }
        else
			$return=$this->Result(1, 'The user does not exist.');
       
		return $return;
    }

    function ValidaToken($token)
    {
        $this -> db -> select('*');
        $this -> db -> from('user');
        $this -> db -> where('token = ' . "'" . $token . "'");
        $this -> db -> limit(1);

        $query = $this -> db -> get();//var_dump($query->row());die();

        if($query -> num_rows() == 1)
			$return=$this->Result(0, 0, $query->row());
        else
			$return=$this->Result(1, 'EXPIRED');
       
		return $return;
    }

    function SaveNewPass($data)
    {
		$update_account = array(
			'pass'=>$data['pass'],
			'token'=>''
		);

		$this->db->update('user', $update_account, array('id_user' => $data['id']));
		$return=$this->Result(0, 0);
       
		return $return;
    }

    function ActivateAccount($token)
    {
        $update_account = array(
			'activate_status'=>1,
			'token'=>''
		);

		$this->db->update('user', $update_account, array('token' => $token));
		$return=$this->Result(0, 0);
       
		return $return;
    }

    function ResetNewPass($data)
    {
        $return=$this->Login($data['user'], $data['pass']);

		if ($return['error_msg']=='0')
        {
			$id=$return['data']->id_user;
			
			$update_account = array(
				'pass'=>$data['newpass']
			);

			$this->db->update('user', $update_account, array('id_user' => $id));
			$return=$this->Result(0, 0);
		}
		
		return $return;
    }

    function CreateAccount($data)
    {
        $this->db->insert('user', $data);
		$return=$this->Result(0, 0);

        return $return;
    }

    function Logout()
    {
       $this->db->close();
    }
}
?>