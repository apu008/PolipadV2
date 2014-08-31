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
?>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
      $('.popbox').popbox();
    });
	
  </script>

<section>
	<div class="row">
    
     <div class="wrap-content affangrid">
            <div class="col-full">
                <div class="block03"> 
               
                	<img src="<?=base_url();?>images/fol.png" class="img-stylepq" />
                      <h3 style="color:#999;">We will review and post the campaign shortly. If there is any issue, you will see a message posted on your Page. In the mean time, you can always share the campaign privately.</h3>
              
                 </div>
            </div>
          
        </div>
    
    
    
        <div class="wrap-content affangrid">
            <div class="col-full">
                <div class="block03"> 
                <? if($isadmin == '2' and $row['status'] != 2){ ?>
               <a href="<? echo site_url('candidate/core/'.$cam_id);?>"> <img src="<?=base_url();?>images/edit_more.png" border="0" class="img-style3" /></a>
                <? } ?>
                <?
				if($row['status'] == 0 || $row['status'] == 3 || $row['status'] == 1){
				?>
                <a href="<? echo site_url('candidate/previewShare');?>"><img src="<?=base_url();?>images/share.png" class="img-style3" /></a>
                <? } ?>
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
		
    </div>
    
    
    
	<div class="wrap-content affangrid">
		<div class="row block00">
			<div class="col-full">
			  <div class="block001">
                      <div class="borderdiv">
                       
                        <ol class="mainnevp">Main</ol>
                        <ol class="mainnevgp">Updates</ol>
                        <ol class="mainnevgp">Ideas</ol>
                        <ol class="mainnevgp">Supporters</ol>
                        <ol class="mainnevgp">Feedback</ol>
                       </div>
				</div>
			</div>
          <div class="col-3-4">
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
                         
                         <iframe width="640" height="480" src="<?=$cbrow['cam_video']?>" frameborder="0" allowfullscreen></iframe>
                   		</div>
						<?
						}
						
					}
					?>
				</div>
                	<?
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
             <div class="col-1-4">
			  <div class="block06">
                 <div class="pre-right-round">
               	  	 <?
					$totideas = $this->candidate_model->get_cam('cam_ideas',$cam_id);
					$totcom = $this->candidate_model->get_cam('cam_ideas_comments',$cam_id);
					$totsup = $this->candidate_model->get_cam('cam_supporters',$cam_id);
					$visit = $this->candidate_model->get_cam('visitors',$cam_id);
				?>
               	  <h1 style="padding-top:8px; color:#77933C; font-size:62px;"><?=$totsup->num_rows()?></h1>
					<span style="color:#404040; font-size:14px; font-weight:bold; line-height:40px;">Supporters</span><span style="color:#404040; font-size:12px;  line-height:40px;">&nbsp;|&nbsp;<?=$visit->num_rows()?> Visitors</span><br /><br />


						
                    <h1 style="padding-top:8px; color:#77933C; font-size:62px;"><?=$totcom->num_rows()?></h1>
                    <h3 style="color:#404040; font-size:14px; font-weight:bold;">Feedbacks</h3><br />

						
                      <h1 style="padding-top:8px; color:#77933C; font-size:62px;"><?=$totideas->num_rows()?></h1>
                    <span style="color:#404040; font-size:14px; font-weight:bold; line-height:40px;">Ideas</span><span style="color:#404040; font-size:12px;  line-height:40px;">&nbsp;|&nbsp;<?=$totcom->num_rows()?> comments on ideas</span>
 
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
							<?=$row['event_title']?>.&nbsp;<span class="normallink">|&nbsp;<u>I plan to attend</u></span>
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
                 
				</div>
			</div>
		</div>
	</div>

    
    
    
    
    
    
    
</section>