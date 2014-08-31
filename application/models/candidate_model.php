<?php

class Candidate_model extends Model 
{
	function Candidate_model()
	{
	    parent::Model();
	}
	
	
	
	function check_url($url)
	{
			
		$query = $this->db->get_where('cam_basic',array('cam_url'=> $url));
				
		if ($query->num_rows() > 0)

			return false;

		else

			return true;
	}	
	
	
	function get_can_home_setting($id)
	{
		$this->db->from('cd_user');
		$this->db->where('id', $id);
		return $this->db->get();
		
	}
	function get_can_draft_cam($cid)
	{

		$this->db->select('campaign.*, cam_basic.cam_title');
		$this->db->from('campaign');
		$this->db->join('cam_basic', 'campaign.id= cam_basic.cam_id');
		$this->db->where('campaign.can_id', $cid);
		$this->db->where('campaign.status', '0');
		
		
		$this->db->order_by('last_update DESC');
		
		return $this->db->get();
		
	}
	function get_can_private_cam($cid)
	{

		$this->db->select('campaign.*, cam_basic.cam_title');
		$this->db->from('campaign');
		$this->db->join('cam_basic', 'campaign.id= cam_basic.cam_id');
		$this->db->where('campaign.can_id', $cid);
		$this->db->where('campaign.status', '3');
		
		
		$this->db->order_by('id ASC');
		
		return $this->db->get();
		
	}
	function get_can_submit_cam($cid)
	{
		$this->db->select('campaign.*, cam_basic.cam_title');
		$this->db->from('campaign');
		$this->db->join('cam_basic', 'campaign.id= cam_basic.cam_id');
		$this->db->where('campaign.can_id', $cid);
		$this->db->where('campaign.status', '1');
		
		return $this->db->get();
		
	}
	function get_can_published_cam($cid)
	{
		$this->db->select('campaign.*, cam_basic.cam_title');
		$this->db->from('campaign');
		$this->db->join('cam_basic', 'campaign.id= cam_basic.cam_id');
		$this->db->where('campaign.can_id', $cid);
		$this->db->where('campaign.status', '2');
		
		return $this->db->get();
		
	}
	function get_can_rejected($cid)
	{
		$this->db->select('campaign.*, cam_basic.cam_title');
		$this->db->from('campaign');
		$this->db->join('cam_basic', 'campaign.id= cam_basic.cam_id');
		$this->db->where('campaign.can_id', $cid);
		$this->db->where('campaign.status', '5');
		
		return $this->db->get();
		
	}
	function get_can_discuss($cid)
	{
		$this->db->select('campaign.*, cam_basic.cam_title');
		$this->db->from('campaign');
		$this->db->join('cam_basic', 'campaign.id= cam_basic.cam_id');
		$this->db->where('campaign.can_id', $cid);
		$this->db->where('campaign.status', '4');
		
		return $this->db->get();
		
	}
	
	function get_can_published_cam_others($id)
	{
		$this->db->select('campaign.*, cam_basic.cam_title');
		$this->db->from('campaign');
		$this->db->join('cam_basic', 'campaign.id= cam_basic.cam_id');
		$this->db->where('campaign.status', '2');
		$this->db->where('campaign.can_id !=', $id);
		
		return $this->db->get();
		
	}
	function get_can_submit_cam_all()
	{
		$this->db->select('campaign.*, cam_basic.cam_title');
		$this->db->from('campaign');
		$this->db->join('cam_basic', 'campaign.id= cam_basic.cam_id');
		$this->db->where('campaign.status', '1');
		
		return $this->db->get();
		
	}
	function get_can_published_cam_all()
	{
		$this->db->select('campaign.*, cam_basic.cam_title');
		$this->db->from('campaign');
		$this->db->join('cam_basic', 'campaign.id= cam_basic.cam_id');
		$this->db->where('campaign.status', '2');
		
		return $this->db->get();
		
	}

	public function is_cam_this_can($user_id,$cam_id)
	{
		$this->db->from('campaign');
		$this->db->where('id', $cam_id);
		$this->db->where('can_id', $user_id);
		$rslt = $this->db->get( );
		
		if( $rslt->num_rows() > 0 )	return true;
		return false;
	}
	public function is_unique_visitor($can_id,$cam_id)
	{
		$this->db->from('visitors');
		$this->db->where('cam_id', $cam_id);
		$this->db->where('can_id', $can_id);
		$rslt = $this->db->get( );
		
		if( $rslt->num_rows() == 0 )	return true;
		return false;
	}
	function get_cam($tbl,$id, $limit = 0)
	{
		$this->db->from($tbl);
		if($tbl == 'campaign')
		{
			$this->db->where('id', $id);
		}
		elseif($tbl == 'cam_events')
		{
			$this->db->where('cam_id', $id);
			$date = date('Y-m-d');
			$this->db->where('event_date >', $date);
		}
		else
		{
			$this->db->where('cam_id', $id);
		}
		
		$this->db->order_by("id", "desc");
		
		if($limit > 0)
			{
				$this->db->limit($limit);
			}
		
		return $this->db->get();
		
	}
	
	function get_event_can($tbl,$cid)
	{
		$this->db->from($tbl);
	
			$this->db->where('can_id', $cid);
			$date = date('Y-m-d');
			$this->db->where('event_date >', $date);
		
		
		$this->db->order_by("id", "desc");
		
	
		
		return $this->db->get();
		
	}
	function get_event_planed($cid)
	{
		$this->db->from('cam_events_plan_attend');
			$this->db->where('event_id', $cid);
		$this->db->order_by("id", "desc");
		return $this->db->get();
	}
	function get_event_i_planed($cid)
	{
		$this->db->from('cam_events_plan_attend');
			$this->db->where('user_id', $cid);
		$this->db->order_by("id", "desc");
		return $this->db->get();
	}
	function get_cam_feed($tbl,$id,$s, $limit = 0)
	{
		$this->db->from($tbl);
		
			$this->db->where('cam_id', $id);
		
		
		$this->db->order_by("id", $s);
		
		if($limit > 0)
			{
				$this->db->limit($limit);
			}
		
		return $this->db->get();
		
	}
	function get_cam_sup($tbl,$id, $limit = 0)
	{
		$this->db->from($tbl);
		
			$this->db->where('cam_id', $id);
			$this->db->where('vote !=', 'I would support the campaign, if it addressed the following');
		
		$this->db->order_by("id", "desc");
		
		if($limit > 0)
			{
				$this->db->limit($limit);
			}
		
		return $this->db->get();
		
	}
	function get_cam_sup_all($tbl,$id, $limit = 0)
	{
		$this->db->from($tbl);
		
			$this->db->where('cam_id', $id);
			//$this->db->where('vote !=', 'I would support the campaign, if it addressed the following');
		
		$this->db->order_by("id", "desc");
		
		if($limit > 0)
			{
				$this->db->limit($limit);
			}
		
		return $this->db->get();
		
	}
	function get_cam_not_sup($tbl,$id, $limit = 0)
	{
		$this->db->from($tbl);
		
			$this->db->where('cam_id', $id);
			$this->db->where('vote', 'I would support the campaign, if it addressed the following');
		
		$this->db->order_by("id", "desc");
		
		if($limit > 0)
			{
				$this->db->limit($limit);
			}
		
		return $this->db->get();
		
	}
	function get_cam_sup_vote($cid,$vote)
	{
		$this->db->from('cam_supporters');
		
			$this->db->where('cam_id', $cid);
			$this->db->where('vote', $vote);
		
		$this->db->order_by("id", "desc");
		
		
		
		return $this->db->get();
		
	}
	function get_post($tbl,$id)
	{
		$this->db->from($tbl);
		
		$this->db->where('id', $id);
		return $this->db->get();
		
	}
	function get_cam_sup_count($cam,$cid)
	{
		$this->db->from('cam_supporters');
		
		$this->db->where('cam_id !=', $cam);
		$this->db->where('user_id', $cid);
		return $this->db->get();
		
	}
	public function is_idea_this_can($user_id,$iid)
	{
		$this->db->from('cam_ideas');
		$this->db->where('id', $iid);
		$this->db->where('user_id', $user_id);
		$rslt = $this->db->get( );
		
		if( $rslt->num_rows() > 0 )	return true;
		return false;
	}
	public function idea_com($iid)
	{
		$this->db->from('cam_ideas_comments');
		$this->db->where('idea_id', $iid);
		return $this->db->get( );

	}
	public function is_idea_vote_by_can($user_id,$iid)
	{
		$this->db->from('cam_ideas_vote');
		$this->db->where('idea_id', $iid);
		$this->db->where('user_id', $user_id);
		$rslt = $this->db->get( );
		
		if( $rslt->num_rows() > 0 )	return false;
		return true;
	}
	public function is_cam_vote_by_can($user_id,$cid)
	{
		$this->db->from('cam_supporters');
		$this->db->where('cam_id', $cid);
		$this->db->where('user_id', $user_id);
		$rslt = $this->db->get( );
		
		if( $rslt->num_rows() > 0 )	return false;
		return true;
	}
	public function idea_vote_count($iid,$vt)
	{
		$this->db->from('cam_ideas_vote');
		$this->db->where('idea_id', $iid);
		$this->db->where('vote', $vt);
		return $this->db->get( );

	}
	public function is_planed_by_can($user_id,$eid)
	{
		$this->db->from('cam_events_plan_attend');
		$this->db->where('event_id', $eid);
		$this->db->where('user_id', $user_id);
		$rslt = $this->db->get( );
		
		if( $rslt->num_rows() > 0 )	return false;
		return true;
	}
	
}
?>