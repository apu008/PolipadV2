<?
$row = $cam->row_array();
$canid = $row['can_id'];
$camuser = $this->user_model->get_info($canid);
$urow = $camuser->row_array();
$arow = $activeuser->row_array();
$good = $this->candidate_model->get_cam_sup_vote($cam_id,'I support the campaign');
$not_bad = $this->candidate_model->get_cam_sup_vote($cam_id,'I support the campaign and like to help out');
$bad = $this->candidate_model->get_cam_sup_vote($cam_id,'I would support the campaign, if it addressed the following');
$cbrow = $cb->row_array();
?>

<section>


      
    
	<div class="wrap-content affangrid">
		<div class="row block">
	         <div class="col-full">
                  <div class="block001">
                       <?
					if($cb->num_rows() > 0)
					{
						
						?>
						
                         <h1><?=$cbrow['cam_title']?></h1><br />


						
						<?
						
					}
					?>    
                    </div>
                </div>
			<div class="col-full">
			  <div class="block001">
                      <div class="borderdiv">
                       
                        <a href="<? echo site_url('sharecampaign/main/'.$cam_id);?>"><ol class="mainnevgp">Main</ol></a>
                        
                        <a href="<? echo site_url('sharecampaign/updates');?>"><ol class="mainnevgp">Updates</ol></a>
                         <a href="<? echo site_url('sharecampaign/ideas');?>"><ol class="mainnevgp">Ideas</ol></a>
                        <ol class="mainnevp">Supporters</ol>
                        <a href="<? echo site_url('sharecampaign/feedback');?>"><ol class="mainnevgp">Feedback</ol></a>
                       </div>
				</div>
			</div>
        
            
            <div class="col-3-4">
                  <div class="block05">
                     <div class="inner-block">
                              <div class="block-padding">
                            <span style="font-size: 24px; line-height: 40px;font-weight:normal;">I would support if…</span> <span style="line-height: 40px;font-weight:bold;" class="mediamlink">&nbsp;|&nbsp;</span> <a href="<? echo site_url('campaign/supporters');?>" class="mediamlink" style="line-height: 40px;">"List of Supporters"</a>
                        </div>
						<?
							foreach( $supporters->result_array() as $row )
							{

						  		
								
							$post_user = $this->user_model->get_info($row['user_id']);
							$purow = $post_user->row_array();
						  $othercam = $this->candidate_model->get_cam_sup_count($cam_id,$row['user_id']);
						?>
                            <div class="block-update">
                            <div style="width:9%; height:auto; float:left;">
                            <?
								if($purow['photo'] !=''){ $sobi = $purow['photo']; } else {$sobi = 'user.jpg';}
							?>
                            <img src="<?=base_url();?>user_pic/<?=$sobi?>" class="displayed" />

                            </div>
                            <div style="width:89%; float:left; margin-left:2%">
                            <span class="normallink"><?=$purow['name']?>:</span>&nbsp;<span class="postdate">(Posted on: <? $postdate = new DateTime($row['add_date']); echo $postdate->format('jS \o\f F Y');?>)</span><br />
                            
                           
							<?=$row['comments'];?>

                            </div>
                            </div>
						<?
						}
						?>
                     </div>
                 </div>
			</div>

<div class="col-1-4">
			  <div class="block06">
                <div class="pre-right">
               
               	   <h1 style="text-align:center; padding-top:8px; color:#002060;"><?=$good->num_rows()?></h1>
					<h3 style="text-align:center; color:#404040; font-size:14px; font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:20px;">"I support the campaign."</h3>
						
                     <h1 style="text-align:center; padding-top:8px; color:#002060;"><?=$not_bad->num_rows()?></h1>
              <h3 style="text-align:center; color:#404040; font-size:14px; font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:20px;">"I support the campaign and like to help out."</h3>
                                        
                    
                      <h1 style="text-align:center; padding-top:8px; color:#002060;"><?=$bad->num_rows()?></h1>
					<h3 style="text-align:center; color:#404040; font-size:14px; font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:20px;">"I would support if…"</h3>
                      <?
					if($this->session->userdata('user_id') != ''){
 if($this->candidate_model->is_cam_vote_by_can($this->session->userdata('user_id'),$cam_id))
					{   
					?>                
<a href="<? echo site_url('campaign/add_support');?>" class="button2" style="display: block; margin-left: auto; margin-right: auto;">Be  a Supporter</a>
 <? }}else
								{
							?>
                            		<a href="<? echo site_url('welcome/index/'.$cam_id);?>" class="button2" style="display: block; margin-left: auto; margin-right: auto;">Login for Support</a>
                            <?	
								}
							?>
        </div>
               
				</div>
			</div>

            
		</div>
	</div>

   
    
    
    
    
    
</section>