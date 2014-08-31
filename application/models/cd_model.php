<?php


class Cd_model extends Model
{
	
	public function get_all_program()
	{
		$this->db->order_by('name');
		$this->db->select('tbl_program.*, tbl_request_type.request_spec,
			(select count(*) as kwcount from tbl_keyword where tbl_program_id = tbl_program.id) as kwcount');		
		$this->db->join('tbl_request_type', 'request_id = tbl_request_type_request_id');
		$rslt = $this->db->get('tbl_program');
		
		return $rslt; 
	}
	
}

?>