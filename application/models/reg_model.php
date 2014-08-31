<?php
class Reg_model extends Model 

{
	function Reg_model()
	{

	    parent::Model();

	}
	function check_email($email)
	{
			
		$query = $this->db->get_where('cd_user',array('email'=> $email));
				
		if ($query->num_rows() > 0)

			return false;

		else

			return true;
	}	
	
	function ow_check_email($email,$u)
	{
			
		$query = $this->db->get_where('cd_user',array('email'=> $email, 'id'=> $u));
				
		if ($query->num_rows() > 0)

			return false;

		else

			return true;
	}	
	
	
	function get_u_p($email)
	{
		return $this->db->get_where('cd_user',array('email'=> $email));
	}	
function check_username($username)
	{
			
		$query = $this->db->get_where('cd_user',array('username'=> $username));
		return $query->num_rows();
	}	
	//insert, update, delete at project
	function manage_reg($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('cd_user', array('id' => $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('cd_user',$data, array('id' => $id));
			}
			else
			{
				$this->db->insert('cd_user', $data);
				return $this->db->insert_id();
			}
				
		}
	}
}

?>