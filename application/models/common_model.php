<?php



class Common_model extends Model 

{

	function Common_model()

	{

	    parent::Model();

	}
	/*********************insert, update, delete**********************/
	
	//insert, update, delete
	function manage_table($table, $data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete($table, array('id' => $id));
			
		}else{
			if($id > 0)
			{

				$this->db->update($table,$data, array('id' => $id));

			}
			else
			{
				$this->db->insert($table, $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at membersbio
	function manage_membersbio($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('membersbio', array('userName'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('membersbio',$data, array('userName'=> $id));
			}
			else
			{
				$this->db->insert('membersbio', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at membertext
	function manage_membertext($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('membertext', array('id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('membertext',$data, array('id'=> $id));
			}
			else
			{
				$this->db->insert('membertext', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at hq_tracking
	function manage_hq_tracking($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('hq_tracking', array('id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('hq_tracking',$data, array('id'=> $id));
			}
			else
			{
				$this->db->insert('hq_tracking', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at visitor_tracking
	function manage_visitor_tracking($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('visitor_tracking', array('username'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('visitor_tracking',$data, array('username'=> $id));
			}
			else
			{
				$this->db->insert('visitor_tracking', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at endorse
	function manage_endorse($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('endorse', array('id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('endorse',$data, array('id'=> $id));
			}
			else
			{
				$this->db->insert('endorse', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at request_for_idea
	function manage_request_for_idea($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('request_for_idea', array('rfi_id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('request_for_idea',$data, array('rfi_id'=> $id));
			}
			else
			{
				$this->db->insert('request_for_idea', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at idea
	function manage_idea($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('idea', array('id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('idea',$data, array('id'=> $id));
			}
			else
			{
				$this->db->insert('idea', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at idea
	function manage_idea_sub_topic($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('idea_sub_topic', array('idea_id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('idea_sub_topic',$data, array('idea_id'=> $id));
			}
			else
			{
				$this->db->insert('idea_sub_topic', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at idea_comment
	function manage_idea_comment($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('idea_comment', array('id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('idea_comment',$data, array('id'=> $id));
			}
			else
			{
				$this->db->insert('idea_comment', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at idea_support
	function manage_idea_support($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('idea_support', array('id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('idea_support',$data, array('id'=> $id));
			}
			else
			{
				$this->db->insert('idea_support', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at blog
	function manage_blog($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('blog', array('id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('blog',$data, array('id'=> $id));
			}
			else
			{
				$this->db->insert('blog', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at blog_comment
	function manage_blog_comment($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('blog_comment', array('blog_id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('blog_comment',$data, array('blog_id'=> $id));
			}
			else
			{
				$this->db->insert('blog_comment', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	//insert, update, delete at media_images
	function manage_media_images($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('media_images', array('id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('media_images',$data, array('id'=> $id));
			}
			else
			{
				$this->db->insert('media_images', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	function manage_event($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('event', array('id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('event',$data, array('id'=> $id));
			}
			else
			{
				$this->db->insert('event', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	function manage_event_join($data = "", $id = 0)
	{
		if($data == ""){
			$this->db->delete('event_join', array('id'=> $id));
			
		}else{
			if($id != "" || $id > 0)
			{
				$this->db->update('event_join',$data, array('id'=> $id));
			}
			else
			{
				$this->db->insert('event_join', $data);
				return $this->db->insert_id();
			}
				
		}
	}
	
	/***********************************get functions******************************************************/
	function get_username($hq)
	{
		$query = $this->db->get_where('members', array('hqName'=> $hq));
		$row = $query->row_array();
		$username = $row['userName'];
		
		return $username;

	}
	
	function get_membersbio($username)
	{
		return $this->db->get_where('membersbio', array('userName'=> $username));

	}
	
	function get_members($username)
	{
		return $this->db->get_where('members', array('userName'=> $username));
	}
	
	function get_memberstext($username)
	{
		$this->db->order_by('sorder', 'asc');
		return $this->db->get_where('membertext', array('userName'=> $username));

	}
	
	function get_time()
	{
		return array(
						'12:00'=> '12:00',
						'12:30'=> '12:30',
						'1:00'=> '1:00',
						'1:30'=> '1:30',
						'2:00'=> '2:00',
						'2:30'=> '2:30',
						'3:00'=> '3:00',
						'3:30'=> '3:30',
						'4:00'=> '4:00',
						'4:30'=> '4:30',
						'5:00'=> '5:00',
						'5:30'=> '5:30',
						'6:00'=> '6:00',
						'6:30'=> '6:30',
						'7:00'=> '7:00',
						'7:30'=> '7:30',
						'8:00'=> '8:00',
						'8:30'=> '8:30',
						'9:00'=> '9:00',
						'9:30'=> '9:30',
						'10:00'=> '10:00',
						'10:30'=> '10:30',
						'11:00'=> '11:00',
						'11:30'=> '11:30'
					);
	}
	
	function get_ampm()
	{
		return array(
						'AM'=> 'AM',
						'PM'=> 'PM'
					);
	}
	
	/*****************************************check functions************************************************/
	
	function check_email($email)
	{
			
		$query = $this->db->get_where('members',array('email'=> $email));
				
		if ($query->num_rows() > 0)

			return false;

		else

			return true;
	}
	
	function check_hq($hqName)
	{
			
		$query = $this->db->get_where('members',array('hqName'=> $hqName));
				
		if ($query->num_rows() > 0)

			return false;

		else

			return true;
	}
	
	function check_username($username)
	{
			
		$query = $this->db->get_where('members',array('userName'=> $username));
		return $query->num_rows();
	}
	
	function check_email_check($email)
	{
			
		$query = $this->db->get_where('members',array('email'=> $email));
		return $query->num_rows();
	}
	

	function get_pic($id)
	{
		return $this->db->get_where('membertext', array('id'=> $id));
		
	}
	function get_can_published_cam()
	{
		$this->db->select('campaign.*, cam_basic.cam_title');
		$this->db->from('campaign');
		$this->db->join('cam_basic', 'campaign.id= cam_basic.cam_id');
		//$this->db->where('campaign.can_id', $cid);
		$this->db->where('campaign.status', '2');
		
		return $this->db->get();
		
	}
	function get_cam_id($lk)
	{
		$this->db->select('*');
		$this->db->from('cam_basic');
		//$this->db->where('campaign.status', '2');
		//$this->db->get_where('cam_basic',array('cam_url'=> $lk));
		$this->db->like('cam_url', $lk, 'after'); 
		return $this->db->get();
		
	}
}

?>
