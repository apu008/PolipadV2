<?

$cwyrow = $cwy->row_array();
$cctarow = $ccta->row_array();
$cjrow = $cj->row_array();
$cbrow = $cb->row_array();
$cayrow = $cay->row_array();
$row = $cam->row_array();
$canid = $row['can_id'];
$camuser = $this->user_model->get_info($canid);
$urow = $camuser->row_array();
$arow = $activeuser->row_array();
?>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
      $('.popbox').popbox();
    });
  </script>
<section>

    <div class="wrap-content affangrid">
		<div class="row block03">
			<div class="col-full">
			  <div class="block001">
              
                	<img src="<?=base_url();?>images/fol.png" class="img-stylep" />
                    <h3 style="color:#999">This Campaign is Private, but shared with you!  </h3>
              
				  
                 </div>
            </div>
        </div>
<? if($row['status'] != 2){ ?>
<div style="height:1px; background:#8EB4E3;"></div>
           <? } ?> 
      <div class="wrap-content affangrid">
		<div class="row block03">
			<div class="col-full">
			  <div class="block001">
                     
      <div style="width:200px; height:auto; float:left;">
       <?
					if($cay->num_rows() > 0)
					{
						if($cayrow['profile_pic'] !=''){
						?>
						<img src="<?=base_url();?>cam_pics/<?=$cayrow['profile_pic']?>" class="img-stylepm" />
						
						<?
						}
						else
						{
							?>
							<img src="<?=base_url();?>user_pic/usermid.jpg" class="img-stylepm" />
                            <?
						}
					}
					?>
      </div>
                         <div style="width:73%; float:left; margin-left:2%">
                         
                         
                          <div class="block-margin" style="min-height:100px">
                          <?
					if($cb->num_rows() > 0)
					{
						
						?>
						
                         <h1 style="padding-bottom:10px; padding-top:10px; color:#0070C0; font-size:28px;"><?=$cbrow['cam_title']?></h1>

						
						<?
						
					}
					?>
                         </div>
                         <div class="block-margind">
                         	<h3><?=$urow['name']?></h3>
                         </div>
                         <div class="block-margind"><div class="borderdiv2a"></div></div>
                         <div class="block-margin">
                         	 <?
					if($cay->num_rows() > 0)
					{
						
						?>
						 <u><?=$cayrow['cam_from']?></u>&nbsp;&nbsp;|&nbsp;&nbsp;
						
						<?
						
					}
					?>
                   <?
					if($cb->num_rows() > 0)
					{
						
						?>
						 <u><?=$cbrow['type_of_cam']?></u>
						
						<?
						
					}
					?>
                         </div>
                        
						</div>

                   
                   
   
    
  </div>
                  

              </div>
            </div>

            </div>



        <div style=" padding-bottom:5px;"></div>
		
    
    
	<div class="wrap-content affangrid">
		<div class="row block00">
			<div class="col-full">
			  <div class="block001">
                      <div class="borderdiv">
                       
                        <ol class="mainnevp">Main</ol>
                       
                        <a href="<? echo site_url('sharecampaign/updates');?>"><ol class="mainnevgp">Updates</ol></a>
                        <a href="<? echo site_url('sharecampaign/ideas');?>"><ol class="mainnevgp">Ideas</ol></a>
                        <a href="<? echo site_url('sharecampaign/supporters');?>"><ol class="mainnevgp">Supporters</ol></a>
                        <a href="<? echo site_url('sharecampaign/feedback');?>"><ol class="mainnevgp">Feedback</ol></a>
                      
                       </div>
				</div>
			</div>
         <div class="col-5-7">
			  <div class="block05">
              
              		<?
					if($cb->num_rows() > 0)
					{
						if($cbrow['cam_pic'] !=''){
						?>
                         <div class="inner-block">
                          <img src="<?=base_url();?>cam_pics/<?=$cbrow['cam_pic']?>" />
                   		</div>
						<?
						}
						if($cbrow['cam_video'] !=''){
						?>
                         <div class="inner-block">
                         
                         <iframe width="99%" height="300" src="<?=$cbrow['cam_video']?>" frameborder="0" allowfullscreen></iframe>
                   		</div>
						<?
						}
						
					}
					?>
				</div>
                	
			</div>
             <div class="col-2-7">
			  <div class="block06">
              <div class="pre-right-head">
              <?
              if($stpn == 1)
              {
				  ?>
              <a href="<? echo site_url('sharecampaign/main/'.$cam_id.'/0');?>" class="normallink" style="display: block; margin-left: auto; margin-right: auto;">Remove Stat Panel</a>
               <?
              }
              else
              {
				  ?>
              	<a href="<? echo site_url('sharecampaign/main/'.$cam_id.'/1');?>" class="normallink" style="display: block; margin-left: auto; margin-right: auto;">Add Stat Panel </a>
                <?
              }
			   ?>
              </div>
                	 <?
              if($stpn == 1)
              {
				  ?>
                <div class="pre-right-round">
               	  	 <?
					$totideas = $this->candidate_model->get_cam('cam_ideas',$cam_id);
					$totcom = $this->candidate_model->get_cam('cam_ideas_comments',$cam_id);
					$totsup = $this->candidate_model->get_cam('cam_supporters',$cam_id);
					$visit = $this->candidate_model->get_cam('visitors',$cam_id);
				?>
               	  <h1><?=$totsup->num_rows()?></h1>
					<span style="color:#404040; font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:40px;">Supporters</span><span style="color:#404040; font-size:12px;  line-height:40px;">&nbsp;|&nbsp;<?=$visit->num_rows()?> Visitors</span><br />


						
                    <h1><?=$totcom->num_rows()?></h1>
                    <h3 style="color:#404040; font-size:14px; font-family:Arial, Helvetica, sans-serif; ">Feedbacks</h3>

						
                      <h1><?=$totideas->num_rows()?></h1>
                    <span style="color:#404040; font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:40px;">Ideas</span><span style="color:#404040; font-size:12px;  line-height:40px;">&nbsp;|&nbsp;<?=$totcom->num_rows()?> comments on ideas</span>
 
                  </div>
                  <div class="pre-right-nor">
               	  	
                    <?
					 if($events->num_rows() > 0)
					{
					?>
                   	<h2>Upcoming Events (<?=$events->num_rows();?>)</h2>
                    <div class="blmargin2"></div>
                    <?
						$i = 0;
						foreach( $events->result_array() as $row )
							{
								$i++;
					?>
                    	 <?=$i?>.&nbsp;&nbsp;<? $postdate = new DateTime($row['event_date']); echo $postdate->format('l\, M j\, Y');?><br />
							<?=$row['event_title']?>.<br />
                            <?
								if($this->session->userdata('user_id') != ''){
								if($this->candidate_model->is_planed_by_can($this->session->userdata('user_id'),$row['id']))
								{
							?>
<a href="<? echo site_url('campaign/plan_attend_event/'.$row['id'].'/'.$cam_id);?>" class="normallink" style="display: block; margin-left: auto; margin-right: auto;">I plan to attend</a>
							<?
								}else{
                            ?>
                            	<span class="normallink"><u>You planed to attend</u></span>
                            <?
								}
								}else
								{
							?>
                            		<a href="<? echo site_url('welcome/index/'.$cam_id);?>" class="normallink" style="display: block; margin-left: auto; margin-right: auto;">Login for attend</a>
                            <?	
								}
							?>
                         <div class="blmargin2"></div>
                    <?
						}
					
					}else{
					?>
                    	 <h2>Upcoming Events (<?=$events->num_rows();?>)</h2><br />
                          <p style="line-height:20px;">Upcoming events will be posted soon.</p>
                    <?
					}
					?>
                  </div>
                   <?
					}else{
					?>
<br />
<br />
<br />
<br />

                    <div style="width:20px; float:left;">
                    <img src="<?=base_url();?>images/line.png">
                    </div>
                    <div style="width:200px; float:left;">
                    <h3 style="color:#0070C0">Campaign Summary</h3>
                    <?
                    if($cb->num_rows() > 0)
					{
						echo $cbrow['cam_goal'];
					}
					?>
                    </div>
                     <?
					}
					?>
                 
				</div>
			</div>
		</div>
	</div>

    
    
    
    
  <div class="wrap-content affangrid">
		<div class="row block00">
			
          <div class="col-full">
			 
                	<?
					
				  if($stpn == 1)
				  {
			
					if($cb->num_rows() > 0)
					{
					?>
                         <div class="block05">
                        <div class="inner-block-round">
                            <h2 style="color:#002060">Campaign Summary</h2>
                             <?=$cbrow['cam_goal']?>
                            </div> 
                            </div> 
                   <?
					}
				  }
					?>
               		<?
					if($cj->num_rows() > 0)
					{
					?>
                         <div class="block05">
                        <div class="inner-block-round">
                            <h2 style="color:#002060">Purpose  of the campaign</h2>
                             <?=$cjrow['justify']?>
                            </div> 
                            </div> 
                   <?
					}

					if($cwy->num_rows() > 0)
					{
					?>
                         <div class="block05">
                        <div class="inner-block-round">
                            <h2 style="color:#002060">Why you?</h2>
                             <?=$cwyrow['why_you']?>
                            </div> 
                            </div> 
                   <?
					}
					?>
                    
                    <?
                    if($ccta->num_rows() > 0)
					{
					?>
                         <div class="block05">
                        <div class="inner-block-round">
                            <h2 style="color:#002060">Call to Action</h2>
                             <?=$cctarow['call_to_action']?>
                            </div> 
                            </div> 
                   <?
					} 
					?>
			</div>
            <div class="block05" style="padding-left:20px; padding-right:20px;">
             <?
			 if($uplist->num_rows() > 0)
						{
			 ?>          
             <a href="<? echo site_url('campaign/updates');?>" class="normallink">See updates & more</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
             <? } ?>
             <a href="<? echo site_url('campaign/add_idea');?>" class="normallink" >Contribute Idea</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="<? echo site_url('campaign/add_support');?>" class="normallink">Support this campaign</a>
                            
           </div> 
             <?
              if($stpn == 0)
              {
				  ?>
            <div class="block05" style="padding-left:20px; padding-right:20px;">
                       
             <?
					 if($events->num_rows() > 0)
					{
					?>
                   	<h2 style="color:#002060">Upcoming Events (<?=$events->num_rows();?>)</h2>
                    <div class="blmargin2"></div>
                    <?
						$i = 0;
						foreach( $events->result_array() as $row )
							{
								$i++;
					?>
                    	 <?=$i?>.&nbsp;&nbsp;<? $postdate = new DateTime($row['event_date']); echo $postdate->format('l\, M j\, Y');?><br />
							<?=$row['event_title']?>.<br />
                            <?
								if($this->session->userdata('user_id') != ''){
								if($this->candidate_model->is_planed_by_can($this->session->userdata('user_id'),$row['id']))
								{
							?>
<a href="<? echo site_url('campaign/plan_attend_event/'.$row['id'].'/'.$cam_id);?>" class="normallink" style="display: block; margin-left: auto; margin-right: auto;">I plan to attend</a>
							<?
								}else{
                            ?>
                            	<span class="normallink"><u>You planed to attend</u></span>
                            <?
								}
								}else
								{
							?>
                            		<a href="<? echo site_url('welcome/index/'.$cam_id);?>" class="normallink" style="display: block; margin-left: auto; margin-right: auto;">Login for attend</a>
                            <?	
								}
							?>
                         <div class="blmargin2"></div>
                    <?
						}
					
					}else{
					?>
                    	 <h2 style="color:#002060">Upcoming Events (<?=$events->num_rows();?>)</h2>
                          <p style="line-height:20px;">Upcoming events will be posted soon.</p>
                    <?
					}
					?>
                            
           </div> 
             <?
					}
					?><br />
<br />

		</div>
        
	</div>  
    
    
</section>