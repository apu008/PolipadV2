<section id="content">
	<div class="wrap-content affangrid">
		<div class="row block" style="margin-bottom:10px;">
        	<div class="col-full">
				
                <div class="block01" style="margin-top:10px;">
						 <div style="width:200px; height:auto; float:left;">	
                        <?
							$post_user = $this->user_model->get_info($this->session->userdata('user_id'));
							$purow = $post_user->row_array();

								if($purow['photo'] !=''){ $sobi = $purow['photo']; } else {$sobi = 'usermid.jpg';}
							?>
                            <img src="<?=base_url();?>user_pic/<?=$sobi?>" class="displayed" />
					</div>
                   
                     <div style="width:70%; float:left; margin-left:2%; padding-top:10px;">
                     <h1 style="color:#00366C">My Page: Dash Board</h1><br />
<br />
<h2 style="color:#333333;"><?=$this->session->userdata('name')?></h2>
<div class="dasmiddag"></div>
 <a href="<? echo site_url('registration/updatepicture');?>" class="normallink">Update Profile Picture</a> &nbsp;|&nbsp; <a href="<? echo site_url('registration/updateaccount');?>" class="normallink">Change Account Information</a> &nbsp;|&nbsp; <a href="<? echo site_url('polipads');?>" class="normallink">Back to Polipad Home</a>
                    <?php /*?><a href="<? echo site_url('candidate/basics');?>" class="normallink"><h3>Start Campaign</h3></a><?php */?>
                    </div>
                </div>
			</div>
         </div>
           
           
           
             <?
					$m=0;
					if($rcam->num_rows() > 0 || $dcam->num_rows() > 0 || $pcam->num_rows() > 0)
					{
						?>
                         <div class="row blockmypage">
							<div class="col-full">
                        		<div class="block01">
                         <h2 style="color:#666666;">Message from Polipad:</h2>

                        <?
						if($rcam->num_rows() > 0)
						{
						foreach( $rcam->result_array() as $row )
						{
							$m++;
						?>
                   <div style="margin-top:10px;">
                   <h4><?=$m?>.&nbsp;<a href="<? echo site_url('campaign/main/'.$row['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$row['cam_title']?></a>&nbsp;&nbsp;<span style="color:#B70000; font-size:14px; font-weight:bold;">[Rejected]</span> <span style="color:#B70000; font-size:12px;">Reason: <?=$row['reject_cause']?></span></h4>
                   </div>
                  
                   <?
				    if($row['notes'] !='')
					{
						
						$d1 = $row['admin_note_date'];
						$d2 = date('Y-m-d');


				   ?>
                   
                   <div style="margin-top:10px;">
                   <span class="smalllink-gray">Posted On: <? $postdate = new DateTime($row['admin_note_date']); echo $postdate->format('jS \o\f F Y');?></span><br />
                   <span style="color:#0066CC">Comment from Reviewer:</span> <?=$row['notes']?></div>

                  
                  <?
					}
					}
                   }
				   ?>
                    <?
						if($pcam->num_rows() > 0)
						{
							//echo '<br>';
						foreach( $pcam->result_array() as $row )
						{
							$m++;
						?>
                   <div style="margin-top:10px;">
                   <h4><?=$m?>.&nbsp;<a href="<? echo site_url('campaign/main/'.$row['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$row['cam_title']?></a>&nbsp;&nbsp;<span style="color:#0066CC; font-size:14px; font-weight:bold;">[Approved]</span></h4>
                   </div>
                  
                   <?
				    if($row['notes'] !='')
					{
						
						$d1 = $row['admin_note_date'];
						$d2 = date('Y-m-d');


				   ?>
                   
                   <div style="margin-top:10px;">
                   <span class="smalllink-gray">Posted On: <? $postdate = new DateTime($row['admin_note_date']); echo $postdate->format('jS \o\f F Y');?></span><br />
                  <span style="color:#0066CC"> Comment from Reviewer:</span> <?=$row['notes']?></div>

                  
                  <?
					}
					}
                   }
				   ?>
                   <?
						if($dcam->num_rows() > 0)
						{
							//echo '<br>';
						foreach( $dcam->result_array() as $row )
						{
							$m++;
						?>
                   <div style="margin-top:10px;">
                   <h4><?=$m?>.&nbsp;<a href="<? echo site_url('campaign/main/'.$row['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$row['cam_title']?></a>&nbsp;&nbsp;<span style="color:#0066CC; font-size:14px; font-weight:bold;">[Currently In Review]</span></h4>
                   </div>

                   
                   <div style="margin-top:10px;">
                   <span class="smalllink-gray">Submitted on: <? $postdate = new DateTime($row['last_update']); echo $postdate->format('jS \o\f F Y');?></span></div>

                  
                  <?

					}
                   }
				   ?>
                   </div>
                   </div>
					</div>
                    <?
                   }
				   ?> 
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
                   <?
					if($pcam->num_rows() > 0)
					{
						?>
                         <div class="row blockmypage">
							<div class="col-full">
                        		<div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0048_image006.png" class="img-styleland" />Public Campaigns you have launched:</h2>

                        <?
						foreach( $pcam->result_array() as $row )
						{
							$cb = $this->candidate_model->get_cam('cam_basic',$row['id']);
							$totsup = $this->candidate_model->get_cam('cam_supporters',$row['id']);
							$visit = $this->candidate_model->get_cam('visitors',$row['id']);
							$totideas = $this->candidate_model->get_cam('cam_ideas',$row['id']);
							$totcom = $this->candidate_model->get_cam('cam_ideas_comments',$row['id']);
							
$good = $this->candidate_model->get_cam_sup_vote($row['id'],'I support the campaign');
$not_bad = $this->candidate_model->get_cam_sup_vote($row['id'],'I support the campaign and like to help out');
$bad = $this->candidate_model->get_cam_sup_vote($row['id'],'I would support the campaign, if it addressed the following');
					?>
                   <div style="margin-top:10px;">
                   <h4><a href="<? echo site_url('campaign/main/'.$row['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$row['cam_title']?></a></h4>
                   </div>
                   <?
                   if($cb->num_rows() > 0)
					{
						$cbrow = $cb->row_array();
						$gol = substr($cbrow['cam_goal'], 0, 140);
						$gol = str_replace('<p>','',$gol);
						$gol = str_replace('</p>','<br />',$gol);
                    ?>
                   
                   
                   <div style="margin-top:10px;"><?=$gol?> ... <a href="<? echo site_url('campaign/main/'.$row['id']);?>" style="color:#666666; text-decoration:none;">(More)</a></div>
                   
                 
                   <?
                   }
				   ?>
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:49%;float:left; padding-left:20px;">
                   <span class="smalllink-gray">
                    
<?=$good->num_rows()?> support the campaign.<br />

<?=$not_bad->num_rows()?> support the campaign and like to help out<br />

<?=$bad->num_rows()?> would support if…<br />

Ideas and comments posted: <?=$totideas->num_rows()+$totcom->num_rows();?><br />

Total Number of Interactions: <?=$totideas->num_rows()+$totcom->num_rows()+$totsup->num_rows();?>

                    
                    
                    </span>

                   </div>
                   <div style="background:#666666;width:1px;float:left; height:auto;">
                   <br />
                    <br />
                    <br />
                    <br />
                    <br />
					</div>
					<div style="width:45%;float:left; padding-left:20px;">
                    <span class="smalllink-gray"><br />
                    Launched on: <? $postdate = new DateTime($row['launched_on']); echo $postdate->format('jS \o\f F Y');?>.<br />
					Last updated on: <? $postdate = new DateTime($row['last_update']); echo $postdate->format('jS \o\f F Y');?>.<br />
					Viewed by: <?=$visit->num_rows()?>
                    </span>
                    </div>
                   	
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>
                   </div>
					</div>
                    <?
                   }
				   ?> 
        
            <?
					if($scam->num_rows() > 0)
					{
						?>
                         <div class="row blockmypage">
						<div class="col-full">
                        <div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0048_image006.png" class="img-styleland" />Campaigns you have submited for Approval:</h2>

                        <?
						foreach( $scam->result_array() as $row )
						{
							$cb = $this->candidate_model->get_cam('cam_basic',$row['id']);
							$totsup = $this->candidate_model->get_cam('cam_supporters',$row['id']);
							$visit = $this->candidate_model->get_cam('visitors',$row['id']);
							$totideas = $this->candidate_model->get_cam('cam_ideas',$row['id']);
							$totcom = $this->candidate_model->get_cam('cam_ideas_comments',$row['id']);
							
$good = $this->candidate_model->get_cam_sup_vote($row['id'],'I support the campaign');
$not_bad = $this->candidate_model->get_cam_sup_vote($row['id'],'I support the campaign and like to help out');
$bad = $this->candidate_model->get_cam_sup_vote($row['id'],'I would support the campaign, if it addressed the following');
					?>
                   <div style="margin-top:10px;">
                   <h4><a href="<? echo site_url('candidate/preview/'.$row['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$row['cam_title']?></a></h4><?php /*?><a href="<? echo site_url('candidate/core/'.$row['id']);?>" style="color:#F00">Edit</a><?php */?>
                   </div>
                   <?
                   if($cb->num_rows() > 0)
					{
						$cbrow = $cb->row_array();
						$gol = substr($cbrow['cam_goal'], 0, 140);
						$gol = str_replace('<p>','',$gol);
						$gol = str_replace('</p>','<br />',$gol);
                    ?>
                   
                   
                   <div style="margin-top:10px;"><? echo $gol;?> ... <a href="<? echo site_url('campaign/main/'.$row['id']);?>" style="color:#666666; text-decoration:none;">(More)</a></div>
                   
                 
                   <?
                   }
				   ?>
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:49%;float:left; padding-left:20px;">
                   <span class="smalllink-gray">
                    
<?=$good->num_rows()?> support the campaign.<br />

<?=$not_bad->num_rows()?> support the campaign and like to help out<br />

<?=$bad->num_rows()?> would support if…<br />

Ideas and comments posted: <?=$totideas->num_rows()+$totcom->num_rows();?><br />

Total Number of Interactions: <?=$totideas->num_rows()+$totcom->num_rows()+$totsup->num_rows();?>

                    
                    
                    </span>

                   </div>
                   <div style="background:#666666;width:1px;float:left; height:auto;">
                   <br />
                    <br />
                    <br />
                    <br />
                    <br />
					</div>
					<div style="width:45%;float:left; padding-left:20px;">
                    <span class="smalllink-gray"><br />
                    Launched on: <? $postdate = new DateTime($row['launched_on']); echo $postdate->format('jS \o\f F Y');?>.<br />
					Last updated on: <? $postdate = new DateTime($row['last_update']); echo $postdate->format('jS \o\f F Y');?>.<br />
					Viewed by: <?=$visit->num_rows()?>
                    </span>
                    </div>
                   	
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>
                   </div>
					</div>	
                    <?
                   }
				   ?> 
       			 
             
            		  <?
					if($pvcam->num_rows() > 0)
					{
						?>
                        <div class="row blockmypage">
						<div class="col-full">
                        <div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0048_image008.png" class="img-styleland" />Private Campaigns you have launched:</h2>

                        <?
						foreach( $pvcam->result_array() as $row )
						{
							$cb = $this->candidate_model->get_cam('cam_basic',$row['id']);
							$totsup = $this->candidate_model->get_cam('cam_supporters',$row['id']);
							$visit = $this->candidate_model->get_cam('visitors',$row['id']);
							$totideas = $this->candidate_model->get_cam('cam_ideas',$row['id']);
							$totcom = $this->candidate_model->get_cam('cam_ideas_comments',$row['id']);
							
$good = $this->candidate_model->get_cam_sup_vote($row['id'],'I support the campaign');
$not_bad = $this->candidate_model->get_cam_sup_vote($row['id'],'I support the campaign and like to help out');
$bad = $this->candidate_model->get_cam_sup_vote($row['id'],'I would support the campaign, if it addressed the following');
					?>
                   <div style="margin-top:10px;">
                   <h4><a href="<? echo site_url('candidate/preview/'.$row['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$row['cam_title']?></a></h4><?php /*?><a href="<? echo site_url('candidate/core/'.$row['id']);?>" style="color:#F00">Edit</a><?php */?>
                   </div>
                   <?
                   if($cb->num_rows() > 0)
					{
						$cbrow = $cb->row_array();
						$gol = substr($cbrow['cam_goal'], 0, 140);
						$gol = str_replace('<p>','',$gol);
						$gol = str_replace('</p>','<br />',$gol);
                    ?>
                   
                   
                   <div style="margin-top:10px;"><? echo $gol;?> ... <a href="<? echo site_url('campaign/main/'.$row['id']);?>" style="color:#666666; text-decoration:none;">(More)</a></div>
                   
                 
                   <?
                   }
				   ?>
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:49%;float:left; padding-left:20px;">
                   <span class="smalllink-gray">
                    
<?=$good->num_rows()?> support the campaign.<br />

<?=$not_bad->num_rows()?> support the campaign and like to help out<br />

<?=$bad->num_rows()?> would support if…<br />

Ideas and comments posted: <?=$totideas->num_rows()+$totcom->num_rows();?><br />

Total Number of Interactions: <?=$totideas->num_rows()+$totcom->num_rows()+$totsup->num_rows();?>

                    
                    
                    </span>

                   </div>
                   <div style="background:#666666;width:1px;float:left; height:auto;">
                   <br />
                    <br />
                    <br />
                    <br />
                    <br />
					</div>
					<div style="width:45%;float:left; padding-left:20px;">
                    <span class="smalllink-gray"><br />
                    Launched on: <? $postdate = new DateTime($row['launched_on']); echo $postdate->format('jS \o\f F Y');?>.<br />
					Last updated on: <? $postdate = new DateTime($row['last_update']); echo $postdate->format('jS \o\f F Y');?>.<br />
					Viewed by: <?=$visit->num_rows()?>
                    </span>
                    </div>
                   	
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>	
                   </div>
					</div>
                    <?
                   }
				   ?> 
            
            	
            
             
            		 <?
					if($drcam->num_rows() > 0)
					{
						?>
                        <div class="row blockmypage">
				<div class="col-full">
                        <div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0048_image004.png" class="img-styleland" />Campaign page(s) under construction:</h2>

                        <?
						foreach( $drcam->result_array() as $row )
						{
							$cb = $this->candidate_model->get_cam('cam_basic',$row['id']);
							$totsup = $this->candidate_model->get_cam('cam_supporters',$row['id']);
							$visit = $this->candidate_model->get_cam('visitors',$row['id']);
							$totideas = $this->candidate_model->get_cam('cam_ideas',$row['id']);
							$totcom = $this->candidate_model->get_cam('cam_ideas_comments',$row['id']);
							

					?>
                   <div style="margin-top:10px;">
                   <h4><a href="<? echo site_url('candidate/preview/'.$row['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$row['cam_title']?></a></h4><?php /*?><a href="<? echo site_url('candidate/core/'.$row['id']);?>" style="color:#F00">Edit</a><?php */?>
                   </div>
                   <?
                   if($cb->num_rows() > 0)
					{
						$cbrow = $cb->row_array();
						$gol = substr($cbrow['cam_goal'], 0, 140);
						$gol = str_replace('<p>','',$gol);
						$gol = str_replace('</p>','<br />',$gol);
                    ?>
                   
                   
                   <div style="margin-top:10px;"><? echo $gol;?> ... <a href="<? echo site_url('campaign/main/'.$row['id']);?>" style="color:#666666; text-decoration:none;">(More)</a></div>
                   
                 
                   <?
                   }
				   ?>
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:99%;float:left; padding-left:20px;">
                   <span class="smalllink-gray">
                    
					Last updated on: <? $postdate = new DateTime($row['last_update']); echo $postdate->format('jS \o\f F Y');?>.
                    
                    
                    </span>

                   </div>
                  </div>
                   
                  <?
                   }
				   ?>
                   </div>	
                   </div>
			</div>
                    <?
                   }
				   ?> 
            
            	
            
            
             
            		 <?
					$events = $this->candidate_model->get_event_can('cam_events',$this->session->userdata('user_id'));	
					 if($events->num_rows() > 0)
						{
				 ?>
                        <div class="row blockmypage">
				<div class="col-full">
                        <div class="block01" style="margin-bottom:10px;">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0048_image010.png" class="img-styleland" />Upcoming events hosted by you:</h2>

                        <?
						foreach( $events->result_array() as $row )
						{
							
							$planed = $this->candidate_model->get_event_planed($row['id']);		

					?>
                   <div style="margin-top:10px;">
                   <h4 style="color:#000000; font-weight:bold;"><?=$row['event_title']?>&nbsp;(<?=$row['place']?>)</h4>
                   </div>
                  
                   
                   
                   <div style="margin-top:10px;">Event Time:&nbsp;&nbsp;<? $postdate = new DateTime($row['event_date']); echo $postdate->format('l\, M j\, Y');?>.&nbsp;<?=$planed->num_rows()?> plan to attend.
                   </div>
                   
                  <?
                   }
				   ?>
                   </div>	
                   </div>
			</div>
                    <?
                   }
				   ?> 
            
            	
            
            
             
            		  <?
					$planed = $this->candidate_model->get_event_i_planed($this->session->userdata('user_id'));	
					 if($planed->num_rows() > 0)
						{
				 ?>
                         <div class="row blockmypage">
				<div class="col-full">
                         <div class="block01" style="margin-bottom:10px;">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0046_image024.png" class="img-styleland" />Upcoming events you wanted to join:</h2>

                        <?
						foreach( $planed->result_array() as $row )
						{
							
							$eid = $row['id'];
							$edetails = mysql_query("select * from cam_events where id = '$eid'");
							$edef = mysql_fetch_array($edetails);
							$planeddd = $this->candidate_model->get_event_planed($row['id']);

					?>
                   <div style="margin-top:10px;">
                   <h4 style="color:#000000; font-weight:bold;"><?=$edef['event_title']?>&nbsp;(<?=$edef['place']?>)</h4>
                   </div>
                  
                   
                   
                   <div style="margin-top:10px;">Event Time:&nbsp;&nbsp;<? $postdate = new DateTime($edef['event_date']); echo $postdate->format('l\, M j\, Y');?>.&nbsp;<?=$planeddd->num_rows()?> plan to attend.
                   </div>
                   
                  <?
                   }
				   ?>
                   </div>	
                   </div>
			</div>
                    <?
                   }
				   ?> 
                   
           
            		<?
					$uid = $this->session->userdata('user_id');
$sup = mysql_query("select * from cam_supporters where user_id = '$uid' and vote='I support the campaign and like to help out'");
if(mysql_num_rows($sup)>0){
	
						?>
                         <div class="row blockmypage">
				<div class="col-full">
                        <div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0046_image028.png" class="img-styleland" />Campaign(s) you are supporting and like to help out:</h2>

                        <?
							while($suf = mysql_fetch_array($sup))
							{
							$ccid = $suf['cam_id'];
							$camf = $this->candidate_model->get_cam('campaign',$suf['cam_id']);
							$ting = $camf->row_array();
							$cb = $this->candidate_model->get_cam('cam_basic',$suf['cam_id']);
							$cbrow = $cb->row_array();
							$cta = $this->candidate_model->get_cam('cam_call_to_action',$suf['cam_id']);
							$ctarow = $cta->row_array();
							$post_user = $this->user_model->get_info($ting['can_id']);
							$purow = $post_user->row_array();
							$gol = substr($cbrow['cam_goal'], 0, 140);
						$gol = str_replace('<p>','',$gol);
						$gol = str_replace('</p>','<br />',$gol);

					?>
                    
                   <div style="margin-top:10px;">
                   <h4><a href="<? echo site_url('campaign/main/'.$ting['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$cbrow['cam_title']?></a></h4>
                   </div>
                  
                   
                   
                   <div style="margin-top:10px;"><? echo $gol;?> ... <a href="<? echo site_url('campaign/main/'.$ting['id']);?>" style="color:#666666; text-decoration:none;">(More)</a></div>
                   
                 
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:49%;float:left; padding-left:20px; padding-right:20px;">
                   <span class="smalllink-gray">
                    Call to Action:<br />
					                   
                    <? echo substr($ctarow['call_to_action'], 0, 200);?>
                    </span>

                   </div>
                   <div style="background:#666666;width:1px;float:left; height:auto;">
                   <br />
                    <br />
                    <br />
                    <br />
                    <br />
					</div>
					<div style="width:40%;float:left; padding-left:20px;">
                    <span class="smalllink-gray"><br />
                    Launched by: <?=$purow['name']?><br />
                    Launched on: <? $postdate = new DateTime($ting['launched_on']); echo $postdate->format('jS \o\f F Y');?>.<br />
					Last updated on: <? $postdate = new DateTime($ting['last_update']); echo $postdate->format('jS \o\f F Y');?>.<br />
					
                    </span>
                    </div>
                  
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>	
                   </div>
			</div>
                    <?
                   }
				   ?>  
            
       <?
			$sup = mysql_query("select * from cam_supporters where user_id = '$uid' and vote='I support the campaign'");
			if(mysql_num_rows($sup)>0){
	
						?>
                         <div class="row blockmypage">
				<div class="col-full">
                        <div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0046_image028.png" class="img-styleland" />Campaign(s) you are supporting:</h2>

                        <?
							while($suf = mysql_fetch_array($sup))
							{
							$ccid = $suf['cam_id'];
							$camf = $this->candidate_model->get_cam('campaign',$suf['cam_id']);
							$ting = $camf->row_array();
							$cb = $this->candidate_model->get_cam('cam_basic',$suf['cam_id']);
							$cbrow = $cb->row_array();
							
							$post_user = $this->user_model->get_info($ting['can_id']);
							$purow = $post_user->row_array();
							$gol = substr($cbrow['cam_goal'], 0, 140);
						$gol = str_replace('<p>','',$gol);
						$gol = str_replace('</p>','<br />',$gol);

					?>
                    
                   <div style="margin-top:10px;">
                   <h4><a href="<? echo site_url('campaign/main/'.$ting['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$cbrow['cam_title']?></a></h4>
                   </div>
                  
                   
                   
                   <div style="margin-top:10px;"><? echo $gol;?> ... <a href="<? echo site_url('campaign/main/'.$ting['id']);?>" style="color:#666666; text-decoration:none;">(More)</a></div>
                   
                 
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:99%;float:left; padding-left:20px; padding-right:20px;">
                   <span class="smalllink-gray">
                    Launched by: <?=$purow['name']?>&nbsp;|&nbsp;Launched on: <? $postdate = new DateTime($ting['launched_on']); echo $postdate->format('jS \o\f F Y');?>.&nbsp;|&nbsp;Last updated on: <? $postdate = new DateTime($ting['last_update']); echo $postdate->format('jS \o\f F Y');?>.
					
                    </span>

                   </div>
                  
                  
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>	
                   </div>
			</div>
                    <?
                   }
				   ?>  
                   
                   
                   <?
					
$sup = mysql_query("select * from cam_supporters where user_id = '$uid' and vote='I would support the campaign, if it addressed the following'");
if(mysql_num_rows($sup)>0){
	
						?>
                         <div class="row blockmypage">
				<div class="col-full">
                        <div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0046_image030.png" class="img-styleland" />Campaign(s) you would support if...:</h2>

                        <?
							while($suf = mysql_fetch_array($sup))
							{
							$ccid = $suf['cam_id'];
							$camf = $this->candidate_model->get_cam('campaign',$suf['cam_id']);
							$ting = $camf->row_array();
							$cb = $this->candidate_model->get_cam('cam_basic',$suf['cam_id']);
							$cbrow = $cb->row_array();
							$post_user = $this->user_model->get_info($ting['can_id']);
							$purow = $post_user->row_array();
							$gol = substr($cbrow['cam_goal'], 0, 140);
						$gol = str_replace('<p>','',$gol);
						$gol = str_replace('</p>','<br />',$gol);

					?>
                    
                   <div style="margin-top:10px;">
                   <h4><a href="<? echo site_url('campaign/main/'.$ting['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$cbrow['cam_title']?></a></h4>
                   </div>
                  
                   
                   
                   <div style="margin-top:10px;"><? echo $gol;?> ... <a href="<? echo site_url('campaign/main/'.$ting['id']);?>" style="color:#666666; text-decoration:none;">(More)</a></div>
                   
                 
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:49%;float:left; padding-left:20px; padding-right:20px;">
                   <span class="smalllink-gray">
                    You would support if...:<br />
					                   
                    <? echo substr($suf['comments'], 0, 140);?>
                    </span>

                   </div>
                   <div style="background:#666666;width:1px;float:left; height:auto;">
                   <br />
                    <br />
                    <br />
                    <br />
                    <br />
					</div>
					<div style="width:40%;float:left; padding-left:20px;">
                    <span class="smalllink-gray"><br />
                    Launched by: <?=$purow['name']?><br />
                    Launched on: <? $postdate = new DateTime($ting['launched_on']); echo $postdate->format('jS \o\f F Y');?>.<br />
					Last updated on: <? $postdate = new DateTime($ting['last_update']); echo $postdate->format('jS \o\f F Y');?>.<br />
					
                    </span>
                    </div>
                  
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>	
                   </div>
			</div>
                    <?
                   }
				   ?> 
                   
                   <?
					
$ide = mysql_query("select * from cam_ideas where user_id = '$uid'");
if(mysql_num_rows($ide)>0){
	
						?>
                         <div class="row blockmypage">
				<div class="col-full">
                        <div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0046_image032.png" class="img-styleland" />Idea(s) you have developed:</h2>

                        <?
							while($idef = mysql_fetch_array($ide))
							{
							$iid = $idef['id'];
							$ccid = $idef['cam_id'];
							$qdeg = mysql_query("select * from cam_ideas_vote where idea_id = '$iid' and vote = 'Idea is good and practical'");
							$qde = mysql_query("select * from cam_ideas_vote where idea_id = '$iid' and vote = 'Idea is good, but not practical'");
							$icom = mysql_query("select * from cam_ideas_comments where idea_id = '$iid'");
							$cb = $this->candidate_model->get_cam('cam_basic',$idef['cam_id']);
							$cbrow = $cb->row_array();

						?>
                   

                   <div style="margin-top:10px;">
                   <h4 style="color:#000000; font-weight:bold; text-decoration:none;"><a href="<? echo site_url('campaign/main/'.$ccid);?>" style="color:#000000;text-decoration:none;"><?=$idef['idea_title']?></a></h4>
                   </div>
                   
                  
                 
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-top:10px; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:49%;float:left; padding-left:20px; padding-right:20px;">
                   <span class="smalllink-gray">
                    <?=mysql_num_rows($qdeg)?> thought your idea is good and practical<br />
<?=mysql_num_rows($qde)?> thought your idea is not practical<br />
<?=mysql_num_rows($icom)?> left comment comments on your idea
                    </span>

                   </div>
                   <div style="background:#666666;width:1px;float:left; height:auto;">
                   <br />
                    <br />
                    <br />

					</div>
					<div style="width:40%;float:left; padding-left:20px;">
                    <span class="smalllink-gray">
                    Posted on: <? $postdate = new DateTime($idef['add_date']); echo $postdate->format('jS \o\f F Y');?><br />
                    Total Number of Interactions: <?=mysql_num_rows($qdeg)+mysql_num_rows($qde)?><br />
					
                    </span>
                    </div>
                  
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>	
                   </div>
			</div>
                    <?
                   }
				   ?> 
                   
                   
                    <?
					
$iicom = mysql_query("select * from cam_ideas_vote where user_id = '$uid' and vote = 'Idea is good and practical'") or die(mysql_error());
if(mysql_num_rows($iicom)>0){
	
						?>
                         <div class="row blockmypage">
				<div class="col-full">
                        <div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0047_image046.png" class="img-styleland" />You voted on following ideas as good and practical:</h2>

                        <?
							while($iicomf = mysql_fetch_array($iicom))
							{
							$iiid = $iicomf['idea_id'];
							$ccid = $iicomf['cam_id'];
							$ide = mysql_query("select * from cam_ideas where id = '$iiid'");
							$idef = mysql_fetch_array($ide);
							$qdeg = mysql_query("select * from cam_ideas_vote where idea_id = '$iiid' and vote = 'Idea is good and practical'");
							$qde = mysql_query("select * from cam_ideas_vote where idea_id = '$iiid' and vote = 'Idea is good, but not practical'");
							$icom = mysql_query("select * from cam_ideas_comments where idea_id = '$iiid'");
							$cb = $this->candidate_model->get_cam('cam_basic',$iicomf['cam_id']);
							$cbrow = $cb->row_array();
							$post_user = $this->user_model->get_info($iicomf['user_id']);
							$purow = $post_user->row_array();
							

						?>
                   

                   <div style="margin-top:10px;">
                   <h4 style="color:#000000; font-weight:bold; text-decoration:none;"><?=$idef['idea_title']?></h4>
                   </div>
                   <div style="margin-top:10px;">
				   <span class="normallink">Developed for campaign: </span><a href="<? echo site_url('campaign/main/'.$ccid);?>" style="color:#000000;text-decoration:none;"><?=$cbrow['cam_title']?></a>
                   
                   </div>
                  
                 
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-top:10px; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:49%;float:left; padding-left:20px; padding-right:20px;">
                   <span class="smalllink-gray">
                    <?=mysql_num_rows($qdeg)?> thought your idea is good and practical<br />
<?=mysql_num_rows($qde)?> thought your idea is not practical
                    </span>

                   </div>
                   <div style="background:#666666;width:1px;float:left; height:auto;">
                   <br />
                    <br />
                   
					</div>
					<div style="width:40%;float:left; padding-left:20px;">
                    <span class="smalllink-gray">
                    Posted by: <?=$purow['name']?><br />
                    Posted on: <? $postdate = new DateTime($idef['add_date']); echo $postdate->format('jS \o\f F Y');?>
                    
					
                    </span>
                    </div>
                  
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>	
                   </div>
			</div>
                    <?
                   }
				   ?> 
                   
                    <?
					
$iicom = mysql_query("select * from cam_ideas_vote where user_id = '$uid' and vote = 'Idea is good, but not practical'") or die(mysql_error());
if(mysql_num_rows($iicom)>0){
	
						?>
                         <div class="row blockmypage">
				<div class="col-full">
                        <div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0047_image042.png" class="img-styleland" />You voted on following ideas as not practical:</h2>

                        <?
							while($iicomf = mysql_fetch_array($iicom))
							{
							$iiid = $iicomf['idea_id'];
							$ccid = $iicomf['cam_id'];
							$ide = mysql_query("select * from cam_ideas where id = '$iiid'");
							$idef = mysql_fetch_array($ide);
							$qdeg = mysql_query("select * from cam_ideas_vote where idea_id = '$iiid' and vote = 'Idea is good and practical'");
							$qde = mysql_query("select * from cam_ideas_vote where idea_id = '$iiid' and vote = 'Idea is good, but not practical'");
							$icom = mysql_query("select * from cam_ideas_comments where idea_id = '$iiid'");
							$cb = $this->candidate_model->get_cam('cam_basic',$iicomf['cam_id']);
							$cbrow = $cb->row_array();
							$post_user = $this->user_model->get_info($iicomf['user_id']);
							$purow = $post_user->row_array();

						?>
                   

                   <div style="margin-top:10px;">
                   <h4 style="color:#000000; font-weight:bold; text-decoration:none;"><?=$idef['idea_title']?></h4>
                   </div>
                   <div style="margin-top:10px;">
				   <span class="normallink">Developed for campaign: </span><a href="<? echo site_url('campaign/main/'.$ccid);?>" style="color:#000000;text-decoration:none;"><?=$cbrow['cam_title']?></a>
                   
                   </div>
                  
                 
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-top:10px; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:49%;float:left; padding-left:20px; padding-right:20px;">
                   <span class="smalllink-gray">
                    <?=mysql_num_rows($qdeg)?> thought your idea is good and practical<br />
<?=mysql_num_rows($qde)?> thought your idea is not practical
                    </span>

                   </div>
                   <div style="background:#666666;width:1px;float:left; height:auto;">
                   <br />
                    <br />
                   
					</div>
					<div style="width:40%;float:left; padding-left:20px;">
                    <span class="smalllink-gray">
                    Posted by: <?=$purow['name']?><br />
                    Posted on: <? $postdate = new DateTime($idef['add_date']); echo $postdate->format('jS \o\f F Y');?>
                    
					
                    </span>
                    </div>
                  
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>	
                   </div>
			</div>
                    <?
                   }
				   ?> 
                   
                   <?
					
$iicom = mysql_query("select * from cam_ideas_comments where user_id = '$uid'") or die(mysql_error());
if(mysql_num_rows($iicom)>0){
	
						?>
                         <div class="row blockmypage">
				<div class="col-full">
                        <div class="block01">
                         <h2 style="color:#666666;"><img src="<?=base_url();?>images/icons/slide0047_image044.png" class="img-styleland" />You have left comments on following idea(s):</h2>

                        <?
							while($iicomf = mysql_fetch_array($iicom))
							{
							$iiid = $iicomf['idea_id'];
							$ccid = $iicomf['cam_id'];
							$ide = mysql_query("select * from cam_ideas where id = '$iiid'");
							$idef = mysql_fetch_array($ide);
							$qdeg = mysql_query("select * from cam_ideas_vote where idea_id = '$iiid' and vote = 'Idea is good and practical'");
							$qde = mysql_query("select * from cam_ideas_vote where idea_id = '$iiid' and vote = 'Idea is good, but not practical'");
							
							$cb = $this->candidate_model->get_cam('cam_basic',$iicomf['cam_id']);
							$cbrow = $cb->row_array();
							$post_user = $this->user_model->get_info($iicomf['user_id']);
							$purow = $post_user->row_array();

						?>
                   

                   <div style="margin-top:10px;">
                   <h4 style="color:#000000; font-weight:bold; text-decoration:none;"><?=$idef['idea_title']?></h4>
                   </div>
                   <div style="margin-top:10px;">
				   <span class="normallink">Developed for campaign: </span><a href="<? echo site_url('campaign/main/'.$ccid);?>" style="color:#000000;text-decoration:none;"><?=$cbrow['cam_title']?></a>
                   
                   </div>
                  
                 
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-top:10px; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:49%;float:left; padding-left:20px; padding-right:20px;">
                   <span class="smalllink-gray">
                    <?=mysql_num_rows($qdeg)?> thought your idea is good and practical<br />
<?=mysql_num_rows($qde)?> thought your idea is not practical
                    </span>

                   </div>
                   <div style="background:#666666;width:1px;float:left; height:auto;">
                   <br />
                    <br />
                   
					</div>
					<div style="width:40%;float:left; padding-left:20px;">
                    <span class="smalllink-gray">
                    Posted by: <?=$purow['name']?><br />
                    Posted on: <? $postdate = new DateTime($idef['add_date']); echo $postdate->format('jS \o\f F Y');?>
                    
					
                    </span>
                    </div>
                  
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>	
                   </div>
			</div>
                    <?
                   }
				   ?> 
                   
                    <?
					if($ocam->num_rows() > 0)
					{
						?>
                         <div class="row blockmypage">
							<div class="col-full">
                        		<div class="block01">
                         <h2 style="color:#666666;">Public Campaign(s):</h2>

                        <?
						foreach( $ocam->result_array() as $row )
						{
							$cb = $this->candidate_model->get_cam('cam_basic',$row['id']);
							$totsup = $this->candidate_model->get_cam('cam_supporters',$row['id']);
							$visit = $this->candidate_model->get_cam('visitors',$row['id']);
							$totideas = $this->candidate_model->get_cam('cam_ideas',$row['id']);
							$totcom = $this->candidate_model->get_cam('cam_ideas_comments',$row['id']);
							
							
							$camf = $this->candidate_model->get_cam('campaign',$row['id']);
							$ting = $camf->row_array();
							
							$post_user = $this->user_model->get_info($ting['can_id']);
							$purow = $post_user->row_array();
							
							
							
							
$good = $this->candidate_model->get_cam_sup_vote($row['id'],'I support the campaign');
$not_bad = $this->candidate_model->get_cam_sup_vote($row['id'],'I support the campaign and like to help out');
$bad = $this->candidate_model->get_cam_sup_vote($row['id'],'I would support the campaign, if it addressed the following');
					?>
                   <div style="margin-top:10px;">
                   <h4><a href="<? echo site_url('campaign/main/'.$row['id']);?>" style="color:#000000; font-weight:bold; text-decoration:none;"><?=$row['cam_title']?></a></h4>
                   </div>
                   <?
                   if($cb->num_rows() > 0)
					{
						$cbrow = $cb->row_array();
						$gol = substr($cbrow['cam_goal'], 0, 140);
						$gol = str_replace('<p>','',$gol);
						$gol = str_replace('</p>','<br />',$gol);
                    ?>
                   
                   
                   <div style="margin-top:10px;"><?=$gol?> ... <a href="<? echo site_url('campaign/main/'.$row['id']);?>" style="color:#666666; text-decoration:none;">(More)</a></div>
                   
                 
                   <?
                   }
				   ?>
                  <div style="background:#EAEAEA; height:auto;width:100%; float:left; margin-bottom:20px; padding-top:10px; padding-bottom:10px;">
                   <div style="width:49%;float:left; padding-left:20px;">
                   <span class="smalllink-gray">
                    
<?=$good->num_rows()?> support the campaign.<br />

<?=$not_bad->num_rows()?> support the campaign and like to help out<br />

<?=$bad->num_rows()?> would support if…<br />

Ideas and comments posted: <?=$totideas->num_rows()+$totcom->num_rows();?><br />

Total Number of Interactions: <?=$totideas->num_rows()+$totcom->num_rows()+$totsup->num_rows();?>

                    
                    
                    </span>

                   </div>
                   <div style="background:#666666;width:1px;float:left; height:auto;">
                   <br />
                    <br />
                    <br />
                    <br />
                    <br />
					</div>
					<div style="width:45%;float:left; padding-left:20px;">
                    <span class="smalllink-gray"><br />
                    Launched by: <?=$purow['name']?><br />
                    Launched on: <? $postdate = new DateTime($row['launched_on']); echo $postdate->format('jS \o\f F Y');?>.<br />
					<?php /*?>Last updated on: <? $postdate = new DateTime($row['last_update']); echo $postdate->format('jS \o\f F Y');?>.<br /><?php */?>
					Viewed by: <?=$visit->num_rows()?>
                    </span>
                    </div>
                   	
                   
                   </div>
                  <?
                   }
				   ?>
                   </div>
                   </div>
					</div>
                    <?
                   }
				   ?> 
        
	</div>
</section>
