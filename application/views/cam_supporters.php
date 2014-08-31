<?
$row = $cam->row_array();
$canid = $row['can_id'];
$camuser = $this->user_model->get_info($canid);
$urow = $camuser->row_array();
$arow = $activeuser->row_array();
$ase = $this->candidate_model->get_cam('cam_supporters',$cam_id);
$good = $this->candidate_model->get_cam_sup_vote($cam_id,'I support the campaign');
$not_bad = $this->candidate_model->get_cam_sup_vote($cam_id,'I support the campaign and like to help out');
$bad = $this->candidate_model->get_cam_sup_vote($cam_id,'I would support the campaign, if it addressed the following');
$cbrow = $cb->row_array();
?>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitField.value.length;
	}
}
</script>
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
                       
                        <a href="<? echo site_url('campaign/main/'.$cam_id);?>"><ol class="mainnevgp">Main</ol></a>
                        
                        <a href="<? echo site_url('campaign/updates');?>"><ol class="mainnevgp">Updates</ol></a>
                         <a href="<? echo site_url('campaign/ideas');?>"><ol class="mainnevgp">Ideas</ol></a>
                        <ol class="mainnevp">Supporters</ol>
                        <a href="<? echo site_url('campaign/feedback');?>"><ol class="mainnevgp">Feedback</ol></a>
                       </div>
				</div>
			</div>
        	<?
				if($ase->num_rows() < 1)
				{
			?>
            <?= form_open_multipart('campaign/supporters');?>
            <div class="col-full">
			  <div class="block05">
                      <h2 style="color:#A6A6A6">"Encourage, lift and strengthen one another. For the positive energy spread to one will be felt by us all. For we are connected, one and all."</h2>
                      <h3 style="color:#8EB4E3">Deborah Day</h3>
                      
						<div class="block-padding">
                            <h2>Do you support the campaign?</h2><?=form_error('vote');?>
                     	</div>
                        <div class="block-margin"><input name="vote" type="radio" value="I support the campaign" /> I support the campaign</div>
                        <div class="block-margin"><input name="vote" type="radio" value="I support the campaign and like to help out" /> I support the campaign and like to help out</div>
                        <div class="block-margin"><input name="vote" type="radio" value="I would support the campaign, if it addressed the following" /> I would support the campaign, if it addressed the following:&nbsp;&nbsp;<span style="font-size:12px; color:#666666">(<input readonly type="text" name="commentscountdown" size="3" value="0" style="background:#ffffff; width:22px;font-size:12px; color:#666666">/250)</span></div>

                        
                        <div class="block-margin">
                     	<textarea name="comments" cols="" rows="" class="textarea1"  onKeyDown="limitText(this.form.comments,this.form.commentscountdown,250);" 
onKeyUp="limitText(this.form.comments,this.form.commentscountdown,250);"></textarea><?=form_error('comments');?>
                       </div>
                       <div class="block-margin">
                        <div class="block-padding">
                            <input name="save" type="submit" value="  Submit  " class="button" />
                            
               	</div></div><br />

				</div>
			</div>
            <?=form_close()?>
            <?
				}else{
			?>
            
            
            <div class="col-3-4">
             <?
					 if($this->session->userdata('user_id') != ''){
				  ?>
                <div class="block05">
                	  <div class="block-padding">
                     <a href="<? echo site_url('campaign/add_support');?>"> <img src="<?=base_url();?>images/beasup.jpg" class="displayedi" /></a>
                      </div>
                </div>
                <?
					 }
				?>
                  <div class="block05">
                     <div class="inner-block">
                              <div class="block-padding">
                            <span style="font-size: 24px; line-height: 40px;font-weight:normal;">List of Supporters</span>
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
                            <span class="normallink"><?=$purow['name']?>:</span>&nbsp;
							<? if($row['vote'] !="I would support the campaign, if it addressed the following")
							{
								echo '"'.$row['vote'].'"';	
							?>
                            
                            <br />

                            Supporting since <? $postdate = new DateTime($row['add_date']); echo $postdate->format('jS \o\f F Y');?>.
                            <br />
                             <?
							if($othercam->num_rows() >0)
							{
							?>
                            Supporting&nbsp;<span class="normallink"><u><?=$othercam->num_rows()?> other campaign(s).</u></span>
                            <?
							}else{
							?>
                            This is the only campaign he is supporting.
                            <?
							}
							?>
                            <?
							}
							else
							{
							?>
                             <span class="postdate">(Posted on: <? $postdate = new DateTime($row['add_date']); echo $postdate->format('jS \o\f F Y');?>)</span>&nbsp;I would support if:<br />
							<?=$row['comments'];?>
                            <?
							}
							
							?>
                           
                           

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
					<h3 style="text-align:center; color:#404040; font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:20px;">"I support the campaign."</h3>
						
                     <h1 style="text-align:center; padding-top:8px; color:#002060;"><?=$not_bad->num_rows()?></h1>
              <h3 style="text-align:center; color:#404040; font-size:14px; font-family:Arial, Helvetica, sans-serif;  line-height:20px;">"I support the campaign and like to help out."</h3>
                                        
                    
                      <h1 style="text-align:center; padding-top:8px; color:#002060;"><?=$bad->num_rows()?></h1>
					<h3 style="text-align:center; color:#404040; font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:20px;">"I would support if…"</h3>
                    
                    
 
                    
                    
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
            
          <?
				}
			?>   
            
            
		</div>
	</div>

   
    
    
    
    
    
</section>