<?php

class User_model extends Model
{
	public function get_user_info( $user_id )
	{
		$this->db->from('cd_user');
		$this->db->where('id', $user_id);
		$this->db->join('role_name', 'cd_user.role_id = role_name.role_id');
		$rslt = $this->db->get( );
		
		if( $rslt->num_rows() > 0 )	return $rslt->row();
		return false;
	}
	public function get_user_info_username( $username )
	{
		$this->db->from('cd_user');
		$this->db->where('username', $username);
		$this->db->join('role_name', 'cd_user.role_id = role_name.role_id');
		$rslt = $this->db->get( );
		
		//if( $rslt->num_rows() > 0 )	return $rslt->row();
		return $rslt;
	}
// for is owner of project	

function get_project_owner($user_id, $pid)
	{
			
		$query = $this->db->get_where('project',array('user_id'=> $user_id, 'id'=> $pid));
				
		if ($query->num_rows() > 0)

			return true;

		else

			return false;
	}	
	
	function get_info($id)
	{
		return $this->db->get_where('cd_user', array('id'=> $id));
	}	

	
}

?>